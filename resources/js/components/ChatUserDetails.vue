<template>
    <div class="chat-user-detail-popup  scroller " v-if="this.user" :class="this.show ? 'show' : '' " style="">
        <div class="user-profile text-center">
            <button v-on:click="this.show = false" class="close-popup p-3"><i class="ri-close-fill"></i></button>
            <div class="user mb-4">
                <a class="avatar m-0">
                    <img :src="user.profile_photo_url" alt="avatar">
                </a>
                <div class="user-name mt-4">
                    <h4>{{user.username}}</h4>
                </div>
                <div class="user-desc">
                    <p>{{profile.address}}</p>
                </div>
            </div>
            <hr>
            <div class="chatuser-detail text-left mt-4">
                <div class="row">
                    <div class="col-6 col-md-6 title">Full Name:</div>
                    <div class="col-6 col-md-6 text-right">{{user.name}}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 col-md-6 title">Tel:</div>
                    <div class="col-6 col-md-6 text-right">{{profile.phone}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 col-md-6 title">Date Of Birth:
                    </div>
                    <div class="col-6 col-md-6 text-right">{{profile.dob}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 col-md-6 title">Gender:</div>
                    <div class="col-6 col-md-6 text-right">{{profile.gender}}</div>
                </div>
                <hr>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    props: ['user', 'profile', 'show'],
}
</script>

<style>

</style>