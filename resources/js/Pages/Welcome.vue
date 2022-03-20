<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';


</script>

<template>
    <Head title="Welcome" />
    <div class="flex flex-col overflow-y-auto md:flex-row">

        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Create account
                </h1>

                <BreezeValidationErrors class="mb-4" />

                <form @submit.prevent="submit">


                    <div class="mt-4">
                        <BreezeLabel for="email" value="Email" />
                        <BreezeInput
                            id="email"
                            type="email"
                            class="block w-full mt-1"
                            v-model="form.email"
                            required
                            autocomplete="username"
                        />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="password" value="Password" />
                        <BreezeInput
                            id="password"
                            type="password"
                            class="block w-full mt-1"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <Link
                            :href="route('login')"
                            class="text-sm text-gray-600 underline  hover:text-gray-900"
                        >
                            Already registered?
                        </Link>

                        <BreezeButton
                            class="ml-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Register
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

import BreezeGuestLayout from "@/Layouts/Guest";
import BreezeButton from "@/Components/Button";
import BreezeInput from "@/Components/Input";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";
import {Head, Link} from "@inertiajs/inertia-vue3";

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("moderator.student.store"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
</script>
