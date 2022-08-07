<template>

    <form @submit.prevent="acceptFriend">
        <div class="d-flex align-items-center">
            <button type="submit" class="mr-3 btn btn-primary rounded">
                <VueSpinner v-if="loading" size="30" color="black" />
                <template v-else>
                    Confirm
                </template>
            </button>
        </div>
    </form>
</template>

<script>
import { VueSpinner } from 'vue3-spinners';
export default {
    components: {
        VueSpinner,
    },
    props: ['profile'],
    data() {
        return {
            acceptFriendForm: this.$inertia.form({
                user: this.profile
            }),
            laoding: false,
        }
    },
    methods: {
        acceptFriend() {
            this.loading = true;
            this.acceptFriendForm.patch(this.route('friends.update', this.profile.id),
                {
                    preserveScroll: true,
                    OnSuccess: () => {
                        Toast.fire({
                            icon: 'success',
                            title: 'Friend request accepted succesfully ! '
                        })
                        this.loading = false
                    }
                })
        }
    }

}
</script>

<style>
</style>