<template>
    <div class="iq-card-body" v-for="request in requests" :key="request.id">
        <ul class="request-list list-inline m-0 p-0">
            <li class="d-flex align-items-center">
                <div class="user-img img-fluid"><img :src="request.profile_photo_url" alt="story-img"
                        class="rounded-circle avatar-40"></div>
                <div class="media-support-info ml-3">
                    <h6>{{ request.username }}</h6>
                    <p class="mb-0">40 friends</p>
                </div>
                <div class="d-flex align-items-center">
                    <accept :profile="request"></accept>
                    <ignore :profile="request"></ignore>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import Accept from "@/components/FriendStatus/Accept.vue"
import Ignore from "@/components/FriendStatus/Ignore.vue"
export default {
    props: ['requests'],
    components: {
        Accept, Ignore
    }
}
</script>

<style>

</style>