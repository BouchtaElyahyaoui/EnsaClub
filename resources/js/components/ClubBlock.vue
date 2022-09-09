<template>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card" style="background:none">
            <div class="iq-card-header d-flex justify-content-end" style="border-bottom:none">
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <Link :href="route('clubs.create')" class="btn btn-primary btn-block"><i
                        class="ri-add-line mr-2"></i>Add Your
                    Club
                    </Link>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4" v-for="(club, key) in clubs" :key="key">
        <div class="iq-card">
            <div class="top-bg-image">
                <img :src="'/storage/assets/images/page-img/profile-bg1.jpg'" class="img-fluid w-100" alt="group-bg">
            </div>
            <div class="iq-card-body text-center">
                <div class="group-icon" v-if="!club.ClubImage || club.ClubImage == 0">
                    <img :src="'/storage/assets/images/page-img/gi-1.jpg'" alt="profile-img"
                        class="rounded-circle img-fluid avatar-120">
                </div>
                <div class="group-icon" v-else>
                    <img :src="'/storage/' + club.ClubImage" alt="profile-img"
                        class="rounded-circle img-fluid avatar-120">
                </div>
                <div class="group-info pt-3 pb-3">
                    <h4>{{ club.clubName }}</h4>
                    <p>{{ club.description }}</p>
                </div>
                <div class="group-details d-inline-block pb-3">
                    <ul class="d-flex align-items-center justify-content-between list-inline m-0 p-0">
                        <li class="pl-3 pr-3">
                            <p class="mb-0">Post</p>
                            <h6>600</h6>
                        </li>
                        <li class="pl-3 pr-3">
                            <p class="mb-0">Member</p>
                            <h6>{{ club.users.length }}</h6>
                        </li>
                        <li class="pl-3 pr-3">
                            <p class="mb-0">Visit</p>
                            <h6>1.2k</h6>
                        </li>
                    </ul>
                </div>
                <div class="group-member mb-3">
                    <div class="iq-media-group">
                        <a href="#" class="iq-media" v-for="(user, index) in club.users.slice(0, 5)" :key="index">
                            <img class="fluid avatar-40 rounded-circle" :src="user.profile_photo_url" alt="">
                        </a>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-block w-100">Join</button>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from '@inertiajs/inertia-vue3'
export default {
    props: ['clubs'],
    components: {
        Link,
    },
    data() {
        return {
            form: this.$inertia.form({
                clubName: this.clubName,
                description: this.description,
                mission: this.mission,
                dateOfCreation: this.dateOfCreation,
                ClubImage: null,
            }),
            formStep: ref(1),
        }
    },
    methods: {
        previousStep() {
            this.formStep--;
        },
        firstStep() {
            Inertia.post(
                route("clubs.first.step"),
                {
                    clubName: this.form.clubName,
                    description: this.form.description,
                    mission: this.form.mission,
                    dateOfCreation: this.form.dateOfCreation,
                },
                {
                    onSuccess: () => {
                        this.formStep++;
                    },
                }
            );
        },
        submit() {
            this.form.post(this.route('clubs.store'), {
                forceFormData: true,
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Your club has been successfully added ! '
                    }),
                        this.form.reset(), (this.formStep = 1);
                },
            })
        },

    }
}
</script>

<style>

</style>