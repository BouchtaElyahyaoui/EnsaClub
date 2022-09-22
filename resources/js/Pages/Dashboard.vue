<template>
  <pages-layout>
    <template #title>


      <div class="col-lg-8 row m-0 p-0">
        <!-- <div class="col-sm-12">
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
                </div> -->
        <!-- Form Post -->
        <PostForm :method="submit" :user_clubs="user_clubs" :form="form" :text="'Post'"></PostForm>


        <!-- End Post Form -->
        <!-- </div>
            </div>

          </div>
        </div> -->

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
  props: ['combinedPosts', 'suggestions', 'user_clubs'],
  data() {
    return {
      form: this.$inertia.form({
        user_id: this.$page.props.user.id,
        body: this.body,
        user_club: this.user_club,
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
