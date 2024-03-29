<template>
    <breeze-authenticated-layout>
        <template #title> - Edit Car </template>
        <template #header>
            <inertia-link
                :href="route('cars.show', car)"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">Edit existing car</h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('cars.index')" :active="false">
                Cars
            </breeze-nav-link>
            <breeze-nav-link :href="route('cars.show', car)" :active="false">
                Car
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
                <form @submit.prevent="form.put(route('cars.update', car))">
                    <div class="mt-3 p-3">
                        <label for="plate_no">Plate No</label>
                        <input
                            type="text"
                            placeholder="Plate no"
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
                        <label for="model">Model</label>
                        <input
                            type="text"
                            placeholder="Model"
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
                            <option value="" disabled>Select Size</option>
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
                placeholder="Search customer..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formCustomer.query"
            />
        </div>

        <div
            v-if="formCustomer.query && customers.length == 0"
            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching customers.
        </div>

        <transition name="fade">
            <div
                v-if="customers.length > 0"
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Customer Name</th>
                        <th class="px-3 py-3">Customer Phone No</th>
                    </tr>
                    <tr
                        v-for="customer in customers"
                        :key="customer.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ customer.name }}
                        </td>
                        <td class="border-t pl-3 py-3 focus:text-indigo-500">
                            {{ customer.phone_no }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                v-if="
                                    !car.owners.some(
                                        (data) => data.id === customer.id
                                    )
                                "
                                type="button"
                                @click="linkCustomer(customer)"
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
            v-if="car.owners.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Linked Owner Name</th>
                    <th class="px-3 py-3">Linked Owner Phone No</th>
                </tr>
                <tr
                    v-for="owner in car.owners"
                    :key="owner.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('customers.show', owner)"
                        >
                            {{ owner.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="px-3 py-3 focus:text-indigo-500"
                            :href="route('customers.show', owner)"
                        >
                            {{ owner.phone_no }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="unlinkCustomer(owner)"
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
        car: Object,
    },

    setup() {
        const form = useForm({
            plate_no: null,
            model: null,
            size: null,
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.plate_no = this.car.plate_no;
            this.form.model = this.car.model;
            this.form.size = this.car.size;
        },
        linkCustomer(customer) {
            this.$inertia.post(
                route("owner.link"),
                {
                    customer_id: customer.id,
                    car_id: this.car.id,
                },
                {
                    onSuccess: () => {
                        this.formCustomer.query = "";
                        this.customers = [];
                        this.flash.success =
                            "Customer linked successfully to car.";
                    },
                }
            );
        },
        unlinkCustomer(customer) {
            this.$inertia.post(
                route("owner.unlink"),
                {
                    car_id: this.car.id,
                    customer_id: customer.id,
                },
                {
                    onSuccess: () => {
                        this.flash.warning =
                            "Customer unlinked from car. <a href='" +
                            route("customers.show", customer) +
                            " 'style='color:#92400e;text-decoration:underline;'>View customer</a>";
                    },
                }
            );
        },
    },

    data() {
        return {
            formCustomer: {
                query: null,
            },
            customers: [],
        };
    },

    watch: {
        formCustomer: {
            deep: true,
            handler: throttle(function () {
                if (this.formCustomer.query && this.formCustomer.query != "") {
                    axios
                        .get(route("customers.search"), {
                            params: {
                                query: this.formCustomer.query,
                            },
                        })
                        .then((response) => {
                            this.customers = response.data;
                        });
                } else {
                    this.customers = [];
                }
            }, 150),
        },
    },
};
</script>
