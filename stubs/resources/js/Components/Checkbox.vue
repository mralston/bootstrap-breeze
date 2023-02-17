<script setup>
import { computed } from "vue";

const emit = defineEmits(["update:checked"]);

const props = defineProps({
    value: { default: null },
    checked: { type: [Array, Boolean], default: false },
});

const proxyChecked = computed({
    get: () => props.checked,
    set: (val) => emit("update:checked", val),
});
</script>

<template>
    <input
        type="checkbox"
        :value="value"
        v-model="proxyChecked"
        class="form-check-input"
    />
</template>
