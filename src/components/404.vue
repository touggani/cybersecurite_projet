<template>
    <div>
        <b-alert class="mt-3" show variant="danger">404 Unknown page !</b-alert>
        <b-button size="sm" @click.prevent="back">Go back</b-button>
    </div>
</template>

<script>
    export default {
        methods: {
            back() {
                this.$router.go(-1);
            }
        }
    }
</script>