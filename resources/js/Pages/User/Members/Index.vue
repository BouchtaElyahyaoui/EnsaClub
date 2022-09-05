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
            <infinite-scroll @loadMore="loadMoreMembers">
                <user-block :members="allMembers.data"></user-block>
            </infinite-scroll>

        </template>
    </pages-layout>
</template>

<script>
import UserBlock from "@/components/UserBlock.vue"
import PagesLayout from "@/Layouts/PagesLayout.vue";
import InfiniteScroll from "@/components/InfiniteScroll.vue"
import axios from 'axios';
export default {
    props: ['members'],
    components: {
        UserBlock, PagesLayout, InfiniteScroll
    },
    data() {
        return {
            allMembers: this.members,
        }
    },
    methods: {
        loadMoreMembers() {
            if (!this.allMembers.next_page_url) {
                return
            }
            return axios.get(this.allMembers.next_page_url)
                .then(resp => {
                    this.allMembers = {
                        ...resp.data,
                        data: [
                            ...this.allMembers.data, ...resp.data.data
                        ]
                    }
                })
        }
    },

}
</script>

<style>
</style>