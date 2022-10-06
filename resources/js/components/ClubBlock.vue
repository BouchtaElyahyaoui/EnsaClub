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
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <button @click="sortAsc" class="btn d-inline-flex  btn-primary mr-4">Sort By
                Club Name
                ↑
            </button>
            <button @click="sortDesc" class="btn d-inline-flex  btn-secondary">Sort By
                Club Name
                ↓
            </button>
        </div>
        <div class="col-lg-6 col-sm-12 mt-4">
            <div class="form-group">
                <input type="text" v-model="search" placeholder="Search by Club Name ..." class="form-control">
            </div>
        </div>

    </div>
    <div class="row" ref="parent">
        <div class="col-md-6 col-lg-4" v-for="club in refClubs.data" :key="club">
            <div class="iq-card">
                <div class="top-bg-image">
                    <img :src="'/storage/assets/images/page-img/profile-bg1.jpg'" class="img-fluid w-100"
                        alt="group-bg">
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
                                <h6>{{club.posts.length}}</h6>
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
                                <Link :href="route('profiles.show' , user.username)">
                                <img class="fluid avatar-40 rounded-circle" :src="user.profile_photo_url" alt="">
                                </Link>
                            </a>

                        </div>
                    </div>



                    <div v-if="club.belongs">
                        <button style="
                            pointer-events: none; border-color: #4db9c5; color: #4db9c5;" type="button"
                            class="btn btn-outline-success"> <i class="ri-heart-fill pr-0"></i>Accepted
                        </button>
                    </div>

                    <div v-if="!club.belongs">
                        <button v-if="!club.revisions " type="button" class="btn btn-outline-primary"
                            data-toggle="modal" data-target=".bd-example-modal-lg"
                            v-on:click="this.form.club_id = club.id">
                            <i class="ri-add-circle-fill"></i>Join This Club
                        </button>
                        <div v-if="club.revisions">
                            <div v-if="club.revisions.status == 0">
                                <form @submit.prevent="deleteRevision(club)">
                                    <button type="submit" class="btn btn-outline-danger"
                                        :disabled="deleteForm.processing">
                                        <VueSpinner v-if="deleteForm.processing" size="30" color="red" />
                                        <template v-else>
                                            <i class="ri-delete-bin-2-fill pr-0"></i>
                                            Cancel Request
                                        </template>
                                    </button>
                                </form>
                            </div>
                            <div v-if="club.revisions.status == 1">
                                <button style="
                            pointer-events: none;" type="button" class="btn btn-outline-success"> <i
                                        class="ri-heart-fill pr-0"></i>Accepted
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg mt-5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content" style="margin-top:95px;">
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
                                        <input type="textArea" class="form-control" id="text" v-model="form.text"
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
                </div>
            </div>
        </div>
    </div>

    <pagination v-if="refClubs.data.length > 0 " class="mt-6" :links="refClubs.links">
    </pagination>

</template>

<script>

import { Link } from '@inertiajs/inertia-vue3'
import { VueSpinner } from 'vue3-spinners';
import { useAutoAnimate } from '@formkit/auto-animate/vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { toRef, watch, ref } from 'vue'
import Pagination from "@/components/Pagination.vue"
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { Modal } from 'bootstrap';




export default {
    props: ['clubs', 'filters'],
    components: {
        Link, VueSpinner, Pagination
    },

    setup(props) {
        let search = ref(props.filters.search)
        const refClubs = toRef(props, 'clubs')
        const [parent] = useAutoAnimate({ duration: 400 })
        const form = useForm({
            user_id: null,
            club_id: null,
            text: null,
        })
        const deleteForm = useForm({})
        const submit = () => {
            form.post(route('revisions.store'), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Your Request has been successfully sent ! '
                    }),
                        closeModal()
                    form.reset()
                },
            })
        }
        const deleteRevision = (club) => {
            deleteForm.delete(route("revisions.destroy", club), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "Request has been deleted succesfully ! "
                    });
                }
            });
        }
        function closeModal() {
            console.log("Im closiiiing")
            $(".bd-example-modal-lg").css("display", "none");
            $('.bd-example-modal-lg').modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }
        function sortAsc() {
            refClubs.value.data.sort(function (a, b) {
                return a.clubName.localeCompare(b.clubName);
            });
        }
        function sortDesc() {
            refClubs.value.data.sort(function (a, b) {
                return a.clubName.localeCompare(b.clubName);
            }).reverse();
        }
        watch(search, debounce(function (value) {
            Inertia.get(route('clubs.index'), { search: value }, {
                preserveState: true,
                replace: true
            });
        }, 500))
        return {
            refClubs, parent, form, deleteForm, submit, deleteRevision, sortAsc, sortDesc, search, closeModal
        }
    },


}
</script>

<style>

</style>