<template>
    <breeze-authenticated-layout>
        <template #title> - Edit Package </template>
        <template #header>
            <inertia-link
                :href="route('packages.show', pkg)"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">Edit existing package</h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('packages.index')" :active="false">
                Packages
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('packages.show', pkg)"
                :active="false"
            >
                Package
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
                <form @submit.prevent="form.put(route('packages.update', pkg))">
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
                        <label for="price">Display Price (RM)</label>
                        <input
                            type="number"
                            placeholder="Price"
                            id="price"
                            step=".05"
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
                            placeholder="Frequency"
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
                            placeholder="Duration"
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
                            placeholder="Description"
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
                            <option value="" disabled>Select Promotion</option>
                            <option :value="1">Yes</option>
                            <option :value="0">No</option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.promotion
                        }}</span>
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            class="ml-auto"
                            :class="{
                                'opacity-25': form.processing,
                            }"
                            :disabled="form.processing"
                        >
                            Update
                        </breeze-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="input-group pt-3">
            <input
                type="text"
                id="search"
                placeholder="Search service..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formService.query"
            />
        </div>

        <div
            v-if="formService.query && services.length == 0"
            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching services.
        </div>

        <transition name="fade">
            <div
                v-if="services.length > 0"
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Service Name</th>
                    </tr>
                    <tr
                        v-for="service in services"
                        :key="service.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ service.name }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                v-if="
                                    !pkg.services.some(
                                        (data) => data.id === service.id
                                    )
                                "
                                type="button"
                                @click="linkService(service)"
                                tabindex="-1"
                            >
                                <i class="fas fa-link"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </transition>

        <div
            v-if="pkg.services.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Linked Service Name</th>
                </tr>
                <tr
                    v-for="service in pkg.services"
                    :key="service.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('services.show', service)"
                        >
                            {{ service.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="unlinkService(service)"
                            tabindex="-1"
                        >
                            <i class="fas fa-unlink"></i>
                        </breeze-button>
                    </td>
                </tr>
            </table>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import throttle from "lodash/throttle";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        pkg: Object,
    },

    setup() {
        const form = useForm({
            name: null,
            price: null,
            frequency: null,
            duration: null,
            description: null,
            promotion: "",
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.pkg.name;
            this.form.price = (this.pkg.price / 100).toFixed(2);
            this.form.frequency = this.pkg.frequency;
            this.form.duration = this.pkg.duration;
            this.form.description = this.pkg.description;
            this.form.promotion = this.pkg.promotion;
        },
        linkService(service) {
            this.$inertia.post(
                route("package.link"),
                {
                    service_id: service.id,
                    package_id: this.pkg.id,
                },
                {
                    onSuccess: () => {
                        this.formService.query = "";
                        this.services = [];
                        this.flash.success =
                            "Service linked successfully to package.";
                    },
                }
            );
        },
        unlinkService(service) {
            this.$inertia.post(
                route("package.unlink"),
                {
                    service_id: service.id,
                    package_id: this.pkg.id,
                },
                {
                    onSuccess: () => {
                        this.flash.warning =
                            "Service unlinked from package. <a href='" +
                            route("services.show", service) +
                            " 'style='color:#92400e;text-decoration:underline;'>View service</a>";
                    },
                }
            );
        },
    },

    data() {
        return {
            formService: {
                query: null,
            },
            services: [],
        };
    },

    watch: {
        formService: {
            deep: true,
            handler: throttle(function () {
                if (this.formService.query && this.formService.query != "") {
                    axios
                        .get(route("services.search"), {
                            params: {
                                query: this.formService.query,
                            },
                        })
                        .then((response) => {
                            this.services = response.data;
                        });
                } else {
                    this.services = [];
                }
            }, 150),
        },
    },
};
</script>
