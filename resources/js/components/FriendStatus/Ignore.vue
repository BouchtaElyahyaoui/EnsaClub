<template>
    <form @submit.prevent="ignoreRequest">
        <div class="d-flex align-items-center">
            <button type="submit" class="mr-3 btn btn-danger rounded">Ignore</button>
        </div>
    </form>
</template>

<script>
export default
    {
        props: ['profile'],
        methods: {
            ignoreRequest() {
                this.$inertia.get(this.route('friends.deny', this.profile.id, {
                    onSucess: () => { }
                }))
            }
        }
    }

</script>

<style>
</style>