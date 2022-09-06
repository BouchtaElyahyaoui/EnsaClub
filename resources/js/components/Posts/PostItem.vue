<template>
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-body">
            <div class="user-post-data">
                <div class="d-flex flex-wrap">
                    <div class="media-support-user-img mr-3">
                        <Link :href="route('profiles.show', post.user)">
                        <img class="rounded-circle img-fluid" :src="post.user.profile_photo_url"
                            :about="post.user.username">
                        </Link>
                    </div>
                    <div class="media-support-info mt-2">
                        <h5 class="mb-0 d-inline-block"><a href="#" class="">{{ post.user.username }}</a></h5>
                        <p class="mb-0 d-inline-block">Add New Post</p>
                        <p class="mb-0 text-primary">{{ timeAgo(post.created_at) }}</p>
                    </div>
                    <div class="iq-card-post-toolbar">
                        <div class="dropdown">
                            <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu m-0 p-0">
                                <!-- <a class="dropdown-item p-3" href="#">
                                    <div class="d-flex align-items-top">
                                        <div class="icon font-size-20"><i class="ri-save-line"></i></div>
                                        <div class="data ml-2">
                                            <h6>Save Post</h6>
                                            <p class="mb-0">Add this to your saved items</p>
                                        </div>
                                    </div>
                                </a> -->
                                <form @submit.prevent="deletePost">
                                    <button style="all: unset;cursor: pointer;" type="submit">
                                        <a class="dropdown-item p-3">
                                            <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-close-circle-line"></i>
                                                </div>
                                                <div class="data ml-2">
                                                    <p class="mt-1">Delte this post.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </button>
                                </form>
                                <!-- <a class="dropdown-item p-3" href="#">
                                    <div class="d-flex align-items-top">
                                        <div class="icon font-size-20"><i class="ri-user-unfollow-line"></i></div>
                                        <div class="data ml-2">
                                            <h6>Unfollow User</h6>
                                            <p class="mb-0">Stop seeing posts but stay friends.</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item p-3" href="#">
                                    <div class="d-flex align-items-top">
                                        <div class="icon font-size-20"><i class="ri-notification-line"></i></div>
                                        <div class="data ml-2">
                                            <h6>Notifications</h6>
                                            <p class="mb-0">Turn on notifications for this post</p>
                                        </div>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <p>{{ post.body }}</p>
            </div>
            <div class="user-post">
                <div class="d-flex" v-if="post.images.length == 0">

                </div>
                <div class="d-flex" v-else-if="post.images.length == 1">
                    <div class="col">
                        <a href="javascript:void();"><img :src="'/storage/' + post.images[0].url" alt="post-image"
                                class="img-fluid rounded w-100"></a>
                    </div>
                </div>
                <div class="d-flex" v-else-if="post.images.length == 2">
                    <div class="row m-0 p-0">
                        <div class="col-sm-6 mt-2" v-for="(image, key) in post.images" :key="key">
                            <a href="javascript:void();"><img :src="'/storage/' + image.url" alt="post-image"
                                    class="img-fluid rounded w-100"></a>
                        </div>
                    </div>
                </div>
                <div class="d-flex" v-else>
                    <div class="row m-0 p-0">
                        <div class="col-md-6">
                            <a href="javascript:void();"><img :src="'/storage/' + post.images[1].url" alt="post-image"
                                    class="img-fluid rounded w-100"></a>
                        </div>
                        <div class="col-md-6 row m-0 p-0">
                            <div class="col-sm-12">
                                <a href="javascript:void();"><img :src="'/storage/' + post.images[0].url"
                                        alt="post-image" class="img-fluid rounded w-100"></a>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <a href="javascript:void();"><img :src="'/storage/' + post.images[2].url"
                                        alt="post-image" class="img-fluid rounded w-100"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment-area mt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="like-block position-relative d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="like-data">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" role="button">
                                        <Like :item="post" :method="submitLike"></Like>
                                    </span>

                                </div>
                            </div>
                            <div class="total-like-block ml-2 mr-3">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" role="button">
                                        {{ post.liked }}
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
                            <div class="like-data">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" role="button">
                                        <Dislike :item="post" :method="submitDislike"></Dislike>
                                    </span>
                                </div>
                            </div>
                            <div class="total-like-block ml-2 mr-3">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" role="button">
                                        {{ post.disliked }}
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
                        </div>
                        <div class="total-comment-block">
                            <div class="dropdown">
                                <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" role="button">
                                    {{ post.commentscount }} comment
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
                    </div>
                    <div class="share-block d-flex align-items-center feather-icon mr-3">
                        <a href="javascript:void();"><i class="ri-share-line"></i>
                            <span class="ml-1">99 Share</span></a>
                    </div>
                </div>
                <hr>
                <ul v-if="post.comments.length" class="post-comments p-0 m-0">
                    <combined-comments :comments="post.comments"></combined-comments>
                </ul>
                <ul v-else class="post-comments p-0 m-0">
                    <span>Be the first to comment</span>
                </ul>
                <comment-form :method="submitComment" :form="commentForm"></comment-form>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'
import Like from './Likes/Like.vue'
import Dislike from './Likes/Dislike.vue'
import CombinedComments from '@/components/Posts/CombinedComments.vue'
import CommentForm from '@/components/Posts/CommentForm.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    props: ["post"],

    data() {
        return {
            deleteForm: this.$inertia.form({
                userPost: this.post
            }),
            likeForm: this.$inertia.form({
                userPost: this.post
            }),
            dislikeForm: this.$inertia.form({
                userPost: this.post
            }),
            commentForm: this.$inertia.form({
                user_id: this.$page.props.user.id,
                post_id: this.post.id,
                body: this.body,
            }),
        };
    },
    methods: {
        deletePost() {
            this.deleteForm.delete(this.route("posts.destroy", this.post), {
                preserveScroll: true,
                onError: () => {
                    Toast.fire({
                        icon: "error",
                        title: "You do not have permission to delete this post ! ",
                    });
                },
                onSuccess: () => {
                    Toast.fire({
                        icon: "success",
                        title: "Post has been deleted succesfully ! "
                    });
                }
            });
        },
        submitComment() {
            this.commentForm.post(this.route('comments.store', this.post), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Your comment has been successfully published ! '
                    }),
                        this.commentForm.body = null
                }
            })
        },
        submitLike() {
            this.likeForm.post(this.route('post-like.store', this.post), {
                preserveScroll: true,
                onSuccess: () => { }
            })
        },
        submitDislike() {
            this.dislikeForm.delete(this.route('post-like.destroy', this.post), {
                preserveScroll: true,
                onSuccess: () => { }
            })
        },
        timeAgo(created) {
            return moment(created).fromNow();
        },
    },
    components: { Like, Dislike, CombinedComments, CommentForm, Link }
}

</script>

<style>
</style>