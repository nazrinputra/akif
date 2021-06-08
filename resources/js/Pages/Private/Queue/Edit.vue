<template>
    <breeze-authenticated-layout>
        <template #title>
            - Edit Queue
        </template>
        <template #header>
            <inertia-link
                :href="route('queues.show', queue)"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Edit queue
            </h6>
            <inertia-link
                v-if="hasAnyPermission(['edit queues'])"
                :href="route('queues.manage')"
                class="btn btn-secondary mr-3"
            >
                <i class="fas fa-clipboard-list"></i>
            </inertia-link>
            <inertia-link
                :href="route('counter')"
                v-if="hasAnyPermission(['create queues'])"
                class="btn btn-secondary"
            >
                <i class="fas fa-cash-register"></i>
            </inertia-link>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('queues.index')" :active="false">
                Queues
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('queues.show', queue)"
                :active="false"
            >
                Queue
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Edit
            </span>
        </template>

        <div v-if="!newQueue.package" class="input-group">
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
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching packages.
            <span
                @click="viewAllPackages"
                class="text-blue-500 text-decoration-none cursor-pointer"
            >
                View all?
            </span>
        </div>

        <transition name="fade">
            <div
                v-if="packages.length > 0"
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Package Name</th>
                        <th class="px-3 py-3">
                            Custom Price
                        </th>
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
                        <td
                            class="border-t px-3 focus:text-indigo-500"
                            v-if="pkg.custom_price == false"
                        >
                            Not Required
                        </td>
                        <td
                            class="border-t px-3 focus:text-indigo-500"
                            v-if="pkg.custom_price == true"
                        >
                            Required
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
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
            v-if="newQueue.package"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <span v-if="!checkPackage()" class="p-3 text-red-500">
                <i class="fas fa-exclamation-triangle"></i> Price input required
            </span>
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Selected Package Name</th>
                    <th class="px-3 py-3">
                        Custom Price
                    </th>
                </tr>
                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('packages.show', newQueue.package)"
                        >
                            {{ newQueue.package.name }}
                        </inertia-link>
                    </td>
                    <td
                        class="border-t px-3 focus:text-indigo-500"
                        v-if="newQueue.package.custom_price == false"
                    >
                        Not Required
                    </td>
                    <td
                        class="border-t focus:text-indigo-500"
                        v-if="newQueue.package.custom_price == true"
                    >
                        <input
                            type="number"
                            step=".05"
                            placeholder="Custom Price"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                checkPackage() == false
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.package_custom_price"
                        />
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="removePackage()"
                            tabindex="-1"
                        >
                            <i class="fas fa-times"></i>
                        </breeze-button>
                    </td>
                </tr>
            </table>
        </div>

        <div class="input-group mt-3">
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
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching services.
            <span
                @click="viewAllServices"
                class="text-blue-500 text-decoration-none cursor-pointer"
            >
                View all?
            </span>
        </div>

        <transition name="fade">
            <div
                v-if="services.length > 0"
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Service Name</th>
                        <th class="px-3 py-3">
                            Custom Price
                        </th>
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
                        <td
                            class="border-t px-3 focus:text-indigo-500"
                            v-if="service.custom_price == false"
                        >
                            Not Required
                        </td>
                        <td
                            class="border-t px-3 focus:text-indigo-500"
                            v-if="service.custom_price == true"
                        >
                            Required
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
            v-if="newQueue.services.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <span v-if="!checkService()" class="p-3 text-red-500">
                <i class="fas fa-exclamation-triangle"></i> Price input required
            </span>
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Selected Service Name</th>
                    <th class="px-3 py-3">
                        Custom Price
                    </th>
                </tr>
                <tr
                    v-for="(service, index) in newQueue.services"
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
                    <td
                        class="border-t px-3 focus:text-indigo-500"
                        v-if="service.custom_price == false"
                    >
                        Not Required
                    </td>
                    <td
                        class="border-t focus:text-indigo-500"
                        v-if="service.custom_price == true"
                    >
                        <input
                            type="number"
                            step=".05"
                            placeholder="Custom Price"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                checkService() == false
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.services_custom_price[index]"
                        />
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="removeService(index)"
                            tabindex="-1"
                        >
                            <i class="fas fa-times"></i>
                        </breeze-button>
                    </td>
                </tr>
            </table>
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

        <div
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
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
                            :disabled="form.processing || !checkProduct"
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
            remarks: null,
            package_id: null,
            package_custom_price: null,
            services_id: [],
            services_custom_price: []
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
            packages: [],
            newQueue: this.queue
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

    computed: {
        checkProduct() {
            if (this.newQueue.package && this.newQueue.services.length == 0) {
                return this.checkPackage();
            }
            if (this.newQueue.services.length > 0 && !this.newQueue.package) {
                return this.checkService();
            }
            if (this.newQueue.package && this.newQueue.services.length > 0) {
                return this.checkPackage() && this.checkService();
            } else {
                return false;
            }
        }
    },

    methods: {
        loadData() {
            this.form.status = this.newQueue.status;
            this.form.remarks = this.newQueue.remarks;
            this.form.package_id = this.newQueue.package_id;
            this.form.package_custom_price = this.newQueue.package_custom_price;
            let self = this;
            this.newQueue.services.forEach(service => {
                self.form.services_id.push(service.id);
                self.form.services_custom_price.push(
                    service.pivot.custom_price
                );
            });
        },
        viewAllServices() {
            axios.get(route("services.all")).then(response => {
                this.services = response.data;
            });
        },
        viewAllPackages() {
            axios.get(route("packages.all")).then(response => {
                this.packages = response.data;
            });
        },
        addService(service) {
            this.formService.query = null;
            this.services = [];
            this.newQueue.services.push(service);
            this.form.services_id.push(service.id);
            this.form.services_custom_price.push(null);
        },
        removeService(index) {
            this.newQueue.services.splice(index, 1);
            this.form.services_id.splice(index, 1);
            this.form.services_custom_price.splice(index, 1);
        },
        checkService() {
            if (this.newQueue.services.length > 0) {
                let self = this;
                let status = [];
                this.newQueue.services.forEach(function(service, i) {
                    if (
                        (service.custom_price == 1 &&
                            self.form.services_custom_price[i] == null) ||
                        self.form.services_custom_price[i] == ""
                    ) {
                        status.push(false);
                    } else {
                        status.push(true);
                    }
                });
                let checker = arr => arr.every(status => status === true);
                return checker(status);
            } else {
                return false;
            }
        },
        addPackage(pkg) {
            this.formPackage.query = null;
            this.packages = [];
            this.newQueue.package = pkg;
            this.form.package_id = pkg.id;
        },
        removePackage() {
            this.newQueue.package = null;
            this.form.package_id = null;
            this.form.package_custom_price = null;
        },
        checkPackage() {
            if (this.newQueue.package) {
                if (
                    (this.newQueue.package.custom_price == 1 &&
                        this.form.package_custom_price == null) ||
                    this.form.package_custom_price == ""
                ) {
                    return false;
                }
                return true;
            } else {
                return false;
            }
        }
    }
};
</script>
