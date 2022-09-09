<template>
    <div class="iq-sidebar ">
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li :class="{active : ($page.url ==  '/user/dashboard' )}">
                        <Link :href="route('dashboard.index')" class="iq-waves-effect"><i
                            class="las la-newspaper"></i><span>Newsfeed</span></Link>
                    </li>
                    <li :class="{active : ($page.url ==  ('/user/profile/'+$page.props.user.username) )}">
                        <Link :href="route('profiles.show', $page.props.user.username)" class="iq-waves-effect"><i
                            class="las la-user"></i><span>Profile</span></Link>
                    </li>
                    <li :class="{active : ($page.url == '/user/members' )}">
                        <Link :href="route('members.index')" class="iq-waves-effect"><i
                            class="las la-users"></i><span>Members
                            List</span></Link>
                    </li>
                    <li :class="{active : ($page.url ==  '/user/friends' )}">
                        <Link :href="route('friends.index')" class="iq-waves-effect"><i
                            class="las la-user-friends"></i><span>Friends
                            List</span>
                        </Link>
                    </li>
                    <li :class="{active : ($page.url ==  '/user/clubs' )}">
                        <Link :href="route('clubs.index')" class="iq-waves-effect"><i
                            class="las la-globe"></i><span>Clubs
                        </span>
                        </Link>
                    </li>
                </ul>
            </nav>
            <div class="p-3"></div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components: {
        Link
    }
}
</script>

<style>

</style>