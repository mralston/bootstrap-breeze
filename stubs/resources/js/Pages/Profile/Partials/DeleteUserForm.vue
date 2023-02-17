<script setup>
import { nextTick, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import DangerButton from "@/Components/DangerButton.vue";

const confirmationModal = ref(null);
const passwordInput = ref(null);

const form = useForm({
    password: "",
});

const confirmUserDeletion = () => {
    confirmationModal.value.show();
    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route("profile.destroy"), {
        preserveScroll: true,
        onSuccess: () => confirmationModal.value.hide(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const onModalHidden = () => {
    form.reset();
};
</script>

<template>
    <section>
        <header>
            <h2 class="fw-light">Delete Account</h2>

            <p>
                Once your account is deleted, all of its resources and data will
                be permanently deleted. Before deleting your account, please
                download any data or information that you wish to retain.
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion">
            Delete Account
        </DangerButton>

        <Modal ref="confirmationModal" @hidden="onModalHidden">
            <template #title>
                Are you sure you want to delete your account?
            </template>

            <p>
                Once your account is deleted, all of its resources and data will
                be permanently deleted. Please enter your password to confirm
                you would like to permanently delete your account.
            </p>

            <div class="mb-4">
                <InputLabel for="modal-password-input" value="Password" />

                <TextInput
                    id="modal-password-input"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    placeholder="Password"
                    @keyup.enter="deleteUser"
                />

                <InputError :message="form.errors.password" />
            </div>

            <template #confirm>
                <DangerButton @click="deleteUser" :disabled="form.processing">
                    Delete Account
                </DangerButton>
            </template>
        </Modal>
    </section>
</template>
