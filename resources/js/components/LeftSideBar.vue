<template>
    <div class="iq-sidebar ">
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li class="active">
                        <Link :href="route('dashboard.index')" class="iq-waves-effect"><i
                            class="las la-newspaper"></i><span>Newsfeed</span></Link>
                    </li>
                    <li>
                        <Link :href="route('profiles.show', $page.props.user.username)" class="iq-waves-effect"><i
                            class="las la-user"></i><span>Profile</span></Link>
                    </li>
                    <li>
                        <a href="friend-list.html" class="iq-waves-effect"><i
                                class="las la-user-friends"></i><span>Friend
                                Lists</span></a>
                    </li>
                    <li>
                        <a href="group.html" class="iq-waves-effect"><i class="las la-users"></i><span>Group</span></a>
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