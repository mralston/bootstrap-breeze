<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Checkbox from "@/Components/Checkbox.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

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

            <div class="mb-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError :message="form.errors.password" />
            </div>

            <div class="form-check mb-4">
                <Checkbox id="remember" v-model:checked="form.remember" />
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <div class="d-flex align-items-center justify-content-end gap-3">
                <Link v-if="canResetPassword" :href="route('password.request')">
                    Forgot your password?
                </Link>

                <PrimaryButton :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
