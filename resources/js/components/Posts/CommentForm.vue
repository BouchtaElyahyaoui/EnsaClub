<template>
    <form class="comment-text d-flex align-items-center mt-3" @submit.prevent="method">
        <input type="text" v-model="form.body" placeholder="Enter Your Comment" class="form-control rounded"
            :class="form.errors.body ? 'is-invalid' : ''">

        <div class="comment-attagement d-flex">
            <button style="all: unset;cursor: pointer;" type="submit" :disabled="form.processing">
                <VueSpinner v-if="form.processing" size="30" color="#8755f2" />
                <a v-else><i class="ri-send-plane-2-line mr-3"></i></a>
            </button>

        </div>
    </form>
</template>

<script>
import { VueSpinner } from 'vue3-spinners';
export default {
    props: ['method', 'form'],
    components: {
        VueSpinner,
    }
}
</script>

<style>

</style>