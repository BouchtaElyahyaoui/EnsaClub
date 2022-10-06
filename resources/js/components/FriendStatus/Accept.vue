<template>

    <form @submit.prevent="acceptFriend">
        <div class="d-flex align-items-center">
            <button type="submit" style=" border-color: #4db9c5; color: #4db9c5;"
                class="btn btn-outline-success rounded-pill mr-3">
                <VueSpinner v-if="loading" size="30" color="white" />
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
    props: ['profile', 'notification'],
    data() {
        return {
            invitationsHandle: this.$page.props.auth.invitationsHandle,
            unreadNotifications: this.$page.props.auth.unreadNotifications,
            acceptFriendForm: this.$inertia.form({
                user: this.profile,
                notification: this.notification
            }),
            loading: false,
        }
    },
    methods: {
        acceptFriend() {
            this.loading = true
            this.acceptFriendForm.patch(this.route('friends.update', this.profile.id),
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        Toast.fire({
                            icon: 'success',
                            title: 'Friend request accepted succesfully ! '
                        })
                        this.loading = false
                        this.invitationsHandle.splice(this.invitationsHandle.indexOf(this.notification), 1)
                        this.unreadNotifications.splice(this.unreadNotifications.indexOf(this.notification), 1)

                    }
                })
        }
    }

}
</script>

<style>

</style>