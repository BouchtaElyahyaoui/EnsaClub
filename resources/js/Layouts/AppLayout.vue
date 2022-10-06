<template>

  <div class="wrapper">
    <!-- TOP Nav Bar -->

    <div class="iq-top-navbar ">
      <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
          <div class="iq-navbar-logo  d-flex justify-content-between">
            <Link :href="route('dashboard.index')">
            <img :src="'/storage/assets/images/logo.png'" height="95px" class="" alt="">
            </Link>
            <div class="iq-menu-bt align-self-center">
              <div class="wrapper-menu">
                <div class="main-circle"><i class="ri-menu-line"></i></div>
              </div>
            </div>
          </div>
          <div class="iq-search-bar" v-if="$page.url.startsWith('/user/dashboard')">
            <form action="#" class="searchbox">
              <input type="text" class="text search-input" v-model="input" placeholder="Type here to search...">
              <a class="search-link" href="#"><i class="ri-search-line"></i></a>
            </form>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
            <i class="ri-menu-3-line"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-list">
              <li>
                <a href="profile.html" class="iq-waves-effect d-flex align-items-center">
                  <img v-if="$page.props.jetstream.managesProfilePhotos" :src="$page.props.user.profile_photo_url"
                    class="img-fluid rounded-circle mr-3" :alt="$page.props.user.name">
                  <div class="caption">
                    <h6 class="mb-0 line-height">{{ $page.props.user.name }}</h6>
                  </div>
                </a>
              </li>
              <li>
                <Link :href="route('dashboard.index')" class="iq-waves-effect d-flex align-items-center">
                <i class="ri-home-line"></i>
                </Link>
              </li>

              <!-- Invitations  -->
              <li class="nav-item">
                <a class="search-toggle iq-waves-effect" href="#"><i class="ri-group-line"></i></a>
                <span v-if="this.invitationsHandle.length > 0" class="bg-info dots"></span>
                <div class="iq-sub-dropdown iq-sub-dropdown-large">
                  <div class="iq-card shadow-none m-0">
                    <div class="iq-card-body p-0 ">
                      <div class="bg-primary p-3">
                        <h5 class="mb-0 text-white">Friend Request<small class="badge  badge-light float-right pt-1">{{
                        this.invitationsHandle.length
                        }}</small></h5>
                      </div>
                      <div class="iq-friend-request" v-for="(invitation, index) in this.invitationsHandle" :key="index">
                        <div class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center">
                            <div class="" v-if="invitation.data.info.user">
                              <Link :href="route('profiles.show', invitation.data.info.user.username)">
                              <img class="avatar-40 rounded" :src="invitation.data.info.avatar" alt="">
                              </Link>
                            </div>
                            <div class="media-body ml-3" v-if="invitation.data.info.user">
                              <h6 class="mb-0 ">{{ invitation.data.info.user.username }}</h6>
                              <p class="mb-0">40 Friends</p>
                            </div>
                          </div>
                          <div class="d-flex align-items-center">
                            <accept :profile="invitation.data.info.user" :notification="invitation"></accept>
                            <ignore :profile="invitation.data.info.user" :notification="invitation"></ignore>
                          </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <a href="#" class="mr-3 btn text-primary">View More Request</a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" class="search-toggle iq-waves-effect">
                  <div id="lottie-beil">
                    <i class="ri-notification-4-line"></i>
                  </div>
                  <span v-if="this.unreadNotifications.length > 0" class="bg-danger dots"></span>
                </a>
                <div class="iq-sub-dropdown">
                  <div class="iq-card shadow-none m-0">
                    <div class="iq-card-body p-0 " v-if="notifications.length > 0">
                      <div class="bg-primary p-3">
                        <h5 class="mb-0 text-white">All Notifications<small
                            class="badge  badge-light float-right pt-1">{{this.unreadNotifications.length}}</small></h5>
                      </div>
                      <notifications :reads="readNotifications" :unreads="unreadNotifications"
                        :notifications="notifications"></notifications>

                    </div>
                    <div class="iq-card-body p-0 " v-else>
                      <div class="bg-primary p-3">
                        <h5 class="mb-0 text-white">No Notification<small
                            class="badge  badge-light float-right pt-1">0</small></h5>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

            </ul>
            <ul class="navbar-list">
              <li>
                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                  <i class="ri-arrow-down-s-fill"></i>
                </a>
                <div class="iq-sub-dropdown iq-user-dropdown">
                  <div class="iq-card shadow-none m-0">
                    <div class="iq-card-body p-0 ">
                      <div class="bg-primary p-3 line-height">
                        <h5 class="mb-0 text-white line-height">Hello Bni Cyst</h5>
                        <span class="text-white font-size-12">Available</span>
                      </div>
                      <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                        <div class="media align-items-center">
                          <div class="rounded iq-card-icon iq-bg-primary">
                            <i class="ri-file-user-line"></i>
                          </div>
                          <div class="media-body ml-3">
                            <h6 class="mb-0 ">My Profile</h6>
                            <p class="mb-0 font-size-12">View personal profile details.</p>
                          </div>
                        </div>
                      </a>
                      <Link :href="route('profile.show')" class="iq-sub-card iq-bg-warning-hover">
                      <div class="media align-items-center">
                        <div class="rounded iq-card-icon iq-bg-warning">
                          <i class="ri-profile-line"></i>
                        </div>
                        <div class="media-body ml-3">
                          <h6 class="mb-0 ">Edit Profile</h6>
                          <p class="mb-0 font-size-12">Modify your personal details.</p>
                        </div>
                      </div>
                      </Link>
                      <a href="account-setting.html" class="iq-sub-card iq-bg-info-hover">
                        <div class="media align-items-center">
                          <div class="rounded iq-card-icon iq-bg-info">
                            <i class="ri-account-box-line"></i>
                          </div>
                          <div class="media-body ml-3">
                            <h6 class="mb-0 ">Account settings</h6>
                            <p class="mb-0 font-size-12">Manage your account parameters.</p>
                          </div>
                        </div>
                      </a>
                      <a href="privacy-setting.html" class="iq-sub-card iq-bg-danger-hover">
                        <div class="media align-items-center">
                          <div class="rounded iq-card-icon iq-bg-danger">
                            <i class="ri-lock-line"></i>
                          </div>
                          <div class="media-body ml-3">
                            <h6 class="mb-0 ">Privacy Settings</h6>
                            <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                          </div>
                        </div>
                      </a>
                      <div class="d-inline-block w-100 text-center p-3">
                        <form @submit.prevent="logout">
                          <button class="btn btn-primary rounded-pill mb-1" type="submit"><i
                              class="ri-login-box-line"></i> Log out</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>

          </div>
        </nav>
      </div>
    </div>
    <!-- TOP Nav Bar END -->

    <!-- Left Side Bar -->
    <LeftSideBar></LeftSideBar>

    <div id="content-page" class="content-page">
      <div class="container">
        <div class="row ">
          <slot></slot>
        </div>
      </div>
    </div>



  </div>

  <!-- Page Heading
  <header class=" d-flex py-3 bg-white shadow-sm border-bottom">
      <div class="container">
        <slot name="header"></slot>
      </div>
      </header> -->

  <!-- Page Content -->

</template>

<script>
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetDropdown from '@/Jetstream/Dropdown.vue'
import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import LeftSideBar from '../components/LeftSideBar.vue'
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import Ignore from '@/components/FriendStatus/Ignore.vue'
import Accept from '@/components/FriendStatus/Accept.vue'
import Notifications from '@/components/Notifications.vue'
import { useAutoAnimate } from '@formkit/auto-animate/vue'
import { toRef, watch, ref } from 'vue'
import debounce from "lodash/debounce";
import { Inertia } from "@inertiajs/inertia";


export default {
  setup(props) {
    let input = ref()
    const refPosts = toRef(props, 'allPosts')
    const [parent] = useAutoAnimate({ duration: 400 })


    const invitations = computed(() => usePage().props.value.invitations);

    watch(input, debounce(function (value) {
      Inertia.get(route('dashboard.index'), { input: value }, {
        preserveState: true,
        replace: true
      });
    }, 500))
    return { invitations, input, refPosts, parent }
  },
  props: {
    title: String,
    allPosts: Object,
    filters: Object,
  },

  components: {
    Head,
    JetApplicationLogo,
    JetApplicationMark,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    Link,
    LeftSideBar,
    Accept,
    Ignore,
    Notifications
  },

  data() {
    return {
      showingNavigationDropdown: false,
      unreadNotifications: this.$page.props.auth.unreadNotifications,
      readNotifications: this.$page.props.auth.readNotifications,
      notifications: this.$page.props.auth.notifications,
      invitationsHandle: this.$page.props.auth.invitationsHandle,

    }
  },

  methods: {

    logout() {
      this.$inertia.post(route('logout'));
    },
    listen() {
      Echo.private(`App.Models.User.${this.$page.props.user.id}`)
        .notification((notification) => {
          let newUnreadNotifications = {
            data: {
              info: {
                avatar: notification.info.avatar,
                message: notification.info.message,
                link: notification.info.link,
                user: notification.info.user,
                sent: notification.info.sent,
              }
            },
            type: notification.type,
            id: notification.id
          }
          this.unreadNotifications.push(newUnreadNotifications)
          this.notifications.push(newUnreadNotifications)
          if (newUnreadNotifications.type === "App\Notifications\FriendRequestReceived") {
            this.invitationsHandle.push(newUnreadNotifications)
          }

        })
    },
  },

  mounted() {
    this.listen()
  },
  computed: {
    path() {
      return window.location.pathname
    }
  }
}
</script>

