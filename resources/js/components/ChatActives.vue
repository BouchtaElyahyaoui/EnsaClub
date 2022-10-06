<template>
    <pages-layout>
        <template #title>
            <div class="right-sidebar-mini">
                <div class="right-sidebar-panel p-0">
                    <div class="iq-card shadow-none">
                        <div class="iq-card-body p-0">
                            <div class="media-height p-3">
                                <div class="media align-items-center mb-4 mt-3" v-for="(user,key) in users" :key="key">
                                    <div class="iq-profile-avatar status-online">
                                        <img class="rounded-circle avatar-50" :src="user.avatar" alt="">
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0"><a href="#">{{user.username}}</a></h6>
                                        <p class="mb-0"> Online</p>
                                    </div>
                                </div>

                            </div>
                            <div class="right-sidebar-toggle bg-primary mt-5">
                                <i class="ri-arrow-left-line side-left-icon"></i>
                                <i class="ri-arrow-right-line side-right-icon"><span class="ml-3 d-inline-block">Close
                                        Menu</span></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </pages-layout>

</template>

<script>
import PagesLayout from "@/Layouts/PagesLayout.vue";

export default {
    props: ['users'],
    components: {
        PagesLayout,
    }
}
</script>

<style>

</style>
