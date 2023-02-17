<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.store"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Reset Password" />

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

            <div class="mb-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError :message="form.errors.password" />
            </div>

            <div class="mb-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError :message="form.errors.password_confirmation" />
            </div>

            <div class="d-flex align-items-center justify-content-end">
                <PrimaryButton :disabled="form.processing">
                    Reset Password
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
