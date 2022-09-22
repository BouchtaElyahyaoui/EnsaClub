<template>
    <div class="chat-footer p-3 bg-white">
        <div class="d-flex align-items-center">
            <div class="chat-attagement d-flex">
                <a href="javascript:void();"><i class="fa fa-smile-o pr-3" aria-hidden="true"></i></a>
                <a href="javascript:void();"><i class="fa fa-paperclip pr-3" aria-hidden="true"></i></a>
            </div>
            <input type="text" class="form-control mr-3" v-model="form.body" placeholder="Type your message"
                @keyup.enter="method">
            <button type="submit" class="btn btn-primary d-flex align-items-center p-2"><i class="fa fa-paper-plane-o"
                    aria-hidden="true" :disabled="form.processing"></i><span class="d-none d-lg-block ml-1"
                    @click="method">Send</span></button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['form', 'item', 'method']
}
</script>

<style>

</style>