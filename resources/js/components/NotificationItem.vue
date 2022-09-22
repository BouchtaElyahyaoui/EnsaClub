<template>

    <Link v-if="read" :href="read.data.info.link" class="iq-sub-card" style="background:whitesmoke;">
    <div class="media align-items-center">
        <div class="">
            <img class="avatar-40 rounded" :src="read.data.info.avatar" alt="">
        </div>
        <div class="media-body ml-3">
            <div class="row">
                <div class="col-9 ">
                    <h6 class="mb-0 text-black">{{read.data.info.message}}</h6>
                </div>
                <div class="col-3 text-right">
                    <div style="font-size: 20px;">
                        <i @click="markForDelete(read.id)" class="ri-delete-bin-line"></i>
                    </div>
                </div>
            </div>

            <small class="float-right font-size-12">{{timeAgo(read.data.info.sent)}}</small>
        </div>
    </div>
    </Link>

    <Link v-if="unread" @click="markOneAsRead(unread.id)" :href="unread.data.info.link" class="iq-sub-card">
    <div class="media align-items-center">
        <div class="">
            <img class="avatar-40 rounded" :src="unread.data.info.avatar" alt="">
        </div>
        <div class="media-body ml-3">
            <div class="row">
                <div class="col-9 ">
                    <h6 class="mb-0">{{unread.data.info.message}}</h6>
                </div>
                <div class="col-3 text-right">
                    <div style="font-size: 20px;z-index: 999;">
                        <i @click="markForDelete(unread.id)" class="ri-delete-bin-line"></i>
                    </div>
                </div>
            </div>
            <small class="float-right font-size-12">{{timeAgo(unread.data.info.sent)}}</small>
        </div>
    </div>
    </Link>



</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    props: ['unread', 'read'],
    components: {
        Link,
    },
    methods: {
        timeAgo: function timeAgo(created) {
            return moment(created).format('HH:mm');
        },
        markOneAsRead(id) {
            axios.post(this.route('notifications.store', id))
        },
        markForDelete(id) {
            axios.get(this.route('notifications.destroy', id))
                .then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Your notification has been successfully deleted ! '
                    })
                })
        }

    }
}
</script>

<style>

</style>