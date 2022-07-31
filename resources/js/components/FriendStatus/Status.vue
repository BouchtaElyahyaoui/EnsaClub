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
        <form>
            <div class="d-flex align-items-center">
                <button type="submit" class="mr-3 btn btn-danger rounded">Unfriend</button>
            </div>
        </form>
    </template>

    <template v-else-if="$page.props.user.id != profile.id">
        <div class="social-links">
            <form @submit.prevent="addFriend()">
                <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false">
                    Add Friend
                </button>
            </form>
        </div>
    </template>


</template>

<script>
import Accept from './Accept.vue'
import Ignore from './Ignore.vue'
export default {
    components: {
        Accept, Ignore
    },
    data() {
        return {
            addFriendForm: this.$inertia.form({
                user: this.profile
            }),
        }
    },
    props: ['profile', 'isFriendsWith', 'friendRequestSentTo', 'friendRequestRecievedFrom'],
    methods: {
        addFriend() {
            this.addFriendForm.post(this.route('friends.store', this.profile.id), {
                preserveScroll: true,
                onSuccess: () => { },
            })
        },
    }
}

</script>

<style>
</style>