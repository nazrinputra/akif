<template>
    <div class="container">
        <div class="p-3">
            <div v-if="!customer" class="input-group">
                <input
                    type="text"
                    id="searchCustomer"
                    placeholder="Search customer..."
                    class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="formCustomer.query"
                />
            </div>

            <div
                v-if="formCustomer.query && customers.length == 0"
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                Oops, we could not find any matching customers.
                <inertia-link
                    :href="route('customers.create')"
                    class="text-blue-500 text-decoration-none"
                    >Create new?</inertia-link
                >
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
                            <td class="border-t w-px md:table-cell hidden pr-3">
                                <breeze-button
                                    @click="selectCustomer(customer)"
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
                        <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                            <td
                                class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                            >
                                {{ customer.name }}
                            </td>
                            <td class="border-t w-px md:table-cell hidden pr-3">
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
            <breeze-button type="button" @click="back">
                Back
            </breeze-button>
            <breeze-button type="button" @click="next">
                Next
            </breeze-button>
        </div>
    </div>
</template>

<script>
import BreezeButton from "@/Components/Button";
import throttle from "lodash/throttle";

export default {
    components: {
        BreezeButton
    },

    data() {
        return {
            formCustomer: {
                query: null
            },
            customers: [],
            customer: null
        };
    },

    watch: {
        formCustomer: {
            deep: true,
            handler: throttle(function() {
                if (this.formCustomer.query && this.formCustomer.query != "") {
                    axios
                        .get(route("customers.search"), {
                            params: {
                                query: this.formCustomer.query
                            }
                        })
                        .then(response => {
                            this.customers = response.data;
                        });
                } else {
                    this.customers = [];
                }
            }, 150)
        }
    },

    methods: {
        selectCustomer(customer) {
            this.customer = customer;
            this.formCustomer.query = null;
            this.customers = [];
            this.$emit("selectCustomer", customer);
        },
        clearCustomer() {
            this.customer = null;
            this.$emit("clearCustomer");
        },
        back() {
            this.$emit("back");
        },
        next() {
            this.$emit("next");
        }
    }
};
</script>
