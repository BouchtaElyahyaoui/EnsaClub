<template>
    <notification-item v-for="(unread,indice) in unreads" :key="indice" :unread="unread"></notification-item>
    <notification-item v-for="(read,indice) in reads" :key="indice" :read="read"></notification-item>
    <Link :href="route('notifications.update' )" class="iq-sub-card">
    <div class="media align-items-center">
        <div style="font-size: 24px;">
            <i class="ri-check-double-fill"></i>
        </div>
        <div class="media-body ml-3">
            <h6 class="mb-0 ">Mark All As Read </h6>
        </div>
    </div>
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import NotificationItem from './NotificationItem.vue'
export default {
    components: { NotificationItem, Link },
    props: ['notifications', 'reads', 'unreads'],

}
</script>

<style>

</style>