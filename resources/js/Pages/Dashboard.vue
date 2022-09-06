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
                <!-- Form Post -->
                <PostForm :method="submit" :form="form" :text="'Post'"></PostForm>


                <!-- End Post Form -->
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

        <infinite-scroll @loadMore="loadMorePosts">
          <comb-posts :posts="allPosts.data" :pagination="pagination"></comb-posts>
        </infinite-scroll>

      </div>
      <div class="col-lg-4">
        <suggestion-block :suggestions="suggestions"></suggestion-block>
      </div>

    </template>


  </pages-layout>
</template>

<script>
import { VueSpinner } from 'vue3-spinners';
import { defineComponent } from "vue"
import PagesLayout from "@/Layouts/PagesLayout.vue";
import CombPosts from "../components/Posts/CombPosts.vue";
import PostForm from '../components/Posts/PostForm.vue';
import SuggestionBlock from '../components/SuggestionBlock.vue';
import InfiniteScroll from "@/components/InfiniteScroll.vue"

export default defineComponent({
  components: {
    PagesLayout,
    CombPosts,
    VueSpinner,
    PostForm,
    SuggestionBlock,
    InfiniteScroll,
  },
  props: ['combinedPosts', 'suggestions'],
  data() {
    return {
      form: this.$inertia.form({
        user_id: this.$page.props.user.id,
        body: this.body,
        post_images: [],
      }),
      allPosts: this.combinedPosts,
    }
  },
  computed: {
    pagination() {
      return this.allPosts = this.combinedPosts
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
    }
  },


});
</script>
