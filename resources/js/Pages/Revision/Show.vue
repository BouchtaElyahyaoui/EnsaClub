<template>
    <pages-layout>
        <template #title>
            <div class="col-sm-12">
                <div class="iq-card position-relative inner-page-bg bg-primary" style="height: 150px;">
                    <div class="inner-page-title">
                        <h3 class="text-white">Editable Table Page</h3>
                        <p class="text-white">lorem ipsum</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Editable Table</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">
                            <span class="table-add float-right mb-3 mr-2">
                                <button class="btn btn-sm iq-bg-success"><i class="ri-add-fill"><span class="pl-1">Add
                                            New</span></i>
                                </button>
                            </span>
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>User Name</th>
                                        <th>Text</th>
                                        <th>Accept</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(revision,key) in revisions" :key="key">
                                        <td><img class="rounded-circle img-fluid" :src="revision.profile_photo_url"
                                                :about="revision.username"></td>
                                        <td class="text-white">{{revision.username}}</td>
                                        <td class="text-white">{{revision.text}}</td>
                                        <td>
                                            <span class="table-remove">
                                                <form @submit.prevent="acceptRevision(revision.id)">
                                                    <button type="submit"
                                                        class="btn iq-bg-success btn-rounded btn-sm my-0"
                                                        :disabled="acceptForm.processing">
                                                        <VueSpinner v-if="acceptForm.processing" size="30"
                                                            color="white" />
                                                        <template v-else>
                                                            <i class="ri-delete-bin-2-fill pr-0"></i>
                                                            Accept
                                                        </template>
                                                    </button>
                                                </form>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button"
                                                    class="btn iq-bg-danger btn-rounded btn-sm my-0">Remove</button></span>
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
import PagesLayout from '@/Layouts/PagesLayout.vue'
import { VueSpinner } from 'vue3-spinners';
export default {
    components: {
        PagesLayout, VueSpinner
    },
    props: ['clubs', 'revisions'],
    data() {
        return {
            acceptForm: this.$inertia.form({
            }),
        }
    },
    methods: {
        acceptRevision(revision_id) {
            this.acceptForm.post(this.route("revisions.accept", revision_id), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "You have accepted this user ! "
                    });
                }
            });
        }
    }
}
</script>

<style>

</style>
