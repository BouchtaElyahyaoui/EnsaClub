<template>
    <pages-layout>
        <template #title>
            <div class="col-sm-12 ">
                <div class="iq-card">
                    <div class="iq-card-body profile-page p-0 ">
                        <div class="profile-header">
                            <div class="cover-container">
                                <img :src="'/storage/assets/images/page-img/profile-bg1.jpg'" alt="profile-bg"
                                    class="rounded img-fluid">
                                <!-- <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                    <li><a href="javascript:void();"><i class="ri-pencil-line"></i></a></li>
                                    <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li>
                                </ul> -->
                            </div>
                            <div class="user-detail text-center mb-3">
                                <div class="profile-img">
                                    <img v-if="!club.ClubImage || club.ClubImage == 0"
                                        :src="'/storage/assets/images/page-img/gi-1.jpg'" alt="profile-img"
                                        class="avatar-130 img-fluid" />
                                    <img v-else :src="'/storage/' + club.ClubImage" alt="profile-img"
                                        class="avatar-130 img-fluid" />
                                </div>
                                <div class="profile-detail">
                                    <h3 class="">{{ club.clubName }}</h3>
                                </div>
                            </div>
                            <div
                                class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
                                <!-- Friend Status component -->
                                <!-- <status :profile="profile" :isFriendsWith="isFriendsWith"
                                    :friendRequestSentTo="friendRequestSentTo"
                                    :friendRequestRecievedFrom="friendRequestRecievedFrom"></status> -->
                                <div class="social-info">
                                    <ul
                                        class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                        <li class="text-center pl-3">
                                            <h6>Posts</h6>
                                            <p class="mb-0">{{posts.data.length}}</p>
                                        </li>
                                        <li class="text-center pl-3">
                                            <h6>Members</h6>
                                            <p class="mb-0">{{club.users.length}}</p>
                                        </li>
                                        <!-- <li class="text-center pl-3">
                                            <h6>Following</h6>
                                            <p class="mb-0">100</p>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-body p-0">
                        <div class="user-tabing">
                            <ul
                                class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#timeline">Timeline</a>
                                </li>
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#about">About</a>
                                </li>
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#friends">Team</a>
                                </li>
                                <li class="col-sm-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#photos">Images</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                        <div class="iq-card-body p-0">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="iq-card">
                                        <div class="iq-card-body">
                                            <a href="#"><span
                                                    class="badge badge-pill badge-primary font-weight-normal ml-auto mr-1"><i
                                                        class="ri-star-line"></i></span> 27 Items for yoou</a>
                                        </div>
                                    </div>
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Life Event</h4>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                <p class="m-0"><a href="javacsript:void();"> Create </a></p>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="event-post position-relative">
                                                        <a href="javascript:void();"><img
                                                                :src="'/storage/assets/images/page-img/07.jpg'"
                                                                alt="gallary-image" class="img-fluid rounded"></a>
                                                        <div class="job-icon-position">
                                                            <div
                                                                class="job-icon bg-primary p-2 d-inline-block rounded-circle">
                                                                <i class="ri-briefcase-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="iq-card-body text-center p-2">
                                                            <h5>Started New Job at Apple</h5>
                                                            <p>January 24, 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="event-post position-relative">
                                                        <a href="javascript:void();"><img
                                                                :src="'/storage/assets/images/page-img/06.jpg'"
                                                                alt="gallary-image" class="img-fluid rounded"></a>
                                                        <div class="job-icon-position">
                                                            <div
                                                                class="job-icon bg-primary p-2 d-inline-block rounded-circle">
                                                                <i class="ri-briefcase-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="iq-card-body text-center p-2">
                                                            <h5>Freelance Photographer</h5>
                                                            <p>January 24, 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Photos</h4>
                                            </div>
                                            <!-- <div class="iq-card-header-toolbar d-flex align-items-center">
                                                <p class="m-0"><a href="javacsript:void();">Add Photo </a></p>
                                            </div> -->
                                        </div>
                                        <div class="iq-card-body">
                                            <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                                                <li class="col-md-4 col-6 pl-2 pr-0 pb-3 "
                                                    v-for="(image , key) in club_images " :key="key"><a
                                                        href="javascript:void();"><img :src="'/storage/' + image.url"
                                                            alt="gallary-image" class="img-fluid" /></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Members</h4>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                <p class="m-0"><a href="javacsript:void();">Add New </a></p>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                                                <li class="col-md-4 col-6 pl-2 pr-0 pb-3 mr-1 "
                                                    v-for="(user,key) in club.users" :key="key">
                                                    <div v-if="user.pivot.role_id == 0">
                                                        <Link :href="route('profile.show' , user)">
                                                        <img :src="user.profile_photo_url" alt="gallary-image"
                                                            class="img-fluid" /></Link>
                                                        <h6 class="mt-2">{{user.username}}</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 row m-0 p-0">
                                    <infinite-scroll @loadMore="loadMorePosts">
                                        <comb-posts :posts="allPosts.data"></comb-posts>
                                    </infinite-scroll>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="about" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                            <li>
                                                <a class="nav-link active" data-toggle="pill" href="#basicinfo">Contact
                                                    and Basic Info</a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="pill" href="#family">Family and
                                                    Relationship</a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="pill" href="#work">Work and
                                                    Education</a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="pill" href="#lived">Places You've
                                                    Lived</a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="pill" href="#details">Details About
                                                    You</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-9 pl-4">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                <h4>Club Details</h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h6>Club Name</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{club.clubName}}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>description</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{club.description}}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>mission</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{club.mission}}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <h6>Date of Creation</h6>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="mb-0">{{club.dateOfCreation}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="family" role="tabpanel">
                                                <h4 class="mb-3">Relationship</h4>
                                                <ul class="suggestions-lists m-0 p-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><i class="ri-add-fill"></i>
                                                        </div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Add Your Relationship Status</h6>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <h4 class="mt-3 mb-3">Family Members</h4>
                                                <ul class="suggestions-lists m-0 p-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><i class="ri-add-fill"></i>
                                                        </div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Add Family Members</h6>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><img
                                                                :src="'/storage/assets/images/user/01.jpg'"
                                                                alt="story-img" class="rounded-circle avatar-40"></div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Paul Molive</h6>
                                                            <p class="mb-0">Brothe</p>
                                                        </div>
                                                        <div class="edit-relation"><a href="javascript:void();"><i
                                                                    class="ri-edit-line mr-2"></i>Edit</a></div>
                                                    </li>
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><img
                                                                :src="'/storage/assets/images/user/02.jpg'"
                                                                alt="story-img" class="rounded-circle avatar-40"></div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Anna Mull</h6>
                                                            <p class="mb-0">Sister</p>
                                                        </div>
                                                        <div class="edit-relation"><a href="javascript:void();"><i
                                                                    class="ri-edit-line mr-2"></i>Edit</a></div>
                                                    </li>
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><img
                                                                :src="'/storage/assets/images/user/03.jpg'"
                                                                alt="story-img" class="rounded-circle avatar-40"></div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Paige Turner</h6>
                                                            <p class="mb-0">Cousin</p>
                                                        </div>
                                                        <div class="edit-relation"><a href="javascript:void();"><i
                                                                    class="ri-edit-line mr-2"></i>Edit</a></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="work" role="tabpanel">
                                                <h4 class="mb-3">Work</h4>
                                                <ul class="suggestions-lists m-0 p-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><i class="ri-add-fill"></i>
                                                        </div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Add Work Place</h6>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><img
                                                                :src="'/storage/assets/images/user/01.jpg'"
                                                                alt="story-img" class="rounded-circle avatar-40"></div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Themeforest</h6>
                                                            <p class="mb-0">Web Designer</p>
                                                        </div>
                                                        <div class="edit-relation"><a href="javascript:void();"><i
                                                                    class="ri-edit-line mr-2"></i>Edit</a></div>
                                                    </li>
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><img
                                                                :src="'/storage/assets/images/user/02.jpg'"
                                                                alt="story-img" class="rounded-circle avatar-40"></div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>iqonicdesign</h6>
                                                            <p class="mb-0">Web Developer</p>
                                                        </div>
                                                        <div class="edit-relation"><a href="javascript:void();"><i
                                                                    class="ri-edit-line mr-2"></i>Edit</a></div>
                                                    </li>
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><img
                                                                :src="'/storage/assets/images/user/03.jpg'"
                                                                alt="story-img" class="rounded-circle avatar-40"></div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>W3school</h6>
                                                            <p class="mb-0">Designer</p>
                                                        </div>
                                                        <div class="edit-relation"><a href="javascript:void();"><i
                                                                    class="ri-edit-line mr-2"></i>Edit</a></div>
                                                    </li>
                                                </ul>
                                                <h4 class="mb-3">Professional Skills</h4>
                                                <ul class="suggestions-lists m-0 p-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><i class="ri-add-fill"></i>
                                                        </div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Add Professional Skills</h6>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <h4 class="mt-3 mb-3">College</h4>
                                                <ul class="suggestions-lists m-0 p-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><i class="ri-add-fill"></i>
                                                        </div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Add College</h6>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><img
                                                                :src="'/storage/assets/images/user/01.jpg'"
                                                                alt="story-img" class="rounded-circle avatar-40"></div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Lorem ipsum</h6>
                                                            <p class="mb-0">USA</p>
                                                        </div>
                                                        <div class="edit-relation"><a href="javascript:void();"><i
                                                                    class="ri-edit-line mr-2"></i>Edit</a></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="lived" role="tabpanel">
                                                <h4 class="mb-3">Current City and Hometown</h4>
                                                <ul class="suggestions-lists m-0 p-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><img
                                                                :src="'/storage/assets/images/user/01.jpg'"
                                                                alt="story-img" class="rounded-circle avatar-40"></div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Georgia</h6>
                                                            <p class="mb-0">Georgia State</p>
                                                        </div>
                                                        <div class="edit-relation"><a href="javascript:void();"><i
                                                                    class="ri-edit-line mr-2"></i>Edit</a></div>
                                                    </li>
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><img
                                                                :src="'/storage/assets/images/user/02.jpg'"
                                                                alt="story-img" class="rounded-circle avatar-40"></div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Atlanta</h6>
                                                            <p class="mb-0">Atlanta City</p>
                                                        </div>
                                                        <div class="edit-relation"><a href="javascript:void();"><i
                                                                    class="ri-edit-line mr-2"></i>Edit</a></div>
                                                    </li>
                                                </ul>
                                                <h4 class="mt-3 mb-3">Other Places Lived</h4>
                                                <ul class="suggestions-lists m-0 p-0">
                                                    <li class="d-flex mb-4 align-items-center">
                                                        <div class="user-img img-fluid"><i class="ri-add-fill"></i>
                                                        </div>
                                                        <div class="media-support-info ml-3">
                                                            <h6>Add Place</h6>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="details" role="tabpanel">
                                                <h4 class="mb-3">About You</h4>
                                                <p>Hi, I’m Bni, I’m 26 and I work as a Web Designer for the
                                                    iqonicdesign.</p>
                                                <h4 class="mt-3 mb-3">Other Name</h4>
                                                <p>Bini Rock</p>
                                                <h4 class="mt-3 mb-3">Favorite Quotes</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text
                                                    ever since the 1500s</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="friends" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <h2>Team</h2>
                                <div class="friend-list-tab mt-2">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="all-friends" role="tabpanel">
                                            <div class="iq-card-body p-0">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6 mb-3" v-for="(user,key) in clubTeam"
                                                        :key="key">
                                                        <div class="iq-friendlist-block p-3 "
                                                            style="border:1px solid rgb(241 219 255);border-bottom-right-radius:51% ;border-top-left-radius:105%; z-index: -999;"
                                                            v-if="user.pivot.role_id >= 1 && user.pivot.role_id <=9 ">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <Link
                                                                        :href="route('profiles.show' , user.username)">
                                                                    <img :src="user.profile_photo_url" alt="profile-img"
                                                                        style="height:100px;max-width: 100px;border-radius: 50%;"
                                                                        class="img-fluid">
                                                                    </Link>
                                                                    <div class="friend-info ml-3">
                                                                        <h5>
                                                                            {{user.username}}</h5>
                                                                        <p v-if="user.pivot.role_id == 2" class="mb-0">
                                                                            President(e) </p>
                                                                        <p v-else-if="user.pivot.role_id == 3"
                                                                            class="mb-0">
                                                                            Vice President(e) </p>
                                                                        <p v-else-if="user.pivot.role_id == 4"
                                                                            class="mb-0">
                                                                            Secretaire </p>
                                                                        <p v-else-if="user.pivot.role_id == 5"
                                                                            class="mb-0">
                                                                            Tresorier(e) </p>
                                                                        <p v-else-if="user.pivot.role_id == 6"
                                                                            class="mb-0">
                                                                            Responsable Sponsoring </p>
                                                                        <p v-else-if="user.pivot.role_id == 7"
                                                                            class="mb-0">
                                                                            Responsable Design </p>
                                                                        <p v-else-if="user.pivot.role_id == 8"
                                                                            class="mb-0">
                                                                            Responsable Communication </p>
                                                                        <p v-else-if="user.pivot.role_id == 9"
                                                                            class="mb-0">
                                                                            Responsable Formation Materiel </p>
                                                                        <p v-else-if="user.pivot.role_id == 10" class="
                                                                            mb-0">
                                                                            Respensable Mediatisation </p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="iq-card-header-toolbar d-flex align-items-center">
                                                                    <div class="dropdown">
                                                                        <status class="mt-2" :profile="user"
                                                                            :isFriendsWith="user.isfriendswith"
                                                                            :friendRequestSentTo="user.friendrequestsentto"
                                                                            :friendRequestRecievedFrom="user.friendrequestrecievedfrom">
                                                                        </status>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="photos" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <h2>Members</h2>
                                <div class="friend-list-tab mt-2">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="all-friends" role="tabpanel">
                                            <div class="iq-card-body p-0">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6 mb-3"
                                                        v-for="(user,key) in clubMembers" :key="key">
                                                        <div class="iq-friendlist-block p-3 "
                                                            style="border:1px solid rgb(241 219 255);border-bottom-right-radius:51% ;border-top-left-radius:105%; z-index: -999;"
                                                            v-if="user.pivot.role_id <= 1">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <Link
                                                                        :href="route('profiles.show' , user.username)">
                                                                    <img :src="user.profile_photo_url" alt="profile-img"
                                                                        style="height:100px;max-width: 100px;border-radius: 50%;"
                                                                        class="img-fluid">
                                                                    </Link>
                                                                    <div class="friend-info ml-3">
                                                                        <h5>
                                                                            {{user.username}}</h5>
                                                                        <p class="mb-0">
                                                                            Member </p>

                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="iq-card-header-toolbar d-flex align-items-center">
                                                                    <div class="dropdown">
                                                                        <status class="mt-2" :profile="user"
                                                                            :isFriendsWith="user.isfriendswith"
                                                                            :friendRequestSentTo="user.friendrequestsentto"
                                                                            :friendRequestRecievedFrom="user.friendrequestrecievedfrom">
                                                                        </status>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-12 text-center">
                <img :src="'/storage/assets/images/page-img/page-load-loader.gif'" alt="loader" style="height: 100px;">
            </div> -->
        </template>
    </pages-layout>


</template>

<script>
import PagesLayout from '@/Layouts/PagesLayout.vue'
import CombPosts from "@/components/Posts/CombPosts.vue";
import PostForm from '@/components/Posts/PostForm.vue';
import InfiniteScroll from "@/components/InfiniteScroll.vue"
import Status from '@/components/FriendStatus/Status.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    props: ['club', 'posts', 'club_images', 'clubMembers', 'clubTeam'],
    components: {
        PagesLayout, CombPosts, PostForm, InfiniteScroll, Link, Status
    },
    data() {
        return { allPosts: this.posts, }
    },
    computed: {
        pagination() {
            return this.allPosts = this.posts
        }
    },

}
</script>

<style>

</style>
