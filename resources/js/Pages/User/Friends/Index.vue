<template>
    <pages-layout>
        <template #title>
            <div class="col-sm-12 ">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Friends Requests</h4>
                        </div>
                    </div>
                    <div class=" p-4" v-if="requests.length <= 0">
                        <div class="alert alert-warning" role="alert">
                            <div class="iq-alert-text">
                                You Have No <b> Friends Requests </b> Yet.
                            </div>
                        </div>
                    </div>
                    <user-request-block :requests="requests"></user-request-block>
                </div>
            </div>


            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Friends List</h4>
                    </div>
                </div>
                <div class=" p-4" v-if="friends.length <= 0">
                    <div class="alert alert-warning" role="alert">
                        <div class="iq-alert-text">
                            You have No <b> Friends </b> Yet !
                        </div>
                    </div>
                </div>
            </div>


            <user-block :members="friends"></user-block>
        </template>
    </pages-layout>
</template>

<script>
import PagesLayout from "@/Layouts/PagesLayout"
import UserBlock from "@/components/UserBlock.vue"
import UserRequestBlock from "@/components/UserRequestBlock.vue"
// import UserRequestBlock from "@/components/UserRequestBlock.Vue"

export default {
    props: ['friends', 'requests'],
    components: {
        PagesLayout, UserBlock, UserRequestBlock
    }
}
</script>

