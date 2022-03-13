<template>
    <breeze-authenticated-layout>
        <template #title> - Create Car </template>
        <template #header>
            <inertia-link :href="route('cars.index')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">Add new car</h6>
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
                <form @submit.prevent="submit">
                    <div class="mt-3 p-3">
                        <div class="flex justify-content-between">
                            <label for="plate_no">Plate No</label>
                            <label class="flex items-center">
                                <breeze-checkbox
                                    name="unregistered"
                                    v-model:checked="form.unregistered"
                                />
                                <span class="ml-2 text-sm text-gray-600"
                                    >Unregistered car?</span
                                >
                            </label>
                        </div>
                        <input
                            v-if="!form.unregistered"
                            type="text"
                            placeholder="Plate No"
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

                    <div class="mt-3 p-3">
                        <label for="search">Customer (optional)</label>
                        <div v-if="!customer" class="input-group">
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
                                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">Customer Name</th>
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
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                @click="
                                                    selectCustomer(customer)
                                                "
                                                type="button"
                                            >
                                                <i class="fas fa-check"></i>
                                            </breeze-button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </transition>

                        <transition name="fade">
                            <div
                                v-if="customer"
                                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">
                                            Selected Customer Name
                                        </th>
                                    </tr>
                                    <tr
                                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                                    >
                                        <td
                                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                        >
                                            {{ customer.name }}
                                        </td>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                type="button"
                                                @click="clearCustomer()"
                                            >
                                                <i class="fas fa-times"></i>
                                            </breeze-button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </transition>
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
                                'opacity-25': form.processing,
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
import BreezeCheckbox from "@/Components/Checkbox";
import throttle from "lodash/throttle";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeCheckbox,
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
    },

    setup() {
        const form = useForm({
            plate_no: null,
            unregistered: null,
            model: null,
            size: "",
            customer_id: null,
        });

        return { form };
    },

    data() {
        return {
            formCustomer: {
                query: null,
            },
            customers: [],
            customer: null,
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

    methods: {
        selectCustomer(customer) {
            this.customer = customer;
            this.formCustomer.query = "";
            this.customers = [];
        },
        clearCustomer() {
            this.customer = null;
        },
        submit() {
            if (this.customer) {
                this.form.customer_id = this.customer.id;
            }
            this.form.post(route("cars.store"));
        },
    },
};
</script>
