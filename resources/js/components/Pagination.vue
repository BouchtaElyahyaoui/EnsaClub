<template>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <template v-for="(link,key) in links" :key="key">
                <li class="page-item disabled" v-if="link.url === null">
                    <Link class="page-link" style="color :#6c757d;border: 1px solid #6c757d" href="#" tabindex="-1"
                        aria-disabled="true" preserve-state>{{link.label}}</Link>
                </li>
                <template v-else>
                    <li v-if="link.active == false" class="page-item">
                        <Link class="page-link" style="color :#8755f2;border: 1px solid #8755f2" :href="link.url"
                            preserve-state>
                        {{link.label}}</Link>
                    </li>
                    <li v-else class="page-item active" aria-current="page">
                        <Link class="page-link" style="background-color :#8755f2;border-color: #8755f2" :href="link.url"
                            preserve-state>
                        {{link.label}} </Link>
                    </li>
                </template>

            </template>

        </ul>
    </nav>



</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    props: ['links'],
    components: {
        Link
    }
}
</script>

<style>

</style>