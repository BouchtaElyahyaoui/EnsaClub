<template>
    <pages-layout>
        <template #title>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card position-relative inner-page-bg bg-primary" style="height: 150px">
                            <div class="inner-page-title">
                                <h3 class="text-white">
                                    Create You Own Club
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <div class="iq-card">
                            <!-- <div class="iq-card-header d-flex justify-content-between">
                                                <div class="iq-header-title">
                                                    <h4 class="card-title">Simple Wizard</h4>
                                                </div>
                                            </div> -->
                            <div class="iq-card-body">
                                <form id="form-wizard1" class="text-center mt-4">
                                    <ul id="top-tab-list" class="p-0">
                                        <li class="active"
                                            :class="{done : (formStep == 2 || formStep == 3 ||formStep == 4)}">
                                            <a href="javascript:void();">
                                                <i class="ri-lock-unlock-line"></i><span>Informations</span>
                                            </a>
                                        </li>
                                        <li id="personal"
                                            :class="{active : (formStep ==2 || formStep ==3 ||formStep ==4) , done : (formStep ==3 || formStep ==4)}">
                                            <a href=" javascript:void();">
                                                <i class="ri-user-fill"></i><span>Team</span>
                                            </a>
                                        </li>
                                        <li :class="{active : ( formStep ==3 ||formStep ==4) , done : (formStep ==4)}">

                                            <a href="javascript:void();">
                                                <i class="ri-camera-fill"></i><span>Image</span>
                                            </a>
                                        </li>
                                        <li :class="{active : (formStep ==4) , done : (formStep ==4)}">

                                            <a href="javascript:void();">
                                                <i class="ri-check-fill"></i><span>Finish</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- fieldsets -->
                                    <fieldset v-if="formStep == 1">
                                        <div class="form-card text-left">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4">
                                                        Club Information:
                                                    </h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 1 - 4</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Club Name: *</label>
                                                        <input type="text" class="form-control" name="clubName"
                                                            v-model="form.clubName" placeholder="Club Name" />
                                                        <div class="text-danger" v-if="$page.props.errors.clubName">{{
                                                        $page.props.errors.clubName }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Description: *</label>
                                                        <input type="text" class="form-control" name="description"
                                                            v-model="form.description" placeholder="UserName" />
                                                        <div class="text-danger" v-if="$page.props.errors.description">
                                                            {{
                                                            $page.props.errors.description }}</div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Mission: *</label>
                                                        <input type="text" class="form-control" name="mission"
                                                            v-model="form.mission" placeholder="Mission" />
                                                        <div class="text-danger" v-if="$page.props.errors.mission">{{
                                                        $page.props.errors.mission }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date Of Creation: *</label>
                                                        <input type="date" class="form-control" id="exampleInputdate"
                                                            v-model="form.dateOfCreation">
                                                        <div class="text-danger"
                                                            v-if="$page.props.errors.dateOfCreation">{{
                                                            $page.props.errors.dateOfCreation }}</div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <button type="button" class="btn btn-primary next action-button float-right"
                                            v-if="formStep == 1" @click="firstStep">
                                            Next
                                        </button> -->
                                        <button type="button" class="btn btn-primary float-right" @click="firstStep">
                                            Next
                                        </button>
                                    </fieldset>
                                    <fieldset v-if="formStep == 2">
                                        <div class="form-card text-left">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4">
                                                        Team:
                                                    </h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 2 - 4</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>President(e)</label>
                                                        <v-select :options="users" v-model="form.president"
                                                            label="username">
                                                        </v-select>
                                                        <div class="text-danger" v-if="$page.props.errors.president">{{
                                                        $page.props.errors.president }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Vice President(e)</label>
                                                        <v-select :options="users" v-model="form.vicePresident"
                                                            label="username">
                                                        </v-select>
                                                        <div class="text-danger"
                                                            v-if="$page.props.errors.vicePresident">{{
                                                            $page.props.errors.vicePresident }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Secretaire General(e)</label>
                                                        <v-select :options="users" v-model="form.secretaire"
                                                            label="username">
                                                        </v-select>
                                                        <div class="text-danger" v-if="$page.props.errors.secretaire">{{
                                                        $page.props.errors.secretaire }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tresorier(e)</label>
                                                        <v-select :options="users" v-model="form.tresorier"
                                                            label="username">
                                                        </v-select>
                                                        <div class="text-danger" v-if="$page.props.errors.tresorier">{{
                                                        $page.props.errors.tresorier }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Responsable Sponsoring</label>
                                                        <v-select :options="users" v-model="form.responsbaleSponsoring"
                                                            label="username">
                                                        </v-select>
                                                        <div class="text-danger"
                                                            v-if="$page.props.errors.responsbaleSponsoring">{{
                                                            $page.props.errors.responsbaleSponsoring }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Responsable Design</label>
                                                        <v-select :options="users" v-model="form.responsableDesign"
                                                            label="username">
                                                        </v-select>
                                                        <div class="text-danger"
                                                            v-if="$page.props.errors.responsableDesign">{{
                                                            $page.props.errors.responsableDesign }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Responsable Communication</label>
                                                        <v-select :options="users"
                                                            v-model="form.responsableCommunication" label="username">
                                                        </v-select>
                                                        <div class="text-danger"
                                                            v-if="$page.props.errors.responsableCommunication">{{
                                                            $page.props.errors.responsableCommunication }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Responsable De Formation Et Materiel</label>
                                                        <v-select :options="users"
                                                            v-model="form.responsableFormationMateriel"
                                                            label="username">
                                                        </v-select>
                                                        <div class="text-danger"
                                                            v-if="$page.props.errors.responsableFormationMateriel">{{
                                                            $page.props.errors.responsableFormationMateriel }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Responsable De Mediatisation</label>
                                                        <v-select :options="users"
                                                            v-model="form.respensableMediatisation" label="username">
                                                        </v-select>
                                                        <div class="text-danger"
                                                            v-if="$page.props.errors.respensableMediatisation">{{
                                                            $page.props.errors.respensableMediatisation }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" name="next"
                                            class="btn btn-primary next action-button float-right" @click="secondStep">
                                            Next
                                        </button>
                                        <button type="button" name="previous"
                                            class="btn btn-dark previous action-button-previous float-right mr-3"
                                            @click="previousStep">
                                            Previous
                                        </button>
                                    </fieldset>
                                    <fieldset v-if="formStep == 3">
                                        <div class="form-card text-left">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4">
                                                        Image Upload:
                                                    </h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 3 - 4</h2>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Upload Your Photo:</label>

                                                <input class="form-control" type="file" name="ClubImage"
                                                    @input="form.ClubImage = $event.target.files[0]" />
                                            </div>
                                            <!-- <div class="form-group">
                                                                <label>Upload Signature Photo:</label>
                                                                <input type="file" class="form-control" name="pic-2"
                                                                    accept="image/*" />
                                                            </div> -->
                                        </div>
                                        <button type="button" name="next" class="btn btn-primary  float-right"
                                            @click="submit">
                                            Submit
                                        </button>
                                        <button type="button" name="previous"
                                            class="btn btn-dark previous action-button-previous float-right mr-3"
                                            @click="previousStep">
                                            Previous
                                        </button>
                                    </fieldset>
                                    <fieldset v-if="formStep == 4">
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4 text-left">
                                                        Finish:
                                                    </h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 4 - 4</h2>
                                                </div>
                                            </div>
                                            <br /><br />
                                            <h2 class="text-success text-center">
                                                <strong>SUCCESS !</strong>
                                            </h2>
                                            <br />
                                            <div class="row justify-content-center">
                                                <div class="col-3">
                                                    <img :src="'/storage/assets/images/page-img/img-success.png'"
                                                        class="fit-image" alt="fit-image" />
                                                </div>
                                            </div>
                                            <br /><br />
                                            <div class="row justify-content-center">
                                                <div class="col-7 text-center">
                                                    <h5 class="purple-text text-center">
                                                        You Have Successfully Craeted Your Club ... <br>
                                                        <span class="text-danger"> Wait for
                                                            Administration approval </span>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" name="previous"
                                            class="btn btn-dark previous action-button-previous float-right mr-3 mt-5"
                                            @click="initialStep">
                                            Add Another Club
                                        </button>
                                        <button type="button" name="previous"
                                            class="btn btn-dark previous action-button-previous float-right mr-3 mt-5"
                                            @click="back">
                                            Go back to Club List
                                        </button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </template>
    </pages-layout>
</template>

<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import JetInputError from '@/Jetstream/InputError.vue'
import vSelect from "vue-select";
import PagesLayout from "@/Layouts/PagesLayout.vue";


const props = defineProps(['users'])
const form = useForm({
    clubName: "",
    description: "",
    mission: "",
    dateOfCreation: "",
    president: "",
    vicePresident: "",
    secretaire: "",
    tresorier: "",
    responsbaleSponsoring: "",
    responsableDesign: "",
    responsableCommunication: "",
    responsableFormationMateriel: "",
    respensableMediatisation: "",
    ClubImage: null,
});
const formStep = ref(1);


const submit = () => {
    form.post(route("clubs.store"), {
        forceFormData: true,
        onSuccess: () => {
            form.reset(), (formStep.value = 4);
        },
    });
};
function firstStep() {
    Inertia.post(
        route("clubs.first.step"),
        {
            clubName: form.clubName,
            description: form.description,
            mission: form.mission,
            dateOfCreation: form.dateOfCreation,
        },
        {
            onSuccess: () => {
                formStep.value++;
            }
        })
}

function back() {
    Inertia.get(route("clubs.index"));
}
function initialStep() {
    formStep.value = 1;
}
function secondStep() {
    Inertia.post(
        route("clubs.second.step"),
        {
            president: form.president,
            vicePresident: form.vicePresident,
            secretaire: form.secretaire,
            tresorier: form.tresorier,
            responsbaleSponsoring: form.responsbaleSponsoring,
            responsableDesign: form.responsableDesign,
            responsableCommunication: form.responsableCommunication,
            responsableFormationMateriel: form.responsableFormationMateriel,
            respensableMediatisation: form.respensableMediatisation,

        },
        {
            onSuccess: () => {
                formStep.value++;
            }
        })
}
function previousStep() {
    formStep.value--;
}

// export default {
//     components: {
//         PagesLayout,
//     },
//     data() {
//         return {
//             form: this.$inertia.form({
//                 clubName: this.clubName,
//                 description: this.description,
//                 mission: this.mission,
//                 dateOfCreation: this.dateOfCreation,
//                 ClubImage: null,
//             }),
//             formStep: ref(1),
//         }
//     },
//     methods: {
//         previousStep() {
//             this.formStep--
//         },
//         firstStep() {
//             Inertia.post(
//                 route("clubs.first.step"),
//                 {
//                     clubName: this.form.clubName,
//                     description: this.form.description,
//                     mission: this.form.mission,
//                     dateOfCreation: this.form.dateOfCreation,
//                 },
//                 {
//                     onSuccess: () => {
//                         this.formStep++
//                     },
//                 }
//             );
//         },
//         submit() {
//             this.form.post(this.route('clubs.store'), {
//                 forceFormData: true,
//                 preserveScroll: true,
//                 onSuccess: () => {
//                     Toast.fire({
//                         icon: 'success',
//                         title: 'Your club has been successfully added ! '
//                     })
//                 },
//             })
//         },

//     }

// }
</script>

<style>

</style>
