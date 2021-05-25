<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Profile
        </teleport>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View logged in user profile.
            </h6>
        </template>
        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Profile
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
                            id="name"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.name
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.name"
                            @keydown="form.clearErrors('name')"
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.name
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="phone_no">Phone No</label>
                        <input
                            type="number"
                            id="phone_no"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.phone_no
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.phone_no"
                            @keydown="form.clearErrors('phone_no')"
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.phone_no
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.email
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.email"
                            @keydown="form.clearErrors('email')"
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.email
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="store_id">Store</label>
                        <!-- TODO add role checking for disable-->
                        <select
                            v-model="form.store_id"
                            :disabled="auth.user.role_id == 1"
                            @change="form.clearErrors('store_id')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.store_id
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                        >
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
                        <label for="role_id">Role</label>
                        <!-- TODO add role checking for disable-->
                        <select
                            v-model="form.role_id"
                            @change="form.clearErrors('role_id')"
                            :disabled="auth.user.role_id == 1"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.role_id
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                        >
                            <option
                                v-for="role in roles"
                                :key="role.id"
                                :value="role.id"
                            >
                                {{ role.name }}
                            </option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.role_id
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            id="password"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.password
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.password"
                            @keydown="form.clearErrors('password')"
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
                            id="password_confirmation"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.password
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.password_confirmation"
                            @keydown="form.clearErrors('password')"
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.password
                        }}</span>
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            class="ml-auto"
                            :class="{
                                'opacity-25': form.processing
                            }"
                            :disabled="form.processing"
                        >
                            Update
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
        stores: Object,
        roles: Object
    },

    setup() {
        const form = useForm({
            name: null,
            phone_no: null,
            email: null,
            store_id: null,
            role_id: null,
            password: null,
            password_confirmation: null
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.auth.user.name;
            this.form.phone_no = this.auth.user.phone_no;
            this.form.email = this.auth.user.email;
            this.form.store_id = this.auth.user.store_id;
            this.form.role_id = this.auth.user.role_id;
        },
        submit() {
            this.form.put(route("profiles.update"), {
                onSuccess: () =>
                    this.form.reset("password", "password_confirmation")
            });
        }
    }
};
</script>
