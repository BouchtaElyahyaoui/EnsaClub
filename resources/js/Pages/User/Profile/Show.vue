<template >
    <pages-layout>
        <template #title>
            <div class="col-sm-12 ">
                <div class="iq-card">
                    <div class="iq-card-body profile-page p-0 ">
                        <div class="profile-header">
                            <div class="cover-container">
                                <img :src="'/storage/assets/images/page-img/profile-bg1.jpg'" alt="profile-bg"
                                    class="rounded img-fluid">
                                <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                    <li><a href="javascript:void();"><i class="ri-pencil-line"></i></a></li>
                                    <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li>
                                </ul>
                            </div>
                            <div class="user-detail text-center mb-3">
                                <div class="profile-img">
                                    <img :src="profile.profile_photo_url" alt="profile-img"
                                        class="avatar-130 img-fluid" />
                                </div>
                                <div class="profile-detail">
                                    <h3 class="">{{ profile.username }}</h3>
                                </div>
                            </div>
                            <div
                                class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
                                <!-- Friend Status component -->
                                <status :profile="profile" :isFriendsWith="isFriendsWith"
                                    :friendRequestSentTo="friendRequestSentTo"
                                    :friendRequestRecievedFrom="friendRequestRecievedFrom"></status>
                                <div class="social-info">
                                    <ul
                                        class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                        <li class="text-center pl-3">
                                            <h6>Posts</h6>
                                            <p class="mb-0">{{posts.total}}</p>
                                        </li>
                                        <li class="text-center pl-3">
                                            <h6>Friends</h6>
                                            <p class="mb-0">{{friends.length}}</p>
                                        </li>
                                        <!-- <li class="text-center pl-3">
                                            <h6>Following</h6>
                                            <p class="mb-0">100</p>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-body p-0">
                        <div class="user-tabing">
                            <ul
                                class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#timeline">Timeline</a>
                                </li>
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#about">About</a>
                                </li>
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#friends">friends</a>
                                </li>
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#clubs">Clubs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                        <div class="iq-card-body p-0">
                            <div class="row">
                                <div class="col-lg-4">

                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Friends</h4>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                <p class="m-0">
                                                    <Link :href="route('members.index')">Add New </Link>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                                                <li class="col-md-4 col-6 pl-2 pr-0 pb-3"
                                                    v-for="(friend,friendKey) in friends" :key="friendKey">
                                                    <Link :href="route('profiles.show',friend.username)">
                                                    <img :src="friend.profile_photo_url" alt="gallary-image"
                                                        class="img-fluid" /></Link>
                                                    <h6 class="mt-2">{{friend.username}}</h6>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 row m-0 p-0">





                                    <!-- Form Post -->
                                    <PostForm :method="submit" :form="form" :text="'Post'"></PostForm>










                                    <infinite-scroll @loadMore="loadMorePosts">
                                        <comb-posts :posts="allPosts.data"></comb-posts>
                                    </infinite-scroll>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="about" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-9 pl-4">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                <h4>Contact Information</h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h6>Email</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{profile.email}}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>Mobile</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{profile.profile.phone}}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>Address</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{profile.profile.address}}</p>
                                                    </div>
                                                </div>
                                                <h4 class="mt-3">Basic Information</h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h6>Birth Date</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{dayOfBirth(profile.profile.dob)}}
                                                        </p>
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>Birth Year</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{yearOfBirth(profile.profile.dob)}}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>Gender</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{profile.profile.gender}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="friends" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <h2>Friends</h2>
                                <div class="friend-list-tab mt-2">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="all-friends" role="tabpanel">
                                            <div class="iq-card-body p-0">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6  mb-3" v-for="(friend,key) in friends"
                                                        :key="key">
                                                        <div class="iq-friendlist-block p-3"
                                                            style="border:1px solid rgb(241 219 255);border-bottom-right-radius:51% ;border-top-left-radius:105%; z-index: -999;">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <Link
                                                                        :href="route('profiles.show' , friend.username)">
                                                                    <img :src="friend.profile_photo_url"
                                                                        alt="profile-img"
                                                                        style="height:100px;max-width: 100px;border-radius: 50%;"
                                                                        class="img-fluid">
                                                                    </Link>
                                                                    <div class="friend-info ml-3">
                                                                        <h5>{{friend.username}}</h5>
                                                                        <p class="mb-0">15 friends</p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="iq-card-header-toolbar d-flex align-items-center">
                                                                    <div class="dropdown">
                                                                        <status class="mt-2" :profile="friend"
                                                                            :isFriendsWith="friend.isfriendswith"
                                                                            :friendRequestSentTo="friend.friendrequestsentto"
                                                                            :friendRequestRecievedFrom="friend.friendrequestrecievedfrom">
                                                                        </status>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="clubs" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <h2>Clubs</h2>
                                <div class="friend-list-tab mt-2">
                                    <ul class="nav nav-pills d-flex align-items-center justify-content-left friend-list-items p-0 mb-5"
                                        style="font-size: 15px;
