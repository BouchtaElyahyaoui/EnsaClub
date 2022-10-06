<template>
    <div class="iq-card ml-5">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Suggested Clubs</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <ul class="suggested-page-story m-0 p-0 list-inline">
                <li class="mb-3 mt-3" v-for="(club,indice) in suggestion_clubs" :key="indice">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <div class="stories-data ml-3 ">
                            <h5 class="">{{club.clubName}}</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <img v-if="!club.ClubImage || club.ClubImage == 0"
                            :src="'/storage/assets/images/page-img/gi-1.jpg'" style="max-width:150px;"
                            class="img-fluid rounded" alt="Responsive image" />
                        <img v-else :src="'/storage/' + club.ClubImage" style="max-width:150px;"
                            class="img-fluid rounded" alt="Responsive image">
                    </div>
                    <div class="mt-3">
                        <Link :href="route('clubs.show' , club)"
                            class="btn d-block btn-outline-primary rounded-pill mb-3">Visit
                        Club</Link>

                    </div>
                    <hr style="color:#8755f2">
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    props: ['suggestion_clubs'],
    components: {
        Link
    }
}
</script>

<style>

</style>