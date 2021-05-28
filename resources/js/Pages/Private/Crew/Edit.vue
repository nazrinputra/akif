<template>
    <breeze-authenticated-layout>
        <template #title>
            - Edit Crew
        </template>
        <template #header>
            <inertia-link
                :href="route('crews.show', crew)"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Edit existing crew
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('crews.index')" :active="false">
                Crews
            </breeze-nav-link>
            <breeze-nav-link :href="route('crews.show', crew)" :active="false">
                Crew
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Edit
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="form.put(route('crews.update', crew))">
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
                        <label for="role_id">Role</label>
                        <select
                            v-model="form.role_id"
                            @change="form.clearErrors('role_id')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.role_id
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            required
                        >
                            <option value="" disabled>Select Role</option>
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
        roles: Object,
        crew: Object
    },

    setup() {
        const form = useForm({
            name: null,
            phone_no: null,
            email: null,
            store_id: "",
            role_id: ""
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.crew.name;
            this.form.phone_no = this.crew.phone_no;
            this.form.email = this.crew.email;
            this.form.store_id = this.crew.store_id;
            this.form.role_id = this.crew.role_id;
        }
    }
};
</script>
