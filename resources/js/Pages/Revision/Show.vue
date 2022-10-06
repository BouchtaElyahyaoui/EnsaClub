<template>
    <pages-layout>
        <template #title>
            <div class="col-sm-12">
                <div class="iq-card position-relative inner-page-bg bg-primary" style="height: 150px">
                    <div class="inner-page-title">
                        <h3 class="text-white">Check Club Requests</h3>
                        <p class="text-white">Always Be Up To Date</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Tables</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Accepted</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                    role="tab" aria-controls="pills-contact" aria-selected="false">Pending</a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 ">
                                <button @click="sortAsc" class="btn d-inline-flex  btn-primary mr-4">Sort By
                                    Username
                                    ↑
                                </button>
                                <button @click="sortDesc" class="btn d-inline-flex  btn-secondary">Sort By
                                    Username
                                    ↓
                                </button>
                            </div>
                            <div class="col-lg-6 col-sm-12 mt-4">
                                <div class="form-group">
                                    <input type="text" v-model="search" placeholder="Search by Username ..."
                                        class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="tab-content" id="pills-tabContent-2">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Club</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Text</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody ref="parent">
                                        <tr v-for="(revision) in refRevisions.data" :key="revision"
                                            style="border-top: none">
                                            <td style="text-align: center;">
                                                <h6 class="text-primary mt-3"> <b>{{revision.clubName}}</b> </h6>
                                            </td>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mr-3">
                                                    <img :src="revision.user.profile_photo_url" class="rounded-circle"
                                                        alt="" style="width: 45px; height: 45px" />
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1">{{ revision.user.username }}</p>
                                                        <p class="text-muted mb-0 mr-3 ">{{ revision.user.email }}</p>
                                                    </div>
                                                </div>
                                            </th>
                                            <td>
                                                <p class="fw-normal mb-1">{{ revision.text }}</p>
                                            </td>
                                            <td style="text-align: center;">
                                                <button style="
                            pointer-events: none;" type="submit" v-if="revision.status == 0"
                                                    class="btn btn-primary rounded-pill mt-2"> <i
                                                        class="ri-loader-line"></i>Awaiting
                                                </button>

                                                <!-- <span class="badge badge-success rounded-pill d-inline">Active</span> -->
                                                <button style="
                            pointer-events: none; color:whitesmoke" type="submit" v-else
                                                    class="btn btn-success rounded-pill mt-2">
                                                    Active
                                                </button>
                                            </td>
                                            <td style="text-align: center;">
                                                <form @submit.prevent="acceptRevision(revision.id)"
                                                    v-if="revision.status == 0">
                                                    <button type="submit" class="btn btn-warning rounded-pill mt-2"
                                                        :disabled="acceptForm.processing">
                                                        Accept
                                                    </button>
                                                </form>
                                                <form @submit.prevent="deleteRevision(revision.id)" v-else>
                                                    <button type="submit" class="btn btn-danger rounded-pill mt-2"
                                                        :disabled="deleteForm.processing">
                                                        Delete
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination v-if="refRevisions.data.length > 0 " class="mt-6"
                                    :links="refRevisions.links">
                                </pagination>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Club</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Text</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody ref="parent2">
                                        <tr v-for="revision in refRevisionsAccepted.data" :key="revision"
                                            style="border-top: none">
                                            <td style="text-align: center;">
                                                <h6 class="text-primary mt-3"> <b>{{revision.clubName}}</b> </h6>
                                            </td>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mr-3">
                                                    <img :src="revision.user.profile_photo_url" class="rounded-circle"
                                                        alt="" style="width: 45px; height: 45px" />
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1">{{ revision.user.username }}</p>
                                                        <p class="text-muted mb-0 mr-3">{{ revision.user.email }}</p>
                                                    </div>
                                                </div>
                                            </th>
                                            <td>
                                                <p class="fw-normal mb-1">{{ revision.text }}</p>
                                            </td>
                                            <td style="text-align: center;"> <button style="
                            pointer-events: none;" type="submit" v-if="revision.status == 0"
                                                    class="btn btn-primary rounded-pill mt-2"> <i
                                                        class="ri-loader-line"></i>Awaiting
                                                </button>
                                                <button style="
                            pointer-events: none; color:whitesmoke" type="submit" v-else
                                                    class="btn btn-success rounded-pill mt-2">
                                                    Active
                                                </button>
                                            </td>
                                            <td style="text-align: center;">
                                                <form @submit.prevent="deleteRevision(revision.id)"
                                                    v-if="revision.status == 1">
                                                    <button type="submit" class="btn btn-danger rounded-pill mt-2"
                                                        :disabled="deleteForm.processing">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination v-if="refRevisionsAccepted.data.length > 0 " class="mt-6"
                                    :links="revisions_accepted.links"></pagination>

                            </div>

                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Club</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Text</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody ref="parent3">
                                        <tr v-for="revision in refRevisionsPending.data" :key="revision">
                                            <td style="text-align: center;">
                                                <h6 class="text-primary mt-3"> <b>{{revision.clubName}}</b> </h6>
                                            </td>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mr-3">
                                                    <img :src="revision.user.profile_photo_url" class="rounded-circle"
                                                        alt="" style="width: 45px; height: 45px" />
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1">{{ revision.user.username }}</p>
                                                        <p class="text-muted mb-0 mr-3">{{ revision.user.email }}</p>
                                                    </div>
                                                </div>
                                            </th>
                                            <td>
                                                <p class="fw-normal mb-1">{{ revision.text }}</p>
                                            </td>
                                            <td style="text-align: center;"> <button style="
                            pointer-events: none;" type="submit" v-if="revision.status == 0"
                                                    class="btn btn-primary rounded-pill mt-2"> <i
                                                        class="ri-loader-line"></i>Awaiting
                                                </button>
                                                <button style="
                            pointer-events: none; color:whitesmoke" type="submit" v-else
                                                    class="btn btn-success rounded-pill mt-2">
                                                    Active
                                                </button>
                                            </td>
                                            <td style="text-align: center;">
                                                <form @submit.prevent="acceptRevision(revision.id)">
                                                    <button v-if="revision.status == 0" type="submit"
                                                        class="btn btn-warning rounded-pill mt-2"
                                                        :disabled="acceptForm.processing">
                                                        Accept
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination v-if="refRevisionsPending.data.length > 0 " class="mt-6"
                                    :links="refRevisionsPending.links"></pagination>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </template>
    </pages-layout>
