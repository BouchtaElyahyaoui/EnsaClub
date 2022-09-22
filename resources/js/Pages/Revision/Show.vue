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
                    <div class="tab-content" id="pills-tabContent-2">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <table class="table align-middle mb-0" style="background-color: #fff">
                                <thead class="" style="background-color: #fff">
                                    <tr>
                                        <th>User</th>
                                        <th>Text</th>
                                        <th>Status</th>
                                        <th>Accept</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(revision, key) in revisions" :key="key" style="border-top: none">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/storage/assets/images/user/1.jpg" class="rounded-circle"
                                                    alt="" style="width: 45px; height: 45px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">{{ revision.username }}</p>
                                                    <p class="text-muted mb-0">{{ revision.email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">{{ revision.text }}</p>
                                        </td>
                                        <td>
                                            <!-- <span v-if="revision.status == 0"
                                                class="badge badge-warning rounded-pill d-inline">Awaiting</span> -->
                                            <span v-if="revision.status == 0"
                                                class="badge border border-primary text-primary mt-3">Awaiting</span>
                                            <!-- <span class="badge badge-success rounded-pill d-inline">Active</span> -->
                                            <span v-else
                                                class="badge border border-success text-success mt-3">Active</span>
                                        </td>
                                        <td>
                                            <form @submit.prevent="acceptRevision(revision.id)">
                                                <button v-if="revision.status == 0" type="submit"
                                                    class="btn btn-outline-warning rounded-pill mt-2"
                                                    data-mdb-ripple-color="dark" :disabled="acceptForm.processing">
                                                    Accept
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <table class="table align-middle mb-0" style="background-color: #fff">
                                <thead class="" style="background-color: #fff">
                                    <tr>
                                        <th>User</th>
                                        <th>Text</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(revision, key2) in revisions_accepted" :key="key2"
                                        style="border-top: none">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/storage/assets/images/user/1.jpg" class="rounded-circle"
                                                    alt="" style="width: 45px; height: 45px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">{{ revision.username }}</p>
                                                    <p class="text-muted mb-0">{{ revision.email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">{{ revision.text }}</p>
                                        </td>
                                        <td>
                                            <!-- <span v-if="revision.status == 0"
                                                class="badge badge-warning rounded-pill d-inline">Awaiting</span> -->
                                            <!-- <span class="badge badge-success rounded-pill d-inline">Active</span> -->
                                            <span class="badge border border-success text-success mt-3">Active</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <table class="table align-middle mb-0" style="background-color: #fff">
                                <thead class="" style="background-color: #fff">
                                    <tr>
                                        <th>User</th>
                                        <th>Text</th>
                                        <th>Status</th>
                                        <th>Accept</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(revision, key3) in revisions_pending" :key="key3"
                                        style="border-top: none">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/storage/assets/images/user/1.jpg" class="rounded-circle"
                                                    alt="" style="width: 45px; height: 45px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">{{ revision.username }}</p>
                                                    <p class="text-muted mb-0">{{ revision.email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">{{ revision.text }}</p>
                                        </td>
                                        <td>
                                            <!-- <span v-if="revision.status == 0"
                                                class="badge badge-warning rounded-pill d-inline">Awaiting</span> -->
                                            <span class="badge border border-primary text-primary mt-3">Awaiting</span>
                                            <!-- <span class="badge badge-success rounded-pill d-inline">Active</span> -->
                                        </td>
                                        <td>
                                            <form @submit.prevent="acceptRevision(revision.id)">
                                                <button type="submit" class="btn btn-outline-warning rounded-pill mt-2"
                                                    data-mdb-ripple-color="dark" :disabled="acceptForm.processing">
                                                    Accept
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </pages-layout>
</template>

<script>
import PagesLayout from "@/Layouts/PagesLayout.vue";
import { VueSpinner } from "vue3-spinners";
export default {
    components: {
        PagesLayout,
        VueSpinner,
    },
    props: ['clubs', 'revisions', 'revisions_accepted', 'revisions_pending'],
    data() {
        return {
            acceptForm: this.$inertia.form({}),
        };
    },
    methods: {
        acceptRevision(revision_id) {
            this.acceptForm.post(this.route("revisions.accept", revision_id), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "You have accepted this user ! ",
                    });
                },
            });
        },
    },
};
</script>

<style>

</style>
