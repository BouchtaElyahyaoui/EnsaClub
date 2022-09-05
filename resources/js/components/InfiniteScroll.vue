<template>
    <div class="row">
        <slot></slot>
    </div>
</template>

<script>
export default {
    mounted() {
        window.addEventListener('scroll', _.debounce((e) => {
            let pixelFromBottom = document.documentElement.offsetHeight - document.documentElement.scrollTop - window.innerHeight
            if (pixelFromBottom < 200) {
                this.$emit('loadMore')
            }
        }, 100))

    }
}
</script>

<style>
</style>