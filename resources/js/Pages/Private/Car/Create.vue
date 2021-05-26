<template>
    <breeze-authenticated-layout>
        <template #title>
            - Create Car
        </template>
        <template #header>
            <inertia-link :href="route('cars.index')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Add new car
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('cars.index')" :active="false">
                Cars
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Car
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="form.post(route('cars.store'))">
                    <div class="mt-3 p-3">
                        <label for="plate_no">Plate No</label>
                        <input
                            type="text"
                            id="plate_no"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.plate_no
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.plate_no"
                            @keydown="form.clearErrors('plate_no')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.plate_no
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="brand">Brand</label>
                        <input
                            type="text"
                            id="brand"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.brand
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.brand"
                            @keydown="form.clearErrors('brand')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.brand
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="model">Model</label>
                        <input
                            type="text"
                            id="model"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.model
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.model"
                            @keydown="form.clearErrors('model')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.model
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="color">Color</label>
                        <input
                            type="text"
                            id="color"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.color
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.color"
                            @keydown="form.clearErrors('color')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.color
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="size">Size</label>
                        <select
                            v-model="form.size"
                            @change="form.clearErrors('size')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.size
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            required
                        >
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.size
                        }}</span>
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <inertia-link
                            :href="route('cars.index')"
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
            plate_no: null,
            brand: null,
            model: null,
            color: null,
            size: null
        });

        return { form };
    }
};
</script>
