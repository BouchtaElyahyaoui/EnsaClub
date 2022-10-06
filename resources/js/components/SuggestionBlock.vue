<template>
    <div class="iq-card ml-5" style="box-shadow: 8px 9px 18px -1px rgba(135,85,242,0.48);
-webkit-box-shadow: 8px 9px 18px -1px rgba(135,85,242,0.48);
-moz-box-shadow: 8px 9px 18px -1px rgba(135,85,242,0.48);">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Friend Suggestions</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <ul class="media-story m-0 p-0">
                <div class="owl-carousel">

                    <li class="d-flex mb-4 flex-column align-items-center justify-content-center"
                        v-for="user in suggestions" :key="user.id">
                        <Link :href="route('profiles.show', user.username)">
                        <img :src="user.profile_photo_url" :alt="user.username" class="rounded-circle img-fluid"
                            style="height:100px; max-width: 100px;">
                        </Link>
                        <div class="stories-data ml-3 mt-2">
                            <Link :href="route('profiles.show', user.username)">
                            <h5> <b> {{ user.username }} </b> </h5>
                            </Link>
                        </div>
                    </li>
                </div>

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
    },
    mounted() {

        $('.owl-carousel').owlCarousel({
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            center: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2200,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    },
    updated() {
        $('.owl-carousel').owlCarousel({
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            center: 2,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2200,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 1
                }
            }
        })
    }
}
</script>

<style>

</style>