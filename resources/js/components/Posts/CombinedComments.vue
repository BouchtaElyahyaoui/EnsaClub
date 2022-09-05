<template>
    <li class="mb-2" v-for="comment in comments" :key="comment.id">
        <comment-item :comment="comment"></comment-item>
    </li>
</template>

<script>
import CommentItem from '@/components/Posts/CommentItem.vue'
export default {
    props: ['comments'],
    components: {
        CommentItem
    }
}
</script>

<style>
</style>