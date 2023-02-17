<script setup>
defineProps(["message"]);
</script>

<template>
    <div v-show="message" class="d-block invalid-feedback">
        {{ message }}
    </div>
</template>