">
                                        <li>
                                            <a class="nav-link active" data-toggle="pill" href="#club-team">Club
                                                Team</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="pill" href="#club-member">Club Member</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="club-team" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-4" v-for="(club, key) in clubsTeam"
                                                    :key="key">
                                                    <div class="iq-card">
                                                        <div class="top-bg-image">
                                                            <img :src="'/storage/assets/images/page-img/profile-bg1.jpg'"
                                                                class="img-fluid w-100" alt="group-bg">
                                                        </div>
                                                        <div class="iq-card-body text-center">
                                                            <div class="group-icon"
                                                                v-if="!club.ClubImage || club.ClubImage == 0">
                                                                <Link :href="route('clubs.show' , club)">
                                                                <img :src="'/storage/assets/images/page-img/gi-1.jpg'"
                                                                    alt="profile-img"
                                                                    class="rounded-circle img-fluid avatar-120"> </Link>
                                                            </div>
                                                            <div class="group-icon" v-else>
                                                                <Link :href="route('clubs.show' , club)">
                                                                <img :src="'/storage/' + club.ClubImage"
                                                                    alt="profile-img"
                                                                    class="rounded-circle img-fluid avatar-120">
                                                                </Link>
                                                            </div>
                                                            <div class="group-info pt-3 pb-3">
                                                                <h4>{{ club.clubName }}</h4>
                                                                <p class="text-primary"> <b> {{ club.roleName }} </b>
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="tab-pane fade" id="club-member" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-4" v-for="(club, key) in clubsMember"
                                                    :key="key">
                                                    <div class="iq-card">
                                                        <div class="top-bg-image">
                                                            <img :src="'/storage/assets/images/page-img/profile-bg1.jpg'"
                                                                class="img-fluid w-100" alt="group-bg">
                                                        </div>
                                                        <div class="iq-card-body text-center">
                                                            <div class="group-icon"
                                                                v-if="!club.ClubImage || club.ClubImage == 0">
                                                                <Link :href="route('clubs.show' , club)">
                                                                <img :src="'/storage/assets/images/page-img/gi-1.jpg'"
                                                                    alt="profile-img"
                                                                    class="rounded-circle img-fluid avatar-120"> </Link>
                                                            </div>
                                                            <div class="group-icon" v-else>
                                                                <Link :href="route('clubs.show' , club)">
                                                                <img :src="'/storage/' + club.ClubImage"
                                                                    alt="profile-img"
                                                                    class="rounded-circle img-fluid avatar-120">
                                                                </Link>
                                                            </div>
                                                            <div class="group-info pt-3 pb-3">
                                                                <h4>{{ club.clubName }}</h4>
                                                                <p class="text-primary"><b> Member</b></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <img :src="'/storage/assets/images/page-img/page-load-loader.gif'" alt="loader" style="height: 100px;">
            </div>
        </template>

    </pages-layout>
</template>

<script>
import PagesLayout from '../../../Layouts/PagesLayout.vue'
import Status from '../../../components/FriendStatus/Status.vue'
import CombPosts from "@/components/Posts/CombPosts.vue";
import PostForm from '@/components/Posts/PostForm.vue';
import InfiniteScroll from "@/components/InfiniteScroll.vue"
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: { PagesLayout, Status, CombPosts, PostForm, InfiniteScroll, Link },
    props: ['clubsTeam', 'clubsMember', 'profile', 'isFriendsWith', 'friendRequestSentTo', 'friendRequestRecievedFrom', 'posts', 'friends'],
    data() {
        return {
            form: this.$inertia.form({
                user_id: this.profile.id,
                body: this.body,
                post_images: [],
            }),
            allPosts: this.posts,
        }
    },
    computed: {
        pagination() {
            return this.allPosts = this.posts
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('posts.store'), {
                forceFormData: true,
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Your post has been successfully published ! '
                    }),
                        this.form.body = null
                    this.from.post_images = []
                }
            })
        },
        loadMorePosts() {
            if (!this.allPosts.next_page_url) {
                return
            }
            return axios.get(this.allPosts.next_page_url)
                .then(resp => {
                    this.allPosts = {
                        ...resp.data,
                        data: [
                            ...this.allPosts.data, ...resp.data.data
                        ]
                    }
                })
        },
        dayOfBirth(created) {
            return moment(created).format('DD MMMM');
        },
        yearOfBirth(created) {
            return moment(created).format("YYYY");
        },

    },
}
</script>

<style>

</style>