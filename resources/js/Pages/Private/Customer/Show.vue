<template>
    <breeze-authenticated-layout>
        <template #title>
            - Show Customer
        </template>
        <template #header>
            <inertia-link
                :href="route('customers.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 v-on:click="isVisible = !isVisible" class="pt-2.5 mx-auto">
                View existing customer
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('customers.index')" :active="false">
                Customers
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Customer
            </span>
        </template>

        <breeze-trashed-message
            v-if="customer.deleted_at"
            class="mb-6"
            @restore="restore(customer)"
        >
            This customer has been deleted.
        </breeze-trashed-message>

        <transition name="fade">
            <div
                v-show="isVisible && customer.personalities.length > 0"
                class="mb-3 p-3"
            >
                <span
                    v-for="personality in customer.personalities"
                    :key="personality.id"
                >
                    <inertia-link
                        class="mx-1 badge badge-pill"
                        :class="tagging(personality.color)"
                        style="font-size: 125% !important;"
                        :href="route('personalities.show', personality)"
                    >
                        <p class="px-2 pb-1 pt-3">{{ personality.name }}</p>
                    </inertia-link>
                </span>
            </div>
        </transition>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form>
                    <div class="mt-3 p-3">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            id="name"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="customer.name"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="phone_no">Phone No</label>
                        <input
                            type="number"
                            id="phone_no"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="customer.phone_no"
                            disabled
                        />
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            v-if="
                                !customer.deleted_at &&
                                    hasAnyPermission(['delete customers'])
                            "
                            @click="destroy(customer)"
                            type="button"
                        >
                            Delete
                        </breeze-button>
                        <inertia-link
                            v-if="
                                !customer.deleted_at &&
                                    hasAnyPermission(['edit customers'])
                            "
                            class="ml-auto btn btn-secondary"
                            as="button"
                            :href="route('customers.edit', customer)"
                        >
                            Edit
                        </inertia-link>
                    </div>
                </form>
            </div>
        </div>

        <div
            v-if="customer.cars.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Car Model</th>
                    <th class="px-3 py-3">Car Plate No</th>
                </tr>
                <tr
                    v-for="car in customer.cars"
                    :key="car.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('cars.show', car)"
                        >
                            {{ car.model }}
                        </inertia-link>
                    </td>
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('cars.show', car)"
                        >
                            {{ car.plate_no }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('cars.show', car)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>

        <div
            v-if="queues.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap" id="accordionHistory">
                <tr
                    class="text-left font-bold"
                    id="headingHistory"
                    data-toggle="collapse"
                    data-target="#collapseHistory"
                    aria-expanded="true"
                    aria-controls="collapseHistory"
                >
                    <th class="px-3 py-3 hover:bg-gray-100" colspan="2">
                        History
                    </th>
                </tr>
                <tr
                    v-for="visit in queues"
                    :key="visit.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100 collapse"
                    id="collapseHistory"
                    aria-labelledby="headingHistory"
                    data-parent="#accordionHistory"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('queues.show', visit)"
                        >
                            {{ "Visited " + visit.store.name + " " }}
                            {{ diffForHumans(visit.created_at) }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('queues.show', visit)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
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
import BreezeTrashedMessage from "@/Components/TrashedMessage";
import moment from "moment-timezone";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeTrashedMessage
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        customer: Object,
        queues: Object,
        isVisible: false
    },

    methods: {
        destroy(customer) {
            this.$inertia.delete(route("customers.destroy", customer));
        },
        restore(customer) {
            this.$inertia.put(route("customers.restore", customer));
        },
        diffForHumans(date) {
            var local = moment.tz(date, "Asia/Kuala_Lumpur").format();
            return moment(local).fromNow();
        },
        tagging(color) {
            if (color == "Red") {
                return "badge-danger";
            }
            if (color == "Yellow") {
                return "badge-warning";
            }
            if (color == "Green") {
                return "badge-success";
            }
            if (color == "Black") {
                return "badge-dark";
            }
        }
    }
};
</script>