</template>


<script>
import PagesLayout from "@/Layouts/PagesLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { VueSpinner } from "vue3-spinners";
import Pagination from "@/components/Pagination.vue";
import { useAutoAnimate } from '@formkit/auto-animate/vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { toRef, watch, ref } from 'vue'
import debounce from "lodash/debounce";



export default {
    props: ['revisions', 'revisions_accepted', 'revisions_pending', 'filters', 'clubs'],
    components: {
        PagesLayout, VueSpinner, Pagination
    },

    setup(props) {
        let search = ref(props.filters.search)
        const refRevisions = toRef(props, 'revisions')
        const refRevisionsAccepted = toRef(props, 'revisions_accepted')
        const refRevisionsPending = toRef(props, 'revisions_pending')
        const [parent] = useAutoAnimate({ duration: 400 })
        const [parent2] = useAutoAnimate({ duration: 400 })
        const [parent3] = useAutoAnimate({ duration: 400 })

        const acceptForm = useForm({})
        const deleteForm = useForm({})

        const acceptRevision = (revision_id) => {
            acceptForm.post(route("revisions.accept", revision_id), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "You have accepted this user ! ",
                    });
                },
            });
        }

        const deleteRevision = (revision_id) => {
            deleteForm.post(route("revisions.deleteRev", revision_id), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "You have Deleted this revision ! ",
                    });
                },
            });
        }
        watch(search, debounce(function (value) {
            Inertia.get(route('revisions.index'), { search: value }, {
                preserveState: true,
                replace: true
            });
        }, 500))

        function sortAsc() {
            refRevisions.value.data.sort(function (a, b) {
                return a.user.username.localeCompare(b.user.username);
            });
            refRevisionsAccepted.value.data.sort(function (a, b) {
                return a.user.username.localeCompare(b.user.username);
            });
            refRevisionsPending.value.data.sort(function (a, b) {
                return a.user.username.localeCompare(b.user.username);
            });

        }
        function sortDesc() {
            refRevisions.value.data.sort(function (a, b) {
                return a.user.username.localeCompare(b.user.username);
            }).reverse();
            refRevisionsAccepted.value.data.sort(function (a, b) {
                return a.user.username.localeCompare(b.user.username);
            }).reverse();
            refRevisionsPending.value.data.sort(function (a, b) {
                return a.user.username.localeCompare(b.user.username);
            }).reverse();
        }

        return {
            refRevisions, refRevisionsAccepted, refRevisionsPending, parent, parent2, parent3, acceptForm, deleteForm, acceptRevision, deleteRevision, sortAsc, sortDesc, search
        }
    }
}

</script>


<style>

</style>
