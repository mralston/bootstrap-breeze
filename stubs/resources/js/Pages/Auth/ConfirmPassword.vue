<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    password: "",
});

const submit = () => {
    form.post(route("password.confirm"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Confirm Password" />

        <div class="text-muted mb-4">
            This is a secure area of the application. Please confirm your
            password before continuing.
        </div>

        <form @submit.prevent="submit">
            <div class="mb-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    autofocus
                />
                <InputError :message="form.errors.password" />
            </div>

            <div class="d-flex justify-content-end">
                <PrimaryButton :disabled="form.processing">
                    Confirm
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
