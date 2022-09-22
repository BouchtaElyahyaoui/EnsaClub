<template>
    <div class="col-sm-12">
        <div id="post-modal-data" class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Create Post</h4>
                </div>
            </div>
            <div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
                <div class="d-flex align-items-center">
                    <div class="user-img">
                        <img :src="$page.props.user.profile_photo_url" alt="userimg" class="avatar-60 rounded-circle">
                    </div>
                    <form class="post-text ml-3 w-100" @submit.prevent="method">
                        <input type="text" v-model="form.body" class="form-control rounded"
                            placeholder="Write something here..." style="border: none" />
                        <hr />

                        <ul class="post-opt-block d-flex align-items-center list-inline m-0 p-0">
                            <li class="iq-bg-primary rounded p-2 pointer mr-3">
                                <label for="file-input">
                                    <a href="#"></a><img :src="'/storage/assets/images/small/07.png'" alt="icon"
                                        class="img-fluid" />
                                    Photo
                                </label>
                            </li>
                        </ul>
                        <div class="row mt-2">
                            <div class="col-4 mt-1">
                                <label>Choose Your Club : </label>
                            </div>
                            <div class="col-8 vSelect " style="border-radius: 0.3rem">
                                <v-select :options="user_clubs" v-model="form.user_club" label="clubName">
                                </v-select>
                            </div>
                        </div>



                        <input style="display: none" id="file-input" type="file" name="post_images"
                            @input="form.post_images = $event.target.files" multiple />

                        <button type="submit" class="btn btn-primary d-block w-100 mt-3" :disabled="form.processing">
                            <VueSpinner v-if="form.processing" size="30" color="white" />
                            <template v-else>
                                {{ text }}
                            </template>
                        </button>
                    </form>
                </div>
                <hr>

            </div>
        </div>
    </div>


</template>

<script>
import { VueSpinner } from "vue3-spinners";
import vSelect from "vue-select";
export default {
    props: ["method", "form", "user_clubs", "text"],
    components: {
        VueSpinner,
        vSelect,
    },
};
</script>

<style scoped>
.vSelect {
    --vs-controls-color: #8755f2;
    --vs-border-color: #8755f2;

    --vs-dropdown-bg: #282c34;
    --vs-dropdown-color: #cc99cd;
    --vs-dropdown-option-color: #cc99cd;

    --vs-selected-bg: #8755f2;
    --vs-selected-color: #eeeeee;

    --vs-search-input-color: #eeeeee;

    --vs-dropdown-option--active-bg: #8755f2;
    --vs-dropdown-option--active-color: #eeeeee;
}
</style>