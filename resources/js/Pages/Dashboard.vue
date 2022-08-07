<template>
  <pages-layout>
    <template #title>


      <div class="col-lg-8 row m-0 p-0">
        <div class="col-sm-12">
          <div id="post-modal-data" class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
              <div class="iq-header-title">
                <h4 class="card-title">Create Post</h4>
              </div>
            </div>
            <div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
              <div class="d-flex align-items-center">
                <div class="user-img">
                  <img :src="$page.props.user.profile_photo_url" alt="userimg" class="avatar-60 rounded-circle">
                </div>
                <form class="post-text ml-3 w-100" @submit.prevent="submit">
                  <input type="text" v-model="form.body" class="form-control rounded"
                    placeholder="Write something here..." style="border:none;">
                  <button type="submit" class="btn btn-primary d-block w-100 mt-3" :disabled="form.processing">
                    <VueSpinner v-if="form.processing" size="30" color="white" />
                    <template v-else>
                      Post
                    </template>
                  </button>
                </form>
              </div>


              <!-- <ul class="post-opt-block d-flex align-items-center list-inline m-0 p-0">
                <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img
                    :src="'/storage/assets/images/small/07.png'" alt="icon" class="img-fluid"> Photo/Video
                </li>
                <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img
                    :src="'/storage/assets/images/small/08.png'" alt="icon" class="img-fluid"> Tag Friend
                </li>
                <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img
                    :src="'/storage/assets/images/small/09.png'" alt="icon" class="img-fluid">
                  Feeling/Activity</li>
                <li class="iq-bg-primary rounded p-2 pointer">
                  <div class="iq-card-header-toolbar d-flex align-items-center">
                    <div class="dropdown">
                      <span class="dropdown-toggle" id="post-option" data-toggle="dropdown">
                        <i class="ri-more-fill"></i>
                      </span>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-option" style="">
                        <a class="dropdown-item" href="#">Check in</a>
                        <a class="dropdown-item" href="#">Live Video</a>
                        <a class="dropdown-item" href="#">Gif</a>
                        <a class="dropdown-item" href="#">Watch Party</a>
                        <a class="dropdown-item" href="#">Play with Friend</a>
                      </div>
                    </div>
                  </div>
                </li>
              </ul> -->
            </div>

          </div>
        </div>

        <comb-posts :posts="combinedPosts.data"></comb-posts>
      </div>

    </template>


  </pages-layout>
</template>

<script>
import { VueSpinner } from 'vue3-spinners';
import { defineComponent } from "vue"
import PagesLayout from "@/Layouts/PagesLayout.vue";
import CombPosts from "../components/Posts/CombPosts.vue";
export default defineComponent({
  components: {
    PagesLayout,
    CombPosts,
    VueSpinner
  },
  props: ['combinedPosts'],
  data() {
    return {
      form: this.$inertia.form({
        user_id: this.$page.props.user.id,
        body: this.body,
      }),
    }
  },
  methods: {
    submit() {
      this.form.post(this.route('posts.store'), {
        preserveScroll: true,
        onSuccess: () => {
          Toast.fire({
            icon: 'success',
            title: 'Your post has been successfully published ! '
          }),
            this.form.body = null
        }
      })
    }
  },

});
</script>
