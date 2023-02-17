<script setup>
import { computed } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route("verification.send"));
};

const verificationLinkSent = computed(
    () => props.status === "verification-link-sent"
);
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="text-muted mb-4">
            Thanks for signing up! Before getting started, could you verify your
            email address by clicking on the link we just emailed to you? If you
            didn't receive the email, we will gladly send you another.
        </div>

        <div class="alert alert-success mb-4" v-if="verificationLinkSent">
            A new verification link has been sent to the email address you
            provided during registration.
        </div>

        <form @submit.prevent="submit">
            <div class="d-flex align-items-center justify-content-between">
                <PrimaryButton :disabled="form.processing">
                    Resend Verification Email
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="btn btn-link link-secondary"
                >
                    Log Out
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
