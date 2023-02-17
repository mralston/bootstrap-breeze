<script setup>
import { Link, useForm, usePage } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <section>
        <header>
            <h2 class="fw-light">Profile Information</h2>

            <p>Update your account's profile information and email address.</p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))">
            <div class="mb-4">
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError :message="form.errors.name" />
            </div>

            <div class="mb-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError :message="form.errors.email" />
            </div>

            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="small text-muted">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="btn btn-sm btn-primary"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="alert alert-success"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="d-flex align-items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition>
                    <small v-if="form.recentlySuccessful" class="text-muted">
                        Saved.
                    </small>
                </Transition>
            </div>
        </form>
    </section>
</template>
