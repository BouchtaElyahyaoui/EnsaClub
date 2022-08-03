<template>
  <app-layout title="Profile">
    <div class="col-lg-12">
      <div class="iq-card">
        <div class="iq-card-body p-0">
          <div class="iq-edit-list">
            <ul class="iq-edit-profile d-flex nav nav-pills">
              <li class="col-md-3 col-lg-6 p-0">
                <a class="nav-link active" data-toggle="pill" href="#personal-information">
                  Personal Information
                </a>
              </li>
              <li class="col-md-3 col-lg-6 p-0">
                <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                  Change Password
                </a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="iq-edit-list-data">
        <div class="tab-content">
          <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
            <div class="iq-card">
              <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                  <h4 class="card-title">Personal Information</h4>
                </div>
              </div>
              <div class="iq-card-body" v-if="$page.props.jetstream.canUpdateProfileInformation">
                <update-profile-information-form :user="$page.props.user" />
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
            <div class="iq-card">
              <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                  <h4 class="card-title">Change Password</h4>
                </div>
              </div>
              <div class="iq-card-body" v-if="$page.props.jetstream.canUpdatePassword">
                <update-password-form />
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="emailandsms" role="tabpanel">
            <div class="iq-card">
              <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                  <h4 class="card-title">Email and SMS</h4>
                </div>
              </div>
              <div class="iq-card-body">
                <form>
                  <div class="form-group row align-items-center">
                    <label class="col-md-3" for="emailnotification">Email Notification:</label>
                    <div class="col-md-9 custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="emailnotification" checked="" />
                      <label class="custom-control-label" for="emailnotification"></label>
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                    <div class="col-md-9 custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="smsnotification" checked="" />
                      <label class="custom-control-label" for="smsnotification"></label>
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <label class="col-md-3" for="npass">When To Email</label>
                    <div class="col-md-9">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="email01" />
                        <label class="custom-control-label" for="email01">You have new notifications.</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="email02" />
                        <label class="custom-control-label" for="email02">You're sent a direct message</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="email03" checked="" />
                        <label class="custom-control-label" for="email03">Someone adds you as a connection</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <label class="col-md-3" for="npass">When To Escalate Emails</label>
                    <div class="col-md-9">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="email04" />
                        <label class="custom-control-label" for="email04">
                          Upon new order.</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="email05" />
                        <label class="custom-control-label" for="email05">
                          New membership approval</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="email06" checked="" />
                        <label class="custom-control-label" for="email06">
                          Member registration</label>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">
                    Submit
                  </button>
                  <button type="reset" class="btn iq-bg-danger">
                    Cancle
                  </button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>




  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue'
import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue'
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue'
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'

export default defineComponent({
  props: ['sessions'],

  components: {
    AppLayout,
    DeleteUserForm,
    JetSectionBorder,
    LogoutOtherBrowserSessionsForm,
    TwoFactorAuthenticationForm,
    UpdatePasswordForm,
    UpdateProfileInformationForm,
  },
})
</script>
