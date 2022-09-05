<template>
    <form class="post-text ml-3 w-100" @submit.prevent="method">
        <input type="text" v-model="form.body" class="form-control rounded" placeholder="Write something here..."
            style="border:none;">
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