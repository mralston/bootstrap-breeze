<script setup>
import { computed } from "vue";

const props = defineProps({
    label: { type: String, required: false },
    variant: { type: String, default: "primary" },
    asNavItem: { type: Boolean, default: false },
});

const classes = computed(() => ({
    dropdown: true,
    "nav-item": props.asNavItem,
}));

const toggleClasses = computed(() => ({
    "dropdown-toggle": true,
    [`btn btn-${props.variant}`]: !props.asNavItem,
    "nav-link": props.asNavItem,
}));
</script>

<template>
    <div :class="classes">
        <a role="button" :class="toggleClasses" data-bs-toggle="dropdown">
            <slot name="trigger">
                {{ label }}
            </slot>
        </a>

        <div class="dropdown-menu dropdown-menu-end">
            <slot />
        </div>
    </div>
</template>
