<template>
  <pages-layout>
    <template #title>
      <div class="col-sm-12">
        <div class="iq-card">
          <div class="iq-card-body chat-page p-0">
            <div class="chat-data-block">
              <div class="row">
                <div class="col-lg-3 chat-data-left scroller">
                  <div class="chat-search pt-3 pl-3">
                    <div class="d-flex align-items-center">
                      <div class="chat-profile mr-3">
                        <img :src="$page.props.user.profile_photo_url" alt="chat-user" class="avatar-60" />
                      </div>
                      <div class="chat-caption">
                        <h5 class="mb-0">{{ $page.props.user.username }}</h5>
                        <p class="m-0">{{ $page.props.user.name }}</p>
                      </div>
                      <button type="submit" class="close-btn-res p-3">
                        <i class="ri-close-fill"></i>
                      </button>
                    </div>
                    <div id="user-detail-popup" class="scroller">
                      <div class="user-profile">
                        <button type="submit" class="close-popup p-3">
                          <i class="ri-close-fill"></i>
                        </button>
                        <div class="user text-center mb-4">
                          <a class="avatar m-0">
                            <img src="/storage/assets/images/user/1.jpg" alt="avatar" />
                          </a>
                          <div class="user-name mt-4">
                            <h4>Bni Jordan</h4>
                          </div>
                          <div class="user-desc">
                            <p>Web Designer</p>
                          </div>
                        </div>
                        <hr />
                        <div class="user-detail text-left mt-4 pl-4 pr-4">
                          <h5 class="mt-4 mb-4">About</h5>
                          <p>
                            It is long established fact that a reader will be
                            distracted bt the reddable.
                          </p>
                          <h5 class="mt-3 mb-3">Status</h5>
                          <ul class="user-status p-0">
                            <li class="mb-1">
                              <i class="
                                  ri-checkbox-blank-circle-fill
                                  text-success
                                  pr-1
                                "></i><span>Online</span>
                            </li>
                            <li class="mb-1">
                              <i class="
                                  ri-checkbox-blank-circle-fill
                                  text-warning
                                  pr-1
                                "></i><span>Away</span>
                            </li>
                            <li class="mb-1">
                              <i class="
                                  ri-checkbox-blank-circle-fill
                                  text-danger
                                  pr-1
                                "></i><span>Do Not Disturb</span>
                            </li>
                            <li class="mb-1">
                              <i class="
                                  ri-checkbox-blank-circle-fill
                                  text-light
                                  pr-1
                                "></i><span>Offline</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="chat-searchbar mt-4">
                      <div class="form-group chat-search-data m-0">
                        <input type="text" class="form-control round" id="chat-search" placeholder="Search" />
                        <i class="ri-search-line"></i>
                      </div>
                    </div>
                  </div>
                  <div class="chat-sidebar-channel scroller mt-4 pl-3">
                    <h5 class="">Public Channels</h5>
                    <ul class="iq-chat-ui nav flex-column nav-pills">
                      <li v-for="(room, key) in rooms" :key="key">
                        <Link data-toggle="pill" v-if="room.belongs == 1" :class="
                          currentRoom.id == room.id ? 'active show' : ''
                        " :href="route('chat-rooms.index', room)">
                        <div class="d-flex align-items-center">
                          <div class="avatar mr-2">
                            <img src="/storage/assets/images/user/05.jpg" alt="chatuserimage" class="avatar-50" />
                            <span class="avatar-status"><i class="
                                    ri-checkbox-blank-circle-fill
                                    text-success
                                  "></i></span>
                          </div>
                          <div class="chat-sidebar-name">
                            <h6 class="mb-0">{{ room.name }}</h6>
                            <span>{{ room.slug }}</span>
                          </div>
                          <div v-if="
                            activeCount > 0 && currentRoom.id == room.id
                          " class="
                                chat-meta
                                float-right
                                text-center
                                mt-2
                                mr-1
                              ">
                            <div class="chat-msg-counter bg-primary text-white">
                              {{ activeCount }}
                            </div>
                            <!-- <span class="text-nowrap">05 min</span> -->
                          </div>
                        </div>
                        </Link>
                      </li>
                    </ul>

                  </div>
                </div>
                <div class="col-lg-9 chat-data p-0 chat-data-right">
                  <div class="tab-content">
                    <div class="tab-pane fade" :class="!currentRoom.id ? 'active show' : ''" id="default-block"
                      role="tabpanel">
                      <div class="chat-start">
                        <span class="iq-start-icon text-primary"><i class="ri-message-3-line"></i></span>
                        <button data-toggle="modal" data-target=".bd-example-modal-xl"
                          v-on:click="this.showModal = true" class="btn bg-white mt-3">
                          Start A New Conversation!
                        </button>

                        <div ref="modal" class="modal fade bd-example-modal-xl mt-5" tabindex="-1" role="dialog"
                          aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content" style="background-color: #1e2745">
                              <div class="modal-body">
                                <div class="iq-card">
                                  <div class="
                                      iq-card-header
                                      d-flex
                                      justify-content-between
                                    ">
                                    <div class="iq-header-title">
                                      <h4 class="card-title">
                                        Add a new Room :
                                      </h4>
                                    </div>
                                  </div>
                                  <div class="iq-card-body">
                                    <p>Add your Room :</p>
                                    <form @submit.prevent="submitRoom">
                                      <div class="form-group">
                                        <label>Club :</label>
                                        <v-select class="vSelect" :options="clubs"
                                          :placeholder="'Chose a club for the room'" v-model="roomForm.club"
                                          :searchable="true" label="clubName" @option:selected="fetchUsers">
                                        </v-select>
                                      </div>
                                      <div class="form-group">
                                        <label>Users :</label>
                                        <v-select class="vSelect" :options="user_clubs"
                                          :placeholder="'Chose some user for the room'" v-model="roomForm.user_id"
                                          multiple :reduce="(user) => user.id" label="username">
                                        </v-select>
                                      </div>
                                      <div class="form-group">
                                        <!-- <input type="hidden" ref="club" name="club" :value="club.id"
                                                    id="club"> -->
                                        <input type="text" class="form-control" id="text" v-model="roomForm.name"
                                          placeholder="Room title .." />
                                      </div>

                                      <div class="container">
                                        <div class="row justify-content-center">
                                          <button type="submit" class="btn btn-primary w-25 mt-2"
                                            :disabled="form.processing">
                                            <VueSpinner v-if="roomForm.processing" size="30" color="white" />
                                            <template v-else> Add </template>
                                          </button>
                                          <button type="button" class="
                                              btn btn-secondary
                                              w-25
                                              ml-3
                                              mt-2
                                            " data-dismiss="modal">
                                            Close
                                          </button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" :class="currentRoom.id ? 'active show' : ''" role="tabpanel">
                      <div class="chat-head">
                        <header class="
                            d-flex
                            justify-content-between
                            align-items-center
                            bg-white
                            pt-3
                            pr-3
                            pb-3
                          ">
                          <div class="d-flex align-items-center">
                            <div class="sidebar-toggle">
                              <i class="ri-menu-3-line"></i>
                            </div>
                            <div class="avatar chat-user-profile m-0 mr-3">
                              <img src="/storage/assets/images/user/05.jpg" alt="avatar" class="avatar-50" />
                              <span class="avatar-status"><i class="
                                    ri-checkbox-blank-circle-fill
                                    text-success
                                  "></i></span>
                            </div>
                            <h5 class="mb-0">{{ currentRoom.name }}</h5>
                          </div>
                          <div class="chat-header-icons d-flex">
                            <a href="javascript:void();" class="chat-icon-phone iq-bg-primary">
                              <i class="ri-phone-line"></i>
                            </a>
                            <a href="javascript:void();" class="chat-icon-video iq-bg-primary">
                              <i class="ri-vidicon-line"></i>
                            </a>
                            <Link :href="route('chat-rooms.index')" class="chat-icon-delete iq-bg-primary">
                            <i class="ri-delete-bin-line"></i>
                            </Link>
                            <span class="dropdown iq-bg-primary">
                              <i class="
                                  ri-more-2-line
                                  cursor-pointer
                                  dropdown-toggle
                                  nav-hide-arrow
                                  cursor-pointer
                                  pr-0
                                " id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" role="menu"></i>
                              <span class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton02">
                                <a class="dropdown-item" href="JavaScript:void(0);"><i class="fa fa-thumb-tack"
                                    aria-hidden="true"></i>
                                  Pin to top</a>
                                <a class="dropdown-item" href="JavaScript:void(0);"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i>
                                  Delete chat</a>
                                <a class="dropdown-item" href="JavaScript:void(0);"><i class="fa fa-ban"
                                    aria-hidden="true"></i>
                                  Block</a>
                              </span>
                            </span>
                          </div>
                        </header>
                      </div>

                      <ChatBox :messages="messages" :room="currentRoom" />
                      <ChatInput :method="submitMessage" :form="form" :item="currentRoom" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </pages-layout>
  <ChatActives :users="users"></ChatActives>
</template>

<script>
import PagesLayout from "@/Layouts/PagesLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ChatBox from "../../../components/ChatBox.vue";
import ChatInput from "../../../components/ChatInput.vue";
import ChatActives from "../../../components/ChatActives.vue";
import { VueSpinner } from "vue3-spinners";
import vSelect from "vue-select";

export default {
  components: {
    PagesLayout,
    Link,
    ChatBox,
    ChatInput,
    vSelect,
    VueSpinner,
    ChatActives,
  },
  data() {
    return {
      form: this.$inertia.form({
        body: this.body,
        room: this.room,
      }),
      roomForm: this.$inertia.form({
        name: this.name,
        club: this.club,
        user_id: this.user_id,
      }),
      user_clubs: [],
      activeCount: 0,
      users: [],
    };
  },
  mounted() {
    this.connect();
    // this.scrollToBottom()
  },
  unmounted() {
    Echo.leave(`chat.${this.currentRoom.id}`);
  },
  props: ["rooms", "messages", "currentRoom", "clubs"],
  methods: {
    submitMessage() {
      this.form.post(this.route("chat-rooms.store", this.currentRoom), {
        preserveScroll: true,
        onSuccess: () => {
          // this.scrollToBottom()
          this.form.body = null;
        },
      });
    },
    submitRoom() {
      this.roomForm.post(this.route("chat-rooms.storeRoom"), {
        preserveScroll: true,
        onSuccess: () => {
          this.form.title = null;
        },
      });
    },
    // scrollToBottom() {
    //     let container = document.querySelector("#container");
    //     if (container) {
    //         container.scrollTop = container.scrollHeight;
    //     }

    // },
    connect() {
      Echo.join(`chat.${this.currentRoom.id}`)
        .here((users) => {
          this.activeCount = users.length;
          this.users = users;
        })
        .joining((user) => {
          console.log("I M JOININGGGG");
          this.activeCount++;
          this.users.push(user);
        })
        .leaving((user) => {
          console.log("I M LEAVING");
          this.activeCount--;
          this.users.splice(this.users.indexOf(user), 1);
        })
        .listen("NewChatMessageEvent", (e) => {
          let newMessage = {
            body: e.message.body,
            user: e.user,
          };
          this.messages.push(newMessage);
          // this.scrollToBottom()
        });
    },

    fetchUsers() {
      console.log("HHHHHHHHHHHHHHH");
      this.user_clubs = this.roomForm.club.users;
    },
    // watch: {
    //     messages: function () {
    //         this.$nextTick(function () {
    //             this.scrollToBottom()
    //         })
    //     }
    // },
  },
  // data() {
  //     return {
  //         href: {},
  //     }
  // },
  // methods: {
  //     visit(event) {
  //         if ($this.href) {
  //             return
  //         }
  //         event.preventDefault()
  //         this.$inertia.visit(this.href)
  //     }
  // }
};
</script>

<style scoped>
.vSelect {
  --vs-controls-color: #8755f2;
  --vs-border-color: #8755f2;

  --vs-dropdown-bg: #282c34;
  --vs-dropdown-color: #cc99cd;
  --vs-dropdown-option-color: #cc99cd;

  --vs-selected-bg: #8755f2;
  --vs-selected-color: #eeeeee;

  --vs-search-input-color: #eeeeee;

  --vs-dropdown-option--active-bg: #8755f2;
  --vs-dropdown-option--active-color: #eeeeee;
}
</style>
