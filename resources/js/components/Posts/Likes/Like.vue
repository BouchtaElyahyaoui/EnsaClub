<template>
    <form @submit.prevent="method">
        <button style="all: unset;
  cursor: pointer;" class="ml-2 mr-2" type="submit">
            <span v-if="item.likeowner" style=" color: #8755f2;">
                <i class="ri-heart-2-fill"></i> </span>
            <span v-else>
                <i class="ri-heart-2-line"></i> </span>
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