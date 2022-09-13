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
                    <Link :href="route('clubs.show' , club)">
                    <img :src="'/storage/assets/images/page-img/gi-1.jpg'" alt="profile-img"
                        class="rounded-circle img-fluid avatar-120"> </Link>
                </div>
                <div class="group-icon" v-else>
                    <Link :href="route('clubs.show' , club)">
                    <img :src="'/storage/' + club.ClubImage" alt="profile-img"
                        class="rounded-circle img-fluid avatar-120">
                    </Link>
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

                <button v-if="!club.revisions" type="button" class="btn btn-outline-primary" data-toggle="modal"
                    data-target=".bd-example-modal-xl" v-on:click="this.form.club_id = club.id">
                    <i class="ri-add-circle-fill"></i>Join This Club
                </button>

                <div v-if="club.revisions">
                    <div v-if="club.revisions.status == 0">
                        <form @submit.prevent="deleteRevision(club)">
                            <button type="submit" class="btn btn-outline-danger" :disabled="deleteForm.processing">
                                <VueSpinner v-if="deleteForm.processing" size="30" color="white" />
                                <template v-else>
                                    <i class="ri-delete-bin-2-fill pr-0"></i>
                                    Cancel Request
                                </template>
                            </button>


                        </form>
                    </div>
                    <div v-if="club.revisions.status == 1">
                        <button style="
 pointer-events: none;" type="button" class="btn btn-outline-success"> <i class="ri-heart-fill pr-0"></i>Accepted
                        </button>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-xl mt-5" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content" style="background-color: #1e2745">
                            <!-- <div class="modal-header" >
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> -->
                            <div class="modal-body">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Fill this form :</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <p>Tell us why you would like to join our club ?</p>
                                        <form @submit.prevent="submit">
                                            <div class="form-group">
                                                <!-- <input type="hidden" ref="club_id" name="club_id" :value="club.id"
                                                    id="club_id"> -->
                                                <input type="text" class="form-control" id="text" v-model="form.text"
                                                    placeholder="Text ....">
                                            </div>
                                            <button type="submit" class="btn btn-primary d-block w-100 mt-3"
                                                :disabled="form.processing">
                                                <VueSpinner v-if="form.processing" size="30" color="white" />
                                                <template v-else>
                                                    Submit
                                                </template>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 1px solid #1e2745;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { Link } from '@inertiajs/inertia-vue3'
import { VueSpinner } from 'vue3-spinners';

export default {
    props: ['clubs'],
    components: {
        Link, VueSpinner
    },
    data() {
        return {
            form: this.$inertia.form({
                user_id: this.$page.props.user.id,
                club_id: "",
                text: this.text,
            }),
            deleteForm: this.$inertia.form({
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('revisions.store'), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Your Request has been successfully sent ! '
                    }),
                        this.form.text = "";
                },
            })
        },
        deleteRevision(club) {
            this.deleteForm.delete(this.route("revisions.destroy", club), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "Request has been deleted succesfully ! "
                    });
                }
            });
        }



    }
}
</script>

<style>

</style>