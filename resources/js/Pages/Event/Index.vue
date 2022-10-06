<template>
    <pages-layout>
        <template #title>
            <!-- <div class="col-md-3">
                <div class="iq-card calender-small">
                    <div class="iq-card-body">
                        <input type="text" class="flatpicker d-none">
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title ">Classification</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="#"><i class="fa fa-plus  mr-0" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="m-0 p-0 job-classification">
                            <li class=""><i class="ri-check-line bg-danger"></i>Meeting</li>
                            <li class=""><i class="ri-check-line bg-success"></i>Business travel</li>
                            <li class=""><i class="ri-check-line bg-warning"></i>Personal Work</li>
                            <li class=""><i class="ri-check-line bg-info"></i>Team Project</li>
                        </ul>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Today's Schedule</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="m-0 p-0 today-schedule">
                            <li class="d-flex">
                                <div class="schedule-icon"><i class="ri-checkbox-blank-circle-fill text-primary"></i>
                                </div>
                                <div class="schedule-text"> <span>Web Design</span>
                                    <span>09:00 to 12:00</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="schedule-icon"><i class="ri-checkbox-blank-circle-fill text-success"></i>
                                </div>
                                <div class="schedule-text"> <span>Participate in Design</span>
                                    <span>09:00 to 12:00</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <div class="col-md-9">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target=".bd-example-modal-xl" v-on:click="this.showModal = true">
                                <i class="ri-add-circle-fill"></i>Add A New Event
                            </button>
                        </div>
                        <div ref="modal" class="modal fade bd-example-modal-xl mt-5" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content" style="margin-top:95px;">
                                    <div class="modal-body">
                                        <div class="iq-card">
                                            <div class="iq-card-header d-flex justify-content-between">
                                                <div class="iq-header-title">
                                                    <h4 class="card-title">Event :</h4>
                                                </div>
                                            </div>
                                            <div class="iq-card-body">
                                                <p>Add your Event :</p>
                                                <form @submit.prevent="submit">
                                                    <div class="form-group">
                                                        <label>Club :</label>
                                                        <v-select :options="clubs" class="Style"
                                                            placeholder="Choose a Club" v-model="form.club_id"
                                                            :reduce="club => club.id" label="clubName">
                                                        </v-select>
                                                    </div>
                                                    <div class="form-group">
                                                        <!-- <input type="hidden" ref="club_id" name="club_id" :value="club.id"
                                                    id="club_id"> -->
                                                        <input type="text" class="form-control" id="text"
                                                            v-model="form.title" placeholder="Title ..">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="text"
                                                            v-model="form.description" placeholder="Description ..">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputdatetime">Start Date : </label>
                                                        <input type="datetime-local" class="form-control"
                                                            id="exampleInputdatetime" v-model="form.start">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputdatetime">End Date : </label>
                                                        <input type="datetime-local" class="form-control"
                                                            id="exampleInputdatetime" v-model="form.end">
                                                    </div>
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <button type="submit" class="btn btn-primary w-25 mt-2"
                                                                :disabled="form.processing">
                                                                <VueSpinner v-if="form.processing" size="30"
                                                                    color="white" />
                                                                <template v-else>
                                                                    Add
                                                                </template>
                                                            </button>
                                                            <button type="button"
                                                                class="btn btn-secondary w-25 ml-3 mt-2"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <button @click="toggleWeekends">toggle weekends</button>
                        </div>
                    </div>
                    <div class="iq-card-body">

                        <FullCalendar ref="fullCalendar" @eventDrop="handleEventDrop" :editable="true"
                            :options="calendarOptions">
                            <template #eventContent="arg">
                                <Popper hover class="popperStyle">
                                    <button style="all: unset;cursor: pointer;">
                                        {{arg.event.title}}
                                        {{arg.event.extendedProps.club.clubName}}
                                    </button>
                                    <template #content>
                                        <div class="iq-card" style="border:1px solid purple;border-radius: 10px;">
                                            <div class="iq-card-body profile-page p-0">
                                                <div class="profile-header-image">
                                                    <div class="cover-container">
                                                        <img :src="'/storage/assets/images/page-img/profile-bg1.jpg'"
                                                            alt="profile-bg" class="rounded img-fluid w-100">
                                                    </div>
                                                    <div class="profile-info p-4">
                                                        <div class="user-detail">
                                                            <div
                                                                class="d-flex flex-wrap justify-content-between align-items-start">
                                                                <div class="profile-detail d-flex">
                                                                    <div class="profile-img pr-4"
                                                                        v-if="!arg.event.extendedProps.club.ClubImage || arg.event.extendedProps.club.ClubImage ==0">
                                                                        <img :src="'/storage/assets/images/page-img/gi-1.jpg'"
                                                                            alt="profile-img"
                                                                            class="avatar-130 img-fluid">

                                                                    </div>
                                                                    <div class="profile-img pr-4" v-else>
                                                                        <img :src="'/storage/' + arg.event.extendedProps.club.ClubImage"
                                                                            alt="profile-img"
                                                                            class="avatar-130 img-fluid" />
                                                                    </div>
                                                                    <div class="user-data-block">
                                                                        <h4 class="">
                                                                            {{arg.event.extendedProps.club.clubName}}
                                                                        </h4>
                                                                        <h6> <b>Event title : </b> {{arg.event.title}}
                                                                        </h6>
                                                                        <p class="text-black">
                                                                            <b>Event description :</b>
                                                                            {{arg.event.extendedProps.description}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <!-- <button type="submit"
                                                                    class="btn btn-primary">Following</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </template>
                                </Popper>
                            </template>
                        </FullCalendar>



                    </div>
                </div>
            </div>
        </template>
    </pages-layout>

</template>

<script>
import vSelect from "vue-select";

import PagesLayout from "@/Layouts/PagesLayout.vue";
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import timeGridPlugin from '@fullcalendar/timegrid'
import { formatDate } from '@fullcalendar/core'
import moment from 'moment'
import { VueSpinner } from 'vue3-spinners';
import { Inertia } from "@inertiajs/inertia";
import bootstrap5Plugin from '@fullcalendar/bootstrap5';

import Popper from "vue3-popper"

export default {
    components: {
        PagesLayout, FullCalendar, timeGridPlugin, VueSpinner, Popper, vSelect,
    },
    props: ['events', 'clubs', 'event'],
    data() {
        return {
            showModal: false,
            calendarOptions: {
                plugins: [
                    dayGridPlugin,
                    timeGridPlugin,
                    bootstrap5Plugin,
                    interactionPlugin, // needed for dateClick
                ],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                height: 750,
                expandRows: true,
                initialView: 'dayGridMonth',
                // initialEvents: this.events, // alternatively, use the `events` setting to fetch from a feed
                events: {
                    url: "http://localhost:8000/user/events/filter"
                },
                themeSystem: 'bootstrap5',
                editable: true,
                selectable: true,
                selectMirror: true,
                dayMaxEvents: true,
                select: this.handleDateSelect,
                eventClick: this.handleEventClick,
                eventsSet: this.handleEvents,
                eventDrop: this.handleEventDrop,
                eventMouseEnter: this.handleEventHover
            },
            new_event_modal_open: false,
            event_detail_modal_open: false,
            form: this.$inertia.form({
                title: this.title,
                description: this.description,
                club_id: this.club_id,
                start: this.start,
                end: this.end,
            }),


        }
    },
    methods: {

        toggleWeekends: function () {
            this.calendarOptions.weekends = !this.calendarOptions.weekends // toggle the boolean!
        },
        resetNewEventData() {
            this.new_event_modal_open = false
        },

        newEventCreated() {
            this.new_event_modal_open = false
            this.resetNewEventData()
        },
        submit() {
            this.form.post(this.route('events.store'), {
                preserveScroll: true,
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Your Event has been successfully published ! '
                    }),
                        this.closeModal();
                    this.rerenderCalendar();
                }
            })
        },
        // handleEventDrop(hoverInfo) {
        //     console.log(hoverInfo.event)
        // },
        handleEventHover(hoverInfo) {
            // Inertia.get(this.route('events.show', hoverInfo.event.id));
            console.log(hoverInfo.event.extendedProps)
        },
        handleEventClick(clickInfo) {
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    clickInfo.event.remove()
                    Inertia.delete(this.route('events.destroy', clickInfo.event.id), {
                        preserveScroll: true,
                        onSuccess: () => { },
                    });
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your event has been deleted.',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your event is safe :)',
                        'error'
                    )
                }
            })
        },
        handleEventDrop(e) {
            var start = e.event.start;
            var end = e.event.end || start;
            const dropEventform = this.$inertia.form({
                start: moment(start).format('YYYY-MM-DD hh:mm:ss'),
                end: moment(end).format('YYYY-MM-DD hh:mm:ss'),
            })
            dropEventform.put(this.route('events.update', e.event.id), {
                onSuccess: () => { },
            })

        },
        rerenderCalendar() {
            this.$refs.fullCalendar.getApi().refetchEvents()
        },
        handleDateSelect(e) {
            var start = e.startStr;
            var end = e.endStr || start;
            this.form.start = moment(start).format('YYYY-MM-DD hh:mm:ss');
            this.form.end = moment(end).format('YYYY-MM-DD hh:mm:ss');
            this.form.transform((data) => ({
                ...data,
            }))
            this.openModal();

        },
        openModal() {
            $('.bd-example-modal-xl').modal('show')
        },
        closeModal() {
            $('.bd-example-modal-xl').modal('hide')
        },
    },



}
</script>

<style>
.v-select .vs__search::placeholder {
    color: #555770;
    text-transform: lowercase;
}

.v-select .vs__dropdown-toggle,
.v-select .vs__dropdown-menu {
    border-radius: 10px;
    border-left: 3px solid #8755f2;
    color: #555770;
    text-transform: lowercase;
    padding: 8px;
}

.v-select .vs__selected {
    background: #8755f2;
    color: white;
}
</style>