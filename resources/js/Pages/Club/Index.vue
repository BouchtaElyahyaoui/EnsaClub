<template>
    <pages-layout>
        <template #title>
            <div class="header-for-bg " style="margin-bottom: 20px;margin-top:10px;">
                <div class="background-header position-relative">
                    <img :src="'/storage/assets/images/page-img/profile-bg7.jpg'"
                        class="img-fluid w-100 rounded rounded" alt="header-bg">
                    <div class="title-on-header">
                        <div class="data-block">
                            <h2>Clubs</h2>
                        </div>
                    </div>
                </div>
            </div>
            <club-block :clubs="clubs.data"></club-block>
        </template>
    </pages-layout>
</template>

<script>
import PagesLayout from "@/Layouts/PagesLayout.vue"
import ClubBlock from "@/components/ClubBlock.vue"
export default {
    components: {
        PagesLayout, ClubBlock
    },
    props: ['clubs']
}
</script>

<style>

</style>