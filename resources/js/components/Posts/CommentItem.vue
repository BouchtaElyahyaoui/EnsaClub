<template>
    <div class="d-flex flex-wrap">
        <div class="user-img">
            <Link :href="route('profile.show', comment.user.username)">
            <img :src="comment.user.profile_photo_url" :alt="comment.user.username"
                class="avatar-35 rounded-circle img-fluid">
            </Link>
        </div>
        <div class="comment-data-block ml-3">
            <h6>
                <Link :href="route('profile.show', comment.user.username)">
                {{ comment.user.username }}
                </Link>
            </h6>
            <p class="mb-0">{{ comment.body }}</p>
            <div class="d-flex flex-wrap align-items-center comment-activity">
                <Like :item="comment" :method="submitLike"></Like>
                <div class="total-like-block ml-2 mr-3">
                    <div class="dropdown">
                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            role="button">
                            {{ comment.liked }}
                        </span>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Max Emum</a>
                            <a class="dropdown-item" href="#">Bill Yerds</a>
                            <a class="dropdown-item" href="#">Hap E. Birthday</a>
                            <a class="dropdown-item" href="#">Tara Misu</a>
                            <a class="dropdown-item" href="#">Midge Itz</a>
                            <a class="dropdown-item" href="#">Sal Vidge</a>
                            <a class="dropdown-item" href="#">Other</a>
                        </div>
                    </div>
                </div>
                <!-- <Dislike :item="comment" :method="submitDislike"></Dislike>
                <div class="total-like-block ml-2 mr-3">
                    <div class="dropdown">
                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            role="button">
                            {{ comment.disliked }}
                        </span>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Max Emum</a>
                            <a class="dropdown-item" href="#">Bill Yerds</a>
                            <a class="dropdown-item" href="#">Hap E. Birthday</a>
                            <a class="dropdown-item" href="#">Tara Misu</a>
                            <a class="dropdown-item" href="#">Midge Itz</a>
                            <a class="dropdown-item" href="#">Sal Vidge</a>
                            <a class="dropdown-item" href="#">Other</a>
                        </div>
                    </div>
                </div> -->
                <span> {{ timeAgo(comment.created_at) }} </span>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Like from './Likes/Like.vue'
import Dislike from './Likes/Dislike.vue'
export default {
    props: ['comment'],
    components: {
        Link, Like, Dislike
    },
    methods: {
        timeAgo(created) {
            return moment(created).fromNow();
        },
        submitLike() {
            this.likeForm.post(this.route('comment-like.store', this.comment), {
                preserveScroll: true,
                onSuccess: () => { }
            }
            )
        },
        submitDislike() {
            this.dislikeForm.delete(this.route('comment-like.destroy', this.comment), {
                preserveScroll: true,
                onSuccess: () => { }
            }
            )
        }
    },
    data() {
        return {
            likeForm: this.$inertia.form({
                comment: this.comment
            }),
            dislikeForm: this.$inertia.form({
                comment: this.comment
            }),
        }
    },

}
</script>

<style>

</style>