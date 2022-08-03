<template>



  <form @submit.prevent="updateProfileInformation">
    <div class="form-group row align-items-center">
      <div class="col-md-12">
        <div class="profile-img-edit" v-if="$page.props.jetstream.managesProfilePhotos">
          <img class="profile-pic" v-show="!photoPreview" :src="user.profile_photo_url" alt="Current Profile Photo" />
          <img class="profile-pic" v-show="photoPreview" :src="photoPreview" alt="Current Profile Photo" />
          <div class="p-image">
            <i class="ri-pencil-line upload-button" type="button" @click.prevent="selectNewPhoto"></i>
            <input type="file" class="file-upload" hidden ref="photo" @change="updatePhotoPreview">
            <div class="d-flex align-items-center">
              <button type="submit" class="btn btn-primary mr-2" @click.prevent="selectNewPhoto">
                Select A New Photo
              </button>
              <button type="reset" class="btn iq-bg-danger" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
                Remove Photo
              </button>
            </div>
            <!-- <jet-secondary-button class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
              Select A New Photo
            </jet-secondary-button>
            <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto"
              v-if="user.profile_photo_path">
              Remove Photo
            </jet-secondary-button> -->
            <jet-input-error :message="form.errors.photo" class="mt-2" />
          </div>
        </div>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="form-group col-lg-12 col-sm-6">
        <label for="email">email:</label>
        <input type="email" class="form-control" id="email" v-model="form.email" />
      </div>
      <div class="form-group col-sm-6">
        <label for="name">Full Name:</label>
        <input type="text" class="form-control" v-model="form.name" id="name" />
      </div>
      <div class="form-group col-sm-6">
        <label for="username">User Name:</label>
        <input type="text" class="form-control" v-model="form.username" id="username" />
      </div>

      <div class="form-group col-sm-6">
        <label for="phone">Phone Number:</label>
        <input type="text" class="form-control" v-model="form.phone" id="phone" />
      </div>
      <div class="form-group col-sm-6">
        <label for="cne">CNE :</label>
        <input type="text" class="form-control" v-model="form.cne" id="cne" />
      </div>
      <!-- <div class="form-group col-sm-6">
        <label class="d-block">Gender:</label>
        <div class="custom-control custom-radio custom-control-inline">
          <input v-model="form.gender" type="radio" id="customRadio6" name="customRadio1" class="custom-control-input"
            checked="" />
          <label class="custom-control-label" for="customRadio6">
            Male
          </label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input v-model="form.gender" type="radio" id="customRadio7" name="customRadio1"
            class="custom-control-input" />
          <label class="custom-control-label" for="customRadio7">
            Female
          </label>
        </div>
      </div> -->
      <!-- <div class="form-group col-sm-6">
        <label for="dob">Date Of Birth:</label>
        <input class="form-control" id="dob" value="1984-01-24" />
      </div> -->
      <!-- <div class="form-group col-sm-6">
        <country-select v-model="form.country" :country="country" topCountry="US" />
      </div>
      <div class="form-group col-sm-6">
        <region-select v-model="form.city" :country="country" :region="region" />
      </div> -->
      <!-- <div class="form-group col-sm-12">
        <label>Address:</label>
        <textarea class="form-control" v-model="form.address" name="address" rows="5" style="line-height: 22px">

                                             </textarea>
      </div> -->
    </div>
    <button :disabled="form.processing" class="btn btn-primary mr-2">
      Submit
    </button>

  </form>










</template>

<script>
import { defineComponent } from 'vue'
import JetButton from '@/Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

export default defineComponent({
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
  },

  props: ['user'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.user.name,
        email: this.user.email,
        username: this.user.username,
        gender: this.user.profile.gender,
        cne: this.user.profile.cne,
        city: this.user.profile.city,
        country: this.user.profile.country,
        address: this.user.profile.address,
        phone: this.user.profile.phone,
        dob: this.user.profile.dob,
        photo: null,
      }),

      photoPreview: null,
    }
  },

  methods: {
    updateProfileInformation() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0]
      }

      this.form.put(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => (this.clearPhotoFileInput()),
      });
    },

    selectNewPhoto() {
      this.$refs.photo.click();
    },

    updatePhotoPreview() {
      const photo = this.$refs.photo.files[0];

      if (!photo) return;

      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(photo);
    },

    deletePhoto() {
      this.$inertia.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
          this.photoPreview = null;
          this.clearPhotoFileInput();
        },
      });
    },

    clearPhotoFileInput() {
      if (this.$refs.photo?.value) {
        this.$refs.photo.value = null;
      }
    },
  },
})
</script>
