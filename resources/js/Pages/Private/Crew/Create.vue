<template>
    <breeze-authenticated-layout>
        <template #title>
            - Create Crew
        </template>
        <template #header>
            <inertia-link
                :href="route('crews.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Add new crew
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('crews.index')" :active="false">
                Crews
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Crew
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="submit">
                    <div class="mt-3 p-3">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            placeholder="Name"
                            id="name"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.name
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.name"
                            @keydown="form.clearErrors('name')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.name
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="phone_no">Phone No</label>
                        <input
                            type="number"
                            placeholder="Phone No"
                            id="phone_no"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.phone_no
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.phone_no"
                            @keydown="form.clearErrors('phone_no')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.phone_no
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            placeholder="Email"
                            id="email"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.email
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.email"
                            @keydown="form.clearErrors('email')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.email
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="store_id">Store</label>
                        <select
                            v-model="form.store_id"
                            @change="form.clearErrors('store_id')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.store_id
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            required
                        >
                            <option value="" disabled>Select Store</option>
                            <option
                                v-for="store in stores"
                                :key="store.id"
                                :value="store.id"
                            >
                                {{ store.name }}
                            </option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.store_id
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            placeholder="Password"
                            id="password"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.password
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.password"
                            @keydown="form.clearErrors('password')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.password
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="password_confirmation"
                            >Confirm Password</label
                        >
                        <input
                            type="password"
                            placeholder="Confirm Password"
                            id="password_confirmation"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.password
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.password_confirmation"
                            @keydown="form.clearErrors('password')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.password
                        }}</span>
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <inertia-link
                            :href="route('crews.index')"
                            class="btn btn-secondary"
                        >
                            Back
                        </inertia-link>
                        <breeze-button
                            :class="{
                                'opacity-25': form.processing
                            }"
                            :disabled="form.processing"
                        >
                            Submit
                        </breeze-button>
                    </div>
                </form>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        stores: Object
    },

    setup() {
        const form = useForm({
            name: null,
            phone_no: null,
            email: null,
            store_id: "",
            password: null,
            password_confirmation: null
        });

        return { form };
    },

    methods: {
        submit() {
            this.form.post(route("crews.store"), {
                onSuccess: () =>
                    this.form.reset("password", "password_confirmation")
            });
        }
    }
};
</script>
