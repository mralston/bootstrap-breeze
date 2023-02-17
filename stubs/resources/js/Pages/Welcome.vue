<script setup>
import { Head, Link } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <nav v-if="canLogin" class="navbar navbar-expand bg-white">
        <div class="container-fluid">
            <div class="navbar-nav ms-auto">
                <Link
                    v-if="$page.props.auth.user"
                    class="nav-link"
                    :href="route('dashboard')"
                >
                    Dashboard
                </Link>

                <template v-else>
                    <Link class="nav-link" :href="route('login')">Log in</Link>

                    <Link
                        v-if="canRegister"
                        class="nav-link"
                        :href="route('register')"
                    >
                        Register
                    </Link>
                </template>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col text-center my-5">
                <ApplicationLogo width="120" />
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col border-end border-bottom pb-3">
                        <div class="d-flex align-items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="text-muted"
                                width="30"
                            >
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                ></path>
                            </svg>
                            <div class="ms-3 fw-bold d-inline">
                                <a
                                    href="https://laravel.com/docs"
                                    class="underline text-muted"
                                    >Documentation</a
                                >
                            </div>
                        </div>

                        <div class="ms-5">
                            <div class="mt-2 text-muted fs-6">
                                Laravel has wonderful, thorough documentation
                                covering every aspect of the framework. Whether
                                you are new to the framework or have previous
                                experience with Laravel, we recommend reading
                                all of the documentation from beginning to end.
                            </div>
                        </div>
                    </div>
                    <div class="col border-bottom pb-3">
                        <div class="d-flex align-items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="text-muted"
                                width="30"
                            >
                                <path
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                ></path>
                                <path
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"
                                ></path>
                            </svg>
                            <div class="ms-3 fw-bold d-inline">
                                <a
                                    href="https://laracasts.com"
                                    class="underline text-muted"
                                    >Laracasts</a
                                >
                            </div>
                        </div>

                        <div class="ms-5">
                            <div class="mt-2 text-muted fs-6">
                                Laracasts offers thousands of video tutorials on
                                Laravel, PHP, and JavaScript development. Check
                                them out, see for yourself, and massively level
                                up your development skills in the process.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col border-end pt-3">
                        <div class="d-flex align-items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="text-muted"
                                width="30"
                            >
                                <path
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                ></path>
                            </svg>
                            <div class="ms-3 fw-bold d-inline">
                                <a
                                    href="https://laravel-news.com/"
                                    class="underline text-muted"
                                    >Laravel News</a
                                >
                            </div>
                        </div>

                        <div class="ms-5">
                            <div class="mt-2 text-muted fs-6">
                                Laravel News is a community driven portal and
                                newsletter aggregating all of the latest and
                                most important news in the Laravel ecosystem,
                                including new package releases and tutorials.
                            </div>
                        </div>
                    </div>
                    <div class="col pt-3">
                        <div class="d-flex align-items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="text-muted"
                                width="30"
                            >
                                <path
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            <div class="ms-3 fw-bold d-inline text-muted">
                                Vibrant Ecosystem
                            </div>
                        </div>

                        <div class="ms-5">
                            <div class="mt-2 text-muted fs-6">
                                Laravel's robust library of first-party tools
                                and libraries, such as
                                <a
                                    href="https://forge.laravel.com"
                                    class="underline"
                                    >Forge</a
                                >,
                                <a
                                    href="https://vapor.laravel.com"
                                    class="underline"
                                    >Vapor</a
                                >,
                                <a
                                    href="https://nova.laravel.com"
                                    class="underline"
                                    >Nova</a
                                >, and
                                <a href="https://envoyer.io" class="underline"
                                    >Envoyer</a
                                >
                                help you take your projects to the next level.
                                Pair them with powerful open source libraries
                                like
                                <a
                                    href="https://laravel.com/docs/billing"
                                    class="underline"
                                    >Cashier</a
                                >,
                                <a
                                    href="https://laravel.com/docs/dusk"
                                    class="underline"
                                    >Dusk</a
                                >,
                                <a
                                    href="https://laravel.com/docs/broadcasting"
                                    class="underline"
                                    >Echo</a
                                >,
                                <a
                                    href="https://laravel.com/docs/horizon"
                                    class="underline"
                                    >Horizon</a
                                >,
                                <a
                                    href="https://laravel.com/docs/sanctum"
                                    class="underline"
                                    >Sanctum</a
                                >,
                                <a
                                    href="https://laravel.com/docs/telescope"
                                    class="underline"
                                    >Telescope</a
                                >, and more.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <svg
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="d-inline text-muted"
                    width="30"
                >
                    <path
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                    ></path>
                </svg>

                <a
                    href="https://laravel.bigcartel.com"
                    class="ms-1 underline text-muted fs-6"
                    >Shop</a
                >

                <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    class="d-inline ms-4 text-muted"
                    width="30"
                >
                    <path
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                    ></path>
                </svg>

                <a
                    href="https://github.com/sponsors/taylorotwell"
                    class="ms-1 underline text-muted fs-6"
                    >Sponsor</a
                >
            </div>
            <div class="col text-muted fs-6 text-end">
                Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
            </div>
        </div>
    </div>
</template>
