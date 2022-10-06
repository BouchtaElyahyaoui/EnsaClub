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


    <div style="background:#9468f3;" v-if="unread" class="iq-sub-card">
        <div class="media align-items-center">
            <div class="">
                <img class="avatar-40 rounded" :src="unread.data.info.avatar" alt="">
            </div>
            <div class="media-body ml-3">
                <div class="row">
                    <div class="col-9 ">
                        <Link @click="markOneAsRead(unread.id)" :href="unread.data.info.link">
                        <h6 class="mb-0" style="color:whitesmoke">{{unread.data.info.message}}</h6>
                        </Link>
                    </div>
                    <div class="col-3 text-right">
                        <div style="font-size: 20px;z-index: 999;">
                            <form @submit.prevent="markForDelete(unread.id)">
                                <button style="all: unset;cursor: pointer;" type="submit"
                                    :disabled="deleteForm.processing">
                                    <i class="ri-delete-bin-line"></i>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
                <small class="float-right font-size-12"
                    style="color:whitesmoke">{{timeAgo(unread.data.info.sent)}}</small>
            </div>
        </div>
    </div>



</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";
export default {
    props: ['unread', 'read'],
    components: {
        Link,
    },
    data() {
        return {
            deleteForm: this.$inertia.form({}),
        };
    },
    methods: {
        timeAgo: function timeAgo(created) {
            return moment(created).format('HH:mm');
        },
        markOneAsRead(id) {
            axios.post(this.route('notifications.store', id))
        },
        markForDelete(id) {
            this.deleteForm.get(this.route("notifications.destroy", id), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "You have Deleted this revision ! ",
                    });
                },
            });
        }

    }
}
</script>

<style>

</style>