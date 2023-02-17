<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps(["active"]);
</script>

<template>
    <Link class="nav-link" :class="{ active }">
        <slot />
    </Link>
</template>
