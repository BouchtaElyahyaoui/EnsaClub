<template>



  <form @submit.prevent="updateProfileInformation">




    <div class="form-group row align-items-center">
      <div class="col-md-12">
        <div class="profile-img-edit" v-if="$page.props.jetstream.managesProfilePhotos">

          <input type="file" hidden ref="photo" @change="updatePhotoPreview">
          <!-- Current Profile Photo -->
          <div v-show="!photoPreview">
            <img class="profile-pic" :src="user.profile_photo_url" alt="Current Profile Photo" />
          </div>

          <!-- New Profile Photo Preview -->
          <div v-show="photoPreview">
            <img class="profile-pic" :src="photoPreview" alt="Current Profile Photo" />
          </div>
          <div class="p-image">
            <i class="ri-pencil-line upload-button" type="button" @click.prevent="selectNewPhoto"></i>

            <!-- <jet-secondary-button class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
              Select A New Photo
            </jet-secondary-button>
            <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto"
              v-if="user.profile_photo_path">
              Remove Photo
            </jet-secondary-button> -->
            <div class="text-danger" v-if="form.errors.photo">{{ form.errors.photo }}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="row align-items-center">
      <div class="form-group col-sm-6">
        <label for="email">email:</label>
        <input type="email" class="form-control" :class="form.errors.email ? 'is-invalid' : ''" id="email"
          v-model="form.email" />
        <div class="invalid-feedback" v-if="form.errors.email">
          {{ form.errors.email }}"
        </div>
      </div>
      <div class=" form-group col-sm-6">
        <label for="gender">Gender:</label>
        <v-select :options="['Male' , 'Female']" placeholder="Gender" v-model="form.gender" label="Gender">
        </v-select>
        <div class="text-danger mt-1" v-if="form.errors.gender">{{ form.errors.gender }}</div>

      </div>
      <div class=" form-group col-sm-6">
        <label for="name">Full Name:</label>
        <input type="text" class="form-control" v-model="form.name" id="name" />
        <div class="text-danger mt-1" v-if="form.errors.name">{{ form.errors.name }}</div>

      </div>
      <div class="form-group col-sm-6">
        <label for="username">User Name:</label>
        <input type="text" class="form-control" :class="form.errors.username ? 'is-invalid' : ''"
          v-model="form.username" id="username" />
        <div class="invalid-feedback" v-if="form.errors.username">
          {{ form.errors.username }}"
        </div>
        <!-- <div class="text-danger mt-1" v-if="form.errors.username">{{ form.errors.username }}</div> -->

      </div>

      <div class="form-group col-sm-6">
        <label for="phone">Phone Number:</label>
        <input type="text" class="form-control" v-model="form.phone" id="phone" />
        <div class="text-danger mt-1" v-if="form.errors.phone">{{ form.errors.phone }}</div>

      </div>
      <div class="form-group col-sm-6">
        <label for="cne">CNE :</label>
        <input type="text" class="form-control" v-model="form.cne" id="cne" />
        <div class="text-danger mt-1" v-if="form.errors.cne">{{ form.errors.cne }}</div>
      </div>
      <div class="form-group col-sm-6">
        <label for="city">City : </label>
        <input type="text" class="form-control" v-model="form.city" id="city" />
        <div class="text-danger mt-1" v-if="form.errors.city">{{ form.errors.city }}</div>
      </div>
      <div class="form-group col-sm-6">
        <label for="address">Address :</label>
        <input type="text" class="form-control" v-model="form.address" id="address" />
        <div class="text-danger mt-1" v-if="form.errors.address">{{ form.errors.address }}</div>
      </div>
      <div class="form-group col-sm-6">
        <label for="country">Country :</label>
        <input type="text" class="form-control" v-model="form.country" id="country" />
        <div class="text-danger mt-1" v-if="form.errors.country">{{ form.errors.country }}</div>
      </div>
      <div class="form-group col-sm-6">
        <label for="dob">Date of Birth :</label>
        <input type="datetime-local" class="form-control" id="exampleInputdatetime" v-model="form.dob">
        <div class="text-danger mt-1" v-if="form.errors.dob">{{ form.errors.dob }}</div>
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
import vSelect from "vue-select";


export default defineComponent({
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    vSelect
  },

  props: ['user'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.user.name,
        email: this.user.email,
        username: this.user.username,
        gender: this.$page.props.auth.profile.gender,
        cne: this.$page.props.auth.profile.cne,
        city: this.$page.props.auth.profile.city,
        country: this.$page.props.auth.profile.country,
        address: this.$page.props.auth.profile.address,
        phone: this.$page.props.auth.profile.phone,
        dob: this.$page.props.auth.profile.dob,
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

      this.form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () =>
          Toast.fire({
            icon: 'success',
            title: 'You have updated your profile succeffuly ! '
          })
            (this.clearPhotoFileInput())

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