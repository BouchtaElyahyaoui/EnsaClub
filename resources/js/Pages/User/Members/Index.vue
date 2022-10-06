<template>
    <pages-layout>

        <template #title>
            <div class="header-for-bg" style="margin-bottom: 20px;margin-top:10px;">
                <div class="background-header position-relative">
                    <img :src="'/storage/assets/images/page-img/profile-bg3.jpg'" class="img-fluid w-100"
                        alt="header-bg">
                    <div class="title-on-header">
                        <div class="data-block">
                            <h2>Members List</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <button @click="sortAsc" class="btn d-inline-flex  btn-primary mr-4">Sort By
                        User Name
                        ↑
                    </button>
                    <button @click="sortDesc" class="btn d-inline-flex  btn-secondary">Sort By
                        User Name
                        ↓
                    </button>
                </div>
                <div class="col-lg-6 col-sm-12 mt-4">
                    <div class="form-group">
                        <input type="text" v-model="search" placeholder="Search by User Name ..." class="form-control">
                    </div>
                </div>

            </div>
            <infinite-scroll @loadMore="loadMoreMembers">
                <div ref="parent" class="row">
                    <div class="col-md-6" v-for="member in refMembers.data" :key="member">
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
                                                        <Link :href="route('profiles.show' , member.username)">
                                                        <img :src="member.profile_photo_url" alt="profile-img"
                                                            class="avatar-130 img-fluid" />
                                                        </Link>
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
                </div>

            </infinite-scroll>

        </template>
    </pages-layout>
</template>

<script>
import UserBlock from "@/components/UserBlock.vue"
import PagesLayout from "@/Layouts/PagesLayout.vue";
import InfiniteScroll from "@/components/InfiniteScroll.vue"
import axios from 'axios';
import { useAutoAnimate } from '@formkit/auto-animate/vue'
import { toRef, watch, ref } from 'vue'
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    props: ['members', 'filters'],
    components: {
        UserBlock, PagesLayout, InfiniteScroll, Link
    },
    setup(props) {
        let search = ref(props.filters.search)
        const refMembers = toRef(props, 'members')
        const [parent] = useAutoAnimate({ duration: 400 })

        function sortAsc() {
            refMembers.value.data.sort(function (a, b) {
                return a.username.localeCompare(b.username);
            });
        }
        function sortDesc() {
            refMembers.value.data.sort(function (a, b) {
                return a.username.localeCompare(b.clubName);
            }).reverse();
        }
        function loadMoreMembers() {
            if (refMembers.next_page_url) {
                return
            }
            return axios.get(refMembers.next_page_url)
                .then(resp => {
                    refMembers = {
                        ...resp.data,
                        data: [
                            ...refMembers.data, ...resp.data.data
                        ]
                    }
                })
        }
        watch(search, debounce(function (value) {
            Inertia.get(route('members.index'), { search: value }, {
                preserveState: true,
                replace: true
            });
        }, 300))
        return {
            refMembers, parent, sortAsc, sortDesc, search, loadMoreMembers
        }
    },
    data() {
        return {
            allMembers: this.members,
        }
    },
    methods: {

    },

}
</script>

<style>

</style>