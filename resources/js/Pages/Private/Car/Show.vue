<template>
    <breeze-authenticated-layout>
        <template #title>
            - Show Car
        </template>
        <template #header>
            <inertia-link :href="route('cars.index')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View existing car
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

        <breeze-trashed-message
            v-if="car.deleted_at"
            class="mb-6"
            @restore="restore(car)"
        >
            This car has been deleted.
        </breeze-trashed-message>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form>
                    <div class="mt-3 p-3">
                        <label for="plate_no">Plate No</label>
                        <input
                            type="text"
                            id="plate_no"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="car.plate_no"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="brand">Brand</label>
                        <input
                            type="text"
                            id="brand"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="car.brand"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="model">Model</label>
                        <input
                            type="text"
                            id="model"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="car.model"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="color">Color</label>
                        <input
                            type="text"
                            id="color"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="car.color"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="size">Size</label>
                        <input
                            type="text"
                            id="size"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="car.size"
                            disabled
                        />
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            v-if="!car.deleted_at"
                            @click="destroy(car)"
                            type="button"
                        >
                            Delete
                        </breeze-button>
                        <inertia-link
                            v-if="!car.deleted_at"
                            class="ml-auto btn btn-secondary"
                            as="button"
                            :href="route('cars.edit', car)"
                        >
                            Edit
                        </inertia-link>
                    </div>
                </form>
            </div>
        </div>

        <div
            v-if="car.owners.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Owner Name</th>
                </tr>
                <tr
                    v-for="owner in car.owners"
                    :key="owner.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('customers.show', owner)"
                        >
                            {{ owner.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('customers.show', owner)"
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
        car: Object,
        queues: Object
    },

    methods: {
        destroy(car) {
            this.$inertia.delete(route("cars.destroy", car));
        },
        restore(car) {
            this.$inertia.put(route("cars.restore", car));
        },
        diffForHumans(date) {
            var local = moment.tz(date, "Asia/Kuala_Lumpur").format();
            return moment(local).fromNow();
        }
    }
};
</script>
