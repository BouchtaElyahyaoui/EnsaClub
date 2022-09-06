<template>
    <form class="post-text ml-3 w-100" @submit.prevent="method">
        <input type="text" v-model="form.body" class="form-control rounded" placeholder="Write something here..."
            style="border:none;">
        <hr />
        <label for="file-input">
            <ul class="post-opt-block d-flex align-items-center list-inline m-0 p-0">
                <li class="iq-bg-primary rounded p-2 pointer mr-3">
                    <a href="#"></a><img :src="'/storage/assets/images/small/07.png'" alt="icon" class="img-fluid" />
                    Photo
                </li>
            </ul>
        </label>
        <input style="display:none" id="file-input" type="file" name="post_images"
            @input="form.post_images = $event.target.files" multiple />


        <button type="submit" class="btn btn-primary d-block w-100 mt-3" :disabled="form.processing">
            <VueSpinner v-if="form.processing" size="30" color="white" />
            <template v-else>
                {{ text }}
            </template>
        </button>
    </form>
</template>

<script>
import { VueSpinner } from 'vue3-spinners';
export default {
    props: ['method', 'form', 'text'],
    components: {
        VueSpinner,
    }
}
</script>

<style>
</style>