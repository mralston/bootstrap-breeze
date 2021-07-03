<template>
    <breeze-validation-errors class="mb-4" />

    <div v-if="status" class="alert alert-success mb-4">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control shadow-sm" v-model="form.email" required autofocus autocomplete="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control shadow-sm" v-model="form.password" required autofocus autocomplete="current-password">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember" :checked="form.remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <div class="float-end">
            <inertia-link v-if="canResetPassword" :href="route('password.request')" class="text-dark">Forgot your password?</inertia-link>
            <button type="submit" class="btn btn-dark ms-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Log in
            </button>
        </div>

    </form>
</template>

<script>
    import BreezeGuestLayout from "@/Layouts/Guest"
    import BreezeValidationErrors from '@/Components/ValidationErrors'

    export default {
        layout: BreezeGuestLayout,

        components: {
            BreezeValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
            }
        }
    }
</script>
