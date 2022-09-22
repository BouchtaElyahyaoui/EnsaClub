<template>
    <form @submit.prevent="ignoreRequest">
        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-outline-danger rounded-pill mr-3">
                <VueSpinner v-if="loading" size="30" color="white" />
                <template v-else>
                    Ignore
                </template>
            </button>
        </div>
    </form>
</template>

<script>
import { VueSpinner } from 'vue3-spinners';
export default
    {
        props: ['profile'],
        components: {
            VueSpinner,
        },
        methods: {
            ignoreRequest() {
                this.loading = true;
                this.$inertia.get(this.route('friends.deny', this.profile.id, {
                    onSucess: () => {
                        Toast.fire({
                            icon: 'success',
                            title: 'Friend request ignored succesfully ! '
                        })
                        this.loading = false;
                    }
                }))
            }
        },
        data() {
            return {
                loading: false,
            }
        }
    }
</script>

<style>

</style>