<template>
  <pages-layout title="Dashboard">
    <template #title>
      <h2 class="h4 font-weight-bold">
        Dashboard
      </h2>
    </template>

  </pages-layout>
</template>

<script>
import { defineComponent } from "vue"
import PagesLayout from "@/Layouts/PagesLayout.vue";

export default defineComponent({
  components: {
    PagesLayout,

  }
});
</script>
