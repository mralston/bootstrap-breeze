<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="display-6">Dashboard</h2>
        </template>

        <div class="card shadow-sm m-5">
            <div class="card-body text-center">
                <div class="display-4">You're logged in!</div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
