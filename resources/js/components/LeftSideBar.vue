<template>
    <div class="iq-sidebar " v-if="$page?.props?.user">
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li :class="{active : ($page.url.startsWith ('/user/dashboard') )}">
                        <Link :href="route('dashboard.index')" class="iq-waves-effect"><i
                            class="las la-newspaper"></i><span>Newsfeed</span></Link>
                    </li>
                    <li :class="{active : ($page.url.startsWith ('/user/profile/') )}">
                        <Link :href="route('profiles.show', $page.props.user.username)" class="iq-waves-effect"><i
                            class="las la-user"></i><span>Profile</span></Link>
                    </li>
                    <li :class="{active : ($page.url.startsWith ( '/user/members' ))}">
                        <Link :href="route('members.index')" class="iq-waves-effect"><i
                            class="las la-users"></i><span>Members
                            List</span></Link>
                    </li>
                    <li :class="{active : ($page.url.startsWith (  '/user/friends' ))}">
                        <Link :href="route('friends.index')" class="iq-waves-effect"><i
                            class="las la-user-friends"></i><span>Friends
                            List</span>
                        </Link>
                    </li>
                    <li :class="{active : ($page.url.startsWith (  '/user/clubs' ))}">
                        <Link :href="route('clubs.index')" class="iq-waves-effect"><i
                            class="las la-globe"></i><span>Clubs
                        </span>
                        </Link>
                    </li>
                    <li :class="{active : ($page.url.startsWith (  '/user/revisions' ))}">
                        <Link :href="route('revisions.index')" class="iq-waves-effect"><i
                            class="las la-bell"></i><span>Requests
                        </span>
                        </Link>
                    </li>

                    <li :class="{active : ($page.url.startsWith('/user/events' ))}">
                        <Link :href="route('events.index')" class="iq-waves-effect"><i
                            class="las la-calendar"></i><span>Events
                        </span>
                        </Link>
                    </li>
                    <li :class="{active : ($page.url.startsWith( '/user/chat/rooms' ))}">
                        <Link :href="route('chat-rooms.index')" class="iq-waves-effect"><i
                            class="las la-calendar"></i><span>Chat Rooms
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