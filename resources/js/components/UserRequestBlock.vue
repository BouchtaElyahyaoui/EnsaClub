<template>
    <div class="iq-card-body" v-for="request in requests" :key="request.id">
        <ul class="request-list list-inline m-0 p-0">
            <li class="d-flex align-items-center">
                <div class="user-img img-fluid"><img :src="'/storage/assets/images/page-img/profile-bg3.jpg'"
                        alt="story-img" class="rounded-circle avatar-40"></div>
                <div class="media-support-info ml-3">
                    <h6>{{ request.username }}</h6>
                    <p class="mb-0">40 friends</p>
                </div>
                <div class="d-flex align-items-center">
                    <a href="javascript:void();" class="mr-3 btn btn-primary rounded">Confirm</a>
                    <a href="javascript:void();" class="mr-3 btn btn-secondary rounded">Delete
                        Request</a>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ['requests'],
}
</script>

<style>
</style>