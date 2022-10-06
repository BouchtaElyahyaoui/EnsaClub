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
            <a class="sign-in-logo mb-5" href="/welcome"><img :src="'/storage/assets/images/logo-full.png'"
                class="img-fluid" style="height:150px;" alt="logo"></a>
            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true"
              data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1"
              data-margin="0">
              <div class="item">
                <img :src="'/storage/assets/images/login/1.png'" class="img-fluid mb-4" alt="logo">
                <h4 class="mb-1 text-white">Manage your orders</h4>
                <p>It is a long established fact that a reader will be distracted by the readable
                  content.</p>
              </div>
              <div class="item">
                <img :src="'/storage/assets/images/login/2.png'" class="img-fluid mb-4" alt="logo">
                <h4 class="mb-1 text-white">Manage your orders</h4>
                <p>It is a long established fact that a reader will be distracted by the readable
                  content.</p>
              </div>
              <div class="item">
                <img :src="'/storage/assets/images/login/3.png'" class="img-fluid mb-4" alt="logo">
                <h4 class="mb-1 text-white">Manage your orders</h4>
                <p>It is a long established fact that a reader will be distracted by the readable
                  content.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 bg-white pt-5">
          <div class="sign-in-from">
            <h1 class="mb-0">Sign Up</h1>
            <p>Enter your email address and password to access admin panel.</p>
            <form @submit.prevent="submit" class="mt-4">
              <jet-validation-errors class="mb-3" />
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <jet-label for="name" value="Name :" />
                    <jet-input id="name" type="text" v-model="form.name" required autofocus autocomplete="name" />
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <jet-label for="username" value="User Name :" />
                    <jet-input id="username" type="text" v-model="form.username" required autofocus
                      autocomplete="username" />
                  </div>
                </div>
              </div>


              <div class="form-group">
                <jet-label for="email" value="Email :" />
                <jet-input id="email" type="email" v-model="form.email" required />
              </div>

              <div class="form-group">
                <jet-label for="gender">Gender</jet-label>
                <v-select :options="['Male' , 'Female']" placeholder="Gender" v-model="form.gender" label="Gender">
                </v-select>
                <!-- <select v-model="form.gender" class="form-control" id="gender">
                  <option selected="" disabled value="">Gender</option>
                  <option :value="'Male'">Male</option>
                  <option :value="'Female'">Female</option>
                </select> -->
              </div>
              <div class="form-group">
                <jet-label for="password" value="Password :" />
                <jet-input id="password" type="password" v-model="form.password" required autocomplete="new-password" />
              </div>
              <div class="form-group">
                <jet-label for="password_confirmation" value="Confirm Password :" />
                <jet-input id="password_confirmation" type="password" v-model="form.password_confirmation" required
                  autocomplete="new-password" />
              </div>
              <div class="d-inline-block w-100">
                <button :disabled="form.processing" class="btn btn-primary float-right">Sign Up</button>
              </div>
              <div class="sign-info">

                <span class="dark-color d-inline-block line-height-2">
                  <Link :href="route('login')" class="text-muted me-3 text-decoration-none">
                  Already registered?
                  </Link>
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
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from '@/Jetstream/Label.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import vSelect from "vue-select";


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
    vSelect
  },

  data() {
    return {
      form: this.$inertia.form({
        name: '',
        username: '',
        email: '',
        gender: '',
        // dob: '',
        // country: '',
        // city: '',
        // cne: '',
        password: '',
        password_confirmation: '',
        terms: false,
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
      this.form.post(this.route('register'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      })
    }
  }
})
</script>

<style >
.v-select .vs__search::placeholder {
  color: #555770;
}

.v-select .vs__dropdown-toggle,
.v-select .vs__dropdown-menu {
  border-radius: 10px;
  border-left: 3px solid #8755f2;
  color: #555770;
  padding: 8px;
}

.v-select .vs__selected {
  background: #8755f2;
  color: white;
}
</style>