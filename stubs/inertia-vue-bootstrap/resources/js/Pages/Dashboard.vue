<template>
    <bootstrap-authenticated-layout>
        <div class="card shadow-sm">
            <div class="card-body">
                You're logged in!
            </div>
        </div>
    </bootstrap-authenticated-layout>
</template>

<script>
    import BootstrapAuthenticatedLayout from '@/Layouts/Authenticated'

    export default {
        components: {
            BootstrapAuthenticatedLayout,
        },
    }
</script>
