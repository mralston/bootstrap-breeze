<script>
export default {
    inheritAttrs: false,
};
</script>

<script setup>
import { Modal } from "bootstrap";
import { onMounted, onUnmounted, ref } from "vue";
import PrimaryButton from "./PrimaryButton.vue";
import SecondaryButton from "./SecondaryButton.vue";

let bsModal;
const el = ref(null);

const props = defineProps({
    noHeader: Boolean,
    noFooter: Boolean,
});

const emit = defineEmits(["shown", "hidden"]);

const show = () => bsModal.show();
const hide = () => bsModal.hide();

defineExpose({ el, show, hide });

onMounted(() => {
    bsModal = new Modal(el.value);
    el.value.addEventListener("shown.bs.modal", () => emit("shown"));
    el.value.addEventListener("hidden.bs.modal", () => emit("hidden"));
});
onUnmounted(() => bsModal.dispose());
</script>

<template>
    <teleport to="body">
        <div ref="el" class="modal" tabindex="-1" v-bind="$attrs">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- header -->
                    <div v-if="!noHeader" class="modal-header">
                        <h5 class="modal-title">
                            <slot name="title" />
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                        />
                    </div>

                    <!-- body -->
                    <div class="modal-body">
                        <slot />
                    </div>

                    <!-- footer -->
                    <div v-if="!noFooter" class="modal-footer">
                        <slot name="footer">
                            <SecondaryButton data-bs-dismiss="modal">
                                Cancel
                            </SecondaryButton>

                            <slot name="confirm">
                                <PrimaryButton>Ok</PrimaryButton>
                            </slot>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </teleport>
</template>
