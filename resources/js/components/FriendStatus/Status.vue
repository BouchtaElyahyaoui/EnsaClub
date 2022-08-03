<template>

    <template v-if="friendRequestRecievedFrom">
        <div class="d-flex align-items-center">
            <accept :profile="profile"></accept>
            <ignore :profile="profile"></ignore>
        </div>
    </template>

    <template v-if="friendRequestSentTo">
        <div class="alert alert-info" role="alert">
            <div class="iq-alert-icon">
                <i class="ri-information-line"></i>
            </div>
            <div class="iq-alert-text">Pending <b>Request</b></div>
        </div>
    </template>

    <template v-else-if="isFriendsWith">
        <form @submit.prevent="deleteFriend()">
            <div class="d-flex align-items-center">
                <button type="submit" class="mr-3 btn btn-danger rounded">
                    <VueSpinner v-if="loading" size="30" color="white" />
                    <template v-else>
                        Unfriend
                    </template>
                </button>
            </div>
        </form>
    </template>

    <template v-else-if="$page.props.user.id != profile.id && friendRequestRecievedFrom != 1">
        <div class="social-links">
            <form @submit.prevent="addFriend()">
                <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false">

                    <VueSpinner v-if="loading" size="30" color="white" />
                    <template v-else>
                        Add Friend
                    </template>

                </button>
            </form>
        </div>
    </template>


</template>

<script>
import Accept from './Accept.vue'
import Ignore from './Ignore.vue'
import { VueSpinner } from 'vue3-spinners';
export default {
    components: {
        Accept, Ignore, VueSpinner
    },
    data() {
        return {
            addFriendForm: this.$inertia.form({
                user: this.profile
            }),
            deleteFriendForm: this.$inertia.form({
                user: this.profile
            }),
            loading: false,
        }
    },
    props: ['profile', 'isFriendsWith', 'friendRequestSentTo', 'friendRequestRecievedFrom'],
    methods: {
        addFriend() {
            this.loading = true;
            this.addFriendForm.post(this.route('friends.store', this.profile.id), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Friend request sent succesfully ! '
                    })
                    this.loading = false
                },
            })
        },
        deleteFriend() {
            this.loading = true;
            this.deleteFriendForm.delete(this.route('friends.destroy', this.profile.id), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Friend request deleted succesfully ! '
                    })
                    this.loading = false
                },
            })
        },
    }
}

</script>

<style>
</style>