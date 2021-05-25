<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Counter
        </teleport>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Register customer car into queue.
            </h6>
        </template>
        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Counter
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="form.post(route('owner.store'))">
                    <div class="row">
                        <div class="mt-3 p-3 col-6">
                            <label for="car_id">Car</label><br />
                            <select
                                v-model="form.car_id"
                                @change="form.clearErrors('car_id')"
                                class="w-full rounded-md shadow-sm"
                                :class="
                                    form.errors.car_id
                                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                                "
                                required
                            >
                                <option
                                    v-for="car in cars"
                                    :key="car.id"
                                    :value="car.id"
                                    >{{ car.plate_no }}</option
                                >
                            </select>
                            <span class="text-red-700 mt-2 text-sm">{{
                                form.errors.car_id
                            }}</span>
                        </div>
                        <div class="mt-3 p-3 col-6">
                            <label for="package_id">Package</label><br />
                            <select
                                v-model="form.package_id"
                                @change="form.clearErrors('package_id')"
                                class="w-full rounded-md shadow-sm"
                                :class="
                                    form.errors.package_id
                                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                                "
                                required
                            >
                                <option
                                    v-for="pkg in packages"
                                    :key="pkg.id"
                                    :value="pkg.id"
                                    >{{ pkg.name }}</option
                                >
                            </select>
                            <span class="text-red-700 mt-2 text-sm">{{
                                form.errors.package_id
                            }}</span>
                        </div>
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <inertia-link
                            :href="route('dashboard')"
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
                            Link
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
        cars: Object,
        packages: Object
    },

    setup() {
        const form = useForm({
            car_id: null,
            package_id: null
        });

        return { form };
    }
};
</script>
