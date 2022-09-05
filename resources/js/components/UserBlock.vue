<template>
    <div class="col-md-6" v-for="member in members" :key="member.id">
        <div class="iq-card">
            <div class="iq-card-body profile-page p-0">
                <div class="profile-header-image">
                    <div class="cover-container">
                        <img :src="'/storage/assets/images/page-img/profile-bg2.jpg'" alt="profile-bg"
                            class="rounded img-fluid w-100">
                    </div>
                    <div class="profile-info p-4">
                        <div class="user-detail">
                            <div class="d-flex flex-wrap justify-content-between align-items-start">
                                <div class="profile-detail d-flex">
                                    <div class="profile-img pr-4">
                                        <img :src="member.profile_photo_url" alt="profile-img"
                                            class="avatar-130 img-fluid" />
                                    </div>
                                    <div class="user-data-block">
                                        <h4 class="">{{ member.username }}</h4>
                                        <h6>{{ member.profile.gender }}</h6>
                                        <p>{{ member.profile.address }}</p>
                                    </div>
                                </div>
                                <!-- <button type="submit" class="btn btn-primary">Following</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['members']
}
</script>

<style>
</style>