<template>


  <!-- loader END -->
  <!-- Sign in Start -->
  <section class="sign-in-page">
    <div id="container-inside">
      <div id="circle-small"></div>
      <div id="circle-medium"></div>
      <div id="circle-large"></div>
      <div id="circle-xlarge"></div>
      <div id="circle-xxlarge"></div>
    </div>
    <div class="container p-0">
      <div class="row no-gutters">
        <div class="col-md-6 text-center pt-5">
          <div class="sign-in-detail text-white">
            <a class="sign-in-logo" href="#">

              <img :src="'./storage/assets/images/logo-full.png'" class="img-fluid" alt="logo" style="height:150px;">


            </a>

            <div v-if=" clubs.length> 0" class="owl-carousel">
              <div class="item" v-for="(club,index) in clubs" :key="index">
                <img v-if="club.ClubImage != 0" :src="'/storage/' + club.ClubImage" class="img-fluid mb-4" alt="logo"
                  style="max-height:160px;">
                <img v-else :src="'./storage/assets/images/login/1.png'" class="img-fluid mb-4" alt="logo">
                <h4 class="mb-1 text-white">{{club.clubName}}</h4>
                <p>{{club.description}}</p>
              </div>
            </div>

            <div v-else class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true"
              data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1"
              data-margin="0">
              <div class="item">
                <img :src="'./storage/assets/images/login/1.png'" class="img-fluid mb-4" alt="logo">
                <h4 class="mb-1 text-white">Find new friends</h4>
                <p>It is a long established fact that a reader will be distracted by the readable
                  content.</p>
              </div>
              <div class="item">
                <img :src="'./storage/assets/images/login/2.png'" class="img-fluid mb-4" alt="logo">
                <h4 class="mb-1 text-white">Connect with the world</h4>
                <p>It is a long established fact that a reader will be distracted by the readable
                  content.</p>
              </div>
              <div class="item">
                <img :src="'./storage/assets/images/login/3.png'" class="img-fluid mb-4" alt="logo">
                <h4 class="mb-1 text-white">Create new events</h4>
                <p>It is a long established fact that a reader will be distracted by the readable
                  content.</p>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-6 bg-white pt-5">
          <div class="sign-in-from">
            <h1 class="mb-0">Sign in</h1>
            <p>Enter your email address and password to access admin panel.</p>
            <form class="mt-4" @submit.prevent="submit">
              <div class="form-group">
                <jet-label for="email" value="Email" />
                <input id="email" type="email" class="form-control" :class="form.errors.email ? 'is-invalid' : ''"
                  v-model="form.email" ref="email" autocomplete="current-password" required autofocus />
                <div class="invalid-feedback" v-if="form.errors.email">
                  {{ form.errors.email }}"
                </div>
              </div>
              <div class="form-group">
                <jet-label for="password" value="Password" />
                <a href="#" class="float-right">Forgot password?</a>
                <input id="password" type="password" class="form-control"
                  :class="form.errors.password ? 'is-invalid' : ''" v-model="form.password" ref="password"
                  autocomplete="current-password" required autofocus />
                <div class="invalid-feedback" v-if="form.errors.password">
                  {{ form.errors.password }}"
                </div>
              </div>
              <div class="d-inline-block w-100">
                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                  <jet-checkbox id="remember_me" name="remember" v-model:checked="form.remember" />
                  <label class="custom-control-label" for="remember_me" />
                </div>
                <button type="submit" class="btn btn-primary float-right">Sign in</button>
              </div>

              <div class="sign-info">
                <span class="dark-color d-inline-block line-height-2">Don't have an account?
                  <Link href="/register">Sign up</Link>
                </span>
                <ul class="iq-social-media">
                  <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                  <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                  <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                </ul>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetCheckbox from '@/Jetstream/Checkbox.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';


export default defineComponent({
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
    clubs: Object,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: false
      })
    }
  },

  mounted() {
    $('.owl-carousel').owlCarousel({
      center: true,
      loop: true,
      autoplay: true,
      autoplayTimeout: 2200,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
  },
  methods: {
    submit() {
      this.form
        .transform(data => ({
          ...data,
          remember: this.form.remember ? 'on' : ''
        }))
        .post(this.route('login'), {
          onFinish: () => this.form.reset('password'),
        })
    },
    addScript(src) {
      var s = document.createElement("script");
      s.setAttribute("src", src);
      document.body.appendChild(s);
    }
  }
})
</script>
<style >
.owl-carousel .owl-item img {
  display: initial;
  border-radius: 15px;
  margin-top: 15px;
}
</style>
