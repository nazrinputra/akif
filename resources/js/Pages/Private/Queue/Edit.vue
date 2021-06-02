<template>
    <breeze-authenticated-layout>
        <template #title>
            - Edit Queue
        </template>
        <template #header>
            <inertia-link
                :href="route('queues.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Edit queue
            </h6>
            <inertia-link
                :href="route('counter')"
                v-if="hasAnyPermission(['create_queues'])"
                class="btn btn-secondary"
            >
                <i class="fas fa-cash-register"></i>
            </inertia-link>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('queues.index')" :active="false">
                Queues
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Queue
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="form.put(route('queues.update', queue))">
                    <div class="mt-3 p-3">
                        <label for="status">Status</label>
                        <select
                            v-model="form.status"
                            @change="form.clearErrors('status')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.status
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            required
                            ><option value="" disabled>Select Status</option>
                            <option value="Waiting">Waiting</option>
                            <option value="Grooming">Grooming</option>
                            <option value="Completed">Completed</option>
                            <option value="Collected">Collected</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.status
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="remarks">Remarks</label>
                        <textarea
                            rows="7"
                            id="remarks"
                            placeholder="Remarks"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.remarks
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.remarks"
                            @keydown="form.clearErrors('remarks')"
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.remarks
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

        <div
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Customer Name</th>
                </tr>
                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('customers.show', queue.customer)"
                        >
                            {{ queue.customer.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('customers.show', queue.customer)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>

        <div
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Car Model</th>
                    <th class="px-3 py-3">Car Plate No</th>
                </tr>
                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('cars.show', queue.car)"
                        >
                            {{ queue.car.model }}
                        </inertia-link>
                    </td>
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('cars.show', queue.car)"
                        >
                            {{ queue.car.plate_no }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('cars.show', queue.car)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>

        <div class="input-group pt-3">
            <input
                type="text"
                id="searchPackage"
                placeholder="Search package..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formPackage.query"
            />
        </div>

        <div
            v-if="formPackage.query && packages.length == 0"
            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching packages.
        </div>

        <transition name="fade">
            <div
                v-if="packages.length > 0"
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Package Name</th>
                    </tr>
                    <tr
                        v-for="pkg in packages"
                        :key="pkg.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ pkg.name }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                v-if="
                                    !queue.packages.some(
                                        data => data.id === pkg.id
                                    )
                                "
                                type="button"
                                @click="addPackage(pkg)"
                                tabindex="-1"
                            >
                                <i class="fas fa-check"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </transition>

        <div
            v-if="queue.packages.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Selected Package Name</th>
                </tr>
                <tr
                    v-for="pkg in queue.packages"
                    :key="pkg.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('packages.show', pkg)"
                        >
                            {{ pkg.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="removePackage(pkg)"
                            tabindex="-1"
                        >
                            <i class="fas fa-times"></i>
                        </breeze-button>
                    </td>
                </tr>
            </table>
        </div>

        <div class="input-group pt-3">
            <input
                type="text"
                id="searchService"
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
                                    !queue.services.some(
                                        data => data.id === service.id
                                    )
                                "
                                type="button"
                                @click="addService(service)"
                                tabindex="-1"
                            >
                                <i class="fas fa-check"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </transition>

        <div
            v-if="queue.services.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Selected Service Name</th>
                </tr>
                <tr
                    v-for="service in queue.services"
                    :key="service.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('services.show', service)"
                        >
                            {{ service.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="removeService(service)"
                            tabindex="-1"
                        >
                            <i class="fas fa-times"></i>
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
        BreezeButton
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        queue: Object
    },

    setup() {
        const form = useForm({
            status: "",
            remarks: null
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    data() {
        return {
            formService: {
                query: null
            },
            services: [],
            formPackage: {
                query: null
            },
            packages: []
        };
    },

    watch: {
        formService: {
            deep: true,
            handler: throttle(function() {
                if (this.formService.query && this.formService.query != "") {
                    axios
                        .get(route("services.search"), {
                            params: {
                                query: this.formService.query
                            }
                        })
                        .then(response => {
                            this.services = response.data;
                        });
                } else {
                    this.services = [];
                }
            }, 150)
        },
        formPackage: {
            deep: true,
            handler: throttle(function() {
                if (this.formPackage.query && this.formPackage.query != "") {
                    axios
                        .get(route("packages.search"), {
                            params: {
                                query: this.formPackage.query
                            }
                        })
                        .then(response => {
                            this.packages = response.data;
                        });
                } else {
                    this.packages = [];
                }
            }, 150)
        }
    },

    methods: {
        loadData() {
            this.form.status = this.queue.status;
            this.form.remarks = this.queue.remarks;
        },
        addService(service) {
            this.$inertia.post(
                route("service.add"),
                {
                    service_id: service.id,
                    queue_id: this.queue.id
                },
                {
                    onSuccess: () => {
                        this.formService.query = "";
                        this.services = [];
                        this.flash.success =
                            "Service added successfully to queue.";
                    }
                }
            );
        },
        removeService(service) {
            this.$inertia.post(
                route("service.remove"),
                {
                    service_id: service.id,
                    queue_id: this.queue.id
                },
                {
                    onSuccess: () => {
                        this.flash.warning =
                            "Service removed from queue. <a href='" +
                            route("services.show", service) +
                            " 'style='color:#92400e;text-decoration:underline;'>View service</a>";
                    }
                }
            );
        },
        addPackage(pkg) {
            this.$inertia.post(
                route("package.add"),
                {
                    package_id: pkg.id,
                    queue_id: this.queue.id
                },
                {
                    onSuccess: () => {
                        this.formPackage.query = "";
                        this.packages = [];
                        this.flash.success =
                            "Package added successfully to queue.";
                    }
                }
            );
        },
        removePackage(pkg) {
            this.$inertia.post(
                route("package.remove"),
                {
                    package_id: pkg.id,
                    queue_id: this.queue.id
                },
                {
                    onSuccess: () => {
                        this.flash.warning =
                            "Package removed from queue. <a href='" +
                            route("packages.show", pkg) +
                            " 'style='color:#92400e;text-decoration:underline;'>View package</a>";
                    }
                }
            );
        }
    }
};
</script>
