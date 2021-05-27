<template>
    <breeze-authenticated-layout>
        <template #title>
            - Create Package
        </template>
        <template #header>
            <inertia-link
                :href="route('packages.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Add new package
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('packages.index')" :active="false">
                Packages
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Package
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="form.post(route('packages.store'))">
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
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.name
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="price">Price</label>
                        <input
                            type="number"
                            id="price"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.price
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.price"
                            @keydown="form.clearErrors('price')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.price
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="frequency">Frequency</label>
                        <input
                            type="text"
                            id="frequency"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.frequency
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.frequency"
                            @keydown="form.clearErrors('frequency')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.frequency
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="duration">Duration</label>
                        <input
                            type="text"
                            id="duration"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.duration
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.duration"
                            @keydown="form.clearErrors('duration')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.duration
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="description">Description</label>
                        <textarea
                            rows="7"
                            id="description"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.description
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.description"
                            @keydown="form.clearErrors('description')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.description
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="promotion">Promotion</label>
                        <select
                            v-model="form.promotion"
                            @change="form.clearErrors('promotion')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.promotion
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            required
                        >
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.promotion
                        }}</span>
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <inertia-link
                            :href="route('packages.index')"
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
        flash: Object
    },

    setup() {
        const form = useForm({
            name: null,
            price: null,
            frequency: null,
            duration: null,
            description: null,
            promotion: null
        });

        return { form };
    }
};
</script>
