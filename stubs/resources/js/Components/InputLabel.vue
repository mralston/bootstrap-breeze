<script setup>
defineProps(["value"]);
</script>

<template>
    <label class="form-label">
        <slot>{{ value }}</slot>
    </label>
</template>
