<template>
    <form @submit.prevent="ignoreRequest">
        <div class="d-flex align-items-center">
            <button type="submit" class="mr-3 btn btn-danger rounded">
                <VueSpinner v-if="loading" size="30" color="black" />
                <template v-else>
                    Ignore
                </template>
            </button>
        </div>
    </form>
</template>

<script>
export default
    {
        props: ['profile'],
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
                laoding: false,
            }
        }
    }
</script>

<style>
</style>