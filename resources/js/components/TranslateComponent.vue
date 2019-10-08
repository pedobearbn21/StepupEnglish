<template>
    <button @click="showAlert"><i class="fas fa-language fa-2x"></i></button>
</template>

<script>
    export default {
        methods: {
            showAlert() {
                this.$swal('Hello Vue world!!!');
            },
        },
    };
</script>
