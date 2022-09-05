<template>
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Friend Suggestions</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <ul class="media-story m-0 p-0">

                <li class="d-flex mb-4 align-items-center" v-for="user in suggestions" :key="user.id">

                    <img :src="user.profile_photo_url" :alt="user.username" class="rounded-circle img-fluid">
                    <div class="stories-data ml-3">
                        <Link :href="route('profiles.show', user.username)">
                        <h5> {{ user.username }} </h5>
                        </Link>
                    </div>
                </li>

            </ul>
            <a href="#" class="btn btn-primary d-block mt-3">See All</a>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
    props: ['suggestions'],
    components: {
        Link,
    }
}
</script>

<style>
</style>