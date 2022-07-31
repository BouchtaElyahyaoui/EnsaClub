<template>
    <app-layout>
        <slot name="title"></slot>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue"
export default {
    components: {
        AppLayout,
    }
}
</script>

<style>
</style>