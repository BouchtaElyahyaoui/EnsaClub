<template>
    <div class="chat-content scroller">
        <div class="chat" v-for="(message, keyIndice) in messages" :key="keyIndice"
            :class="message.user.id == $page.props.user.id ? '' : 'chat-left'">
            <div class="chat-user">
                <a class="avatar m-0" v-on:click="showDetails(message.user)">
                    <img :src="message.user.profile_photo_url" alt="avatar" class="avatar-35" />
                </a>
                <span class="chat-time mt-1">{{ timeAgo(message.created_at) }}</span>
            </div>
            <div class="chat-detail">
                <div class="chat-message">
                    <p>{{ message.body }}</p>
                </div>
            </div>
            <!-- <chat-user-details :user="this.user" :show="this.show"></chat-user-details> -->
        </div>

        <!-- <div class="chat chat-left">
            <div class="chat-user">
                <a class="avatar m-0">
                    <img src="/storage/assets/images/user/05.jpg" alt="avatar" class="avatar-35 ">
                </a>
                <span class="chat-time mt-1">6:48</span>
            </div>
            <div class="chat-detail">
                <div class="chat-message">
                    <p>Hey John, I am looking for the best admin template.</p>
                    <p>Could you please help me to find it out? 🤔</p>
                </div>
            </div>
        </div> -->
    </div>
    <div class="chat-user-detail-popup scroller" v-if="this.user" :class="this.show ? 'show' : ''" style="">
        <div class="user-profile text-center">
            <button v-on:click="this.show = false" class="close-popup p-3">
                <i class="ri-close-fill"></i>
            </button>
            <div class="user mb-4 text-center">
                <a class="avatar m-0">
                    <img :src="user.profile_photo_url" alt="avatar" />
                </a>
                <div class="user-name mt-4">
                    <h4>{{ user.username }}</h4>
                </div>
                <div class="user-desc">
                    <p>{{ profile.address }}</p>
                </div>
            </div>
            <hr />
            <div class="chatuser-detail text-left mt-4">
                <div class="row">
                    <div class="col-6 col-md-6 title">Full Name:</div>
                    <div class="col-6 col-md-6 text-right">{{ user.name }}</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-6 col-md-6 title">Tel:</div>
                    <div class="col-6 col-md-6 text-right">{{ profile.phone }}</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-6 col-md-6 title">Date Of Birth:</div>
                    <div class="col-6 col-md-6 text-right">{{ profile.dob }}</div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-6 col-md-6 title">Gender:</div>
                    <div class="col-6 col-md-6 text-right">{{ profile.gender }}</div>
                </div>
                <hr />
            </div>
        </div>
    </div>
</template>

<script>
import ChatUserDetails from "@/components/ChatInput.vue";
export default {
    components: {
        ChatUserDetails,
    },
    props: ["messages", "room"],
    data() {
        return {
            show: false,
            user: Object,
            profile: Object,
        };
    },
    methods: {
        timeAgo(created) {
            return moment(created).format("HH:mm");
        },
        showDetails(u) {
            this.show = true;
            this.user = u;
            this.profile = u.profile;
        },
    },
};
</script>

<style>

</style>