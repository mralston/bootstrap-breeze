<script setup>
import { Link } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <div class="position-absolute top-0 min-vh-100 min-vw-100 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-md-8 col-lg-6">
                    <header class="text-center my-5">
                        <Link href="/">
                            <ApplicationLogo width="120" />
                        </Link>
                    </header>

                    <main class="card shadow-sm">
                        <div class="card-body p-5">
                            <slot />
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>
