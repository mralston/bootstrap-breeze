<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    status: String,
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <p class="text-muted mb-4">
            Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will allow
            you to choose a new one.
        </p>

        <div v-if="status" class="alert alert-success mb-4">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="mb-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError :message="form.errors.email" />
            </div>

            <div class="d-flex align-items-center justify-content-end">
                <PrimaryButton :disabled="form.processing">
                    Email Password Reset Link
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
