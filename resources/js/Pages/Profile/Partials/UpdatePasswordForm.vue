<template>
  <form @submit.prevent="updatePassword">
    <div class="form-group">
      <label for="cpass">Current Password:</label>
      <a href="" class="float-right">Forgot Password</a>
      <input id="current_password" type="password" class="form-control" v-model="form.current_password"
        ref="current_password" autocomplete="current-password" />
      <jet-input-error :message="form.errors.current_password" class="mt-2" />
    </div>
    <div class="form-group">
      <label for="npass">New Password:</label>
      <input id="password" type="password" class="form-control" v-model="form.password" autocomplete="new-password" />
      <jet-input-error :message="form.errors.password" class="mt-2" />
    </div>
    <div class="form-group">
      <label for="vpass">Verify Password:</label>
      <input id="password_confirmation" type="password" class="form-control" v-model="form.password_confirmation"
        autocomplete="new-password" />
      <jet-input-error :message="form.errors.password_confirmation" class="mt-2" />
    </div>
    <button :disabled="form.processing" class="btn btn-primary mr-2">
      Submit
    </button>
  </form>

</template>

<script>
import { defineComponent } from 'vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'

export default defineComponent({
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
  },

  data() {
    return {
      form: this.$inertia.form({
        current_password: '',
        password: '',
        password_confirmation: '',
      }),
    }
  },

  methods: {
    updatePassword() {
      this.form.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => this.form.reset(),
        onError: () => {
          if (this.form.errors.password) {
            this.form.reset('password', 'password_confirmation')
            this.$refs.password.focus()
          }

          if (this.form.errors.current_password) {
            this.form.reset('current_password')
            this.$refs.current_password.focus()
          }
        }
      })
    },
  },
})
</script>
