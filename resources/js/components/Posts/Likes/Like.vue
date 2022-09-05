<template>
    <form @submit.prevent="method">
        <button style="all: unset;
  cursor: pointer;" class="ml-2 mr-2" type="submit">
            <span v-if="item.likeowner" style=" color: #50b5ff;">
                <i class="fa fa-thumbs-up "></i>
            </span>
            <span v-else>
                <i class="fa fa-thumbs-up"></i>
            </span>
        </button>

    </form>

</template>

<script>
export default {
    props: ['item', 'method']
}
</script>
    
<style>
</style>