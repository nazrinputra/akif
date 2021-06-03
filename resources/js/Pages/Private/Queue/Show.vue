<template>
    <breeze-authenticated-layout>
        <template #title>
            - Show Queue
        </template>
        <template #header>
            <inertia-link
                :href="route('queues.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View queue
            </h6>
            <inertia-link
                v-if="hasAnyPermission(['edit_queues'])"
                :href="route('queues.manage')"
                class="btn btn-secondary mr-3"
            >
                <i class="fas fa-clipboard-list"></i>
            </inertia-link>
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

        <div class="input-group pt-3">
            <input
                type="text"
                id="search"
                placeholder="Search WhatsApp message..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formWhatsapp.query"
            />
        </div>

        <div
            v-if="formWhatsapp.query && whatsapps.length == 0"
            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching messages.
        </div>

        <div
            v-if="!formWhatsapp.query && whatsapps.length == 0 && !whatsapp"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Send a message to the customer?
        </div>

        <transition name="fade">
            <div
                v-if="whatsapps.length > 0"
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">WhatsApp Title</th>
                    </tr>
                    <tr
                        v-for="whatsapp in whatsapps"
                        :key="whatsapp.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ whatsapp.title }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                type="button"
                                @click="selectWhatsapp(whatsapp)"
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
            v-if="whatsapp"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Selected WhatsApp Title</th>
                </tr>
                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('whatsapps.show', whatsapp)"
                        >
                            {{ whatsapp.title }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="clearWhatsapp()"
                            tabindex="-1"
                        >
                            <i class="fas fa-times"></i>
                        </breeze-button>
                    </td>
                </tr>
            </table>

            <div
                class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
            >
                <inertia-link
                    :href="
                        route('whatsapps.send', {
                            whatsapp: whatsapp,
                            customer: queue.customer
                        })
                    "
                    class="btn btn-secondary"
                >
                    Preview
                </inertia-link>
                <a
                    as="button"
                    class="mr-3 btn btn-secondary ml-auto"
                    target="_blank"
                    :href="
                        'https://api.whatsapp.com/send?phone=6' +
                            queue.customer.phone_no +
                            '&text=' +
                            whatsapp.message
                    "
                >
                    Send
                </a>
            </div>
        </div>

        <div
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Customer</th>
                </tr>
                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('customers.show', queue.customer)"
                        >
                            {{
                                queue.customer.name +
                                    " - " +
                                    queue.customer.phone_no
                            }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <a
                            :href="'tel:' + queue.customer.phone_no"
                            class="mr-3 btn btn-secondary"
                        >
                            <i class="fas fa-phone"></i>
                        </a>
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
            v-if="queue.packages.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Package Name</th>
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
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('packages.show', pkg)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>

        <div
            v-if="queue.services.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Service Name</th>
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
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('services.show', service)"
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
                <form>
                    <div class="mt-3 p-3">
                        <label for="store">Store Name</label>
                        <input
                            type="text"
                            id="store"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="queue.store.name"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="created_at">Visit Time</label>
                        <input
                            type="text"
                            id="created_at"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="readableForHumans(queue.created_at)"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="status">Status</label>
                        <input
                            type="text"
                            id="status"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="queue.status"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="remarks">Remarks</label>
                        <input
                            type="text"
                            id="remarks"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="queue.remarks"
                            disabled
                        />
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-end"
                    >
                        <inertia-link
                            v-if="
                                !hasAnyPermission(['reopen_queues']) &&
                                    queue.status != 'Collected' &&
                                    queue.status != 'Cancelled'
                            "
                            class="btn btn-secondary"
                            as="button"
                            :href="route('queues.edit', queue)"
                        >
                            Edit
                        </inertia-link>
                        <inertia-link
                            v-if="hasAnyPermission(['reopen_queues'])"
                            class="btn btn-secondary"
                            as="button"
                            :href="route('queues.edit', queue)"
                        >
                            Edit
                        </inertia-link>
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
import moment from "moment-timezone";
import throttle from "lodash/throttle";

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

    data() {
        return {
            formWhatsapp: {
                query: null
            },
            whatsapps: [],
            whatsapp: null
        };
    },

    watch: {
        formWhatsapp: {
            deep: true,
            handler: throttle(function() {
                if (this.formWhatsapp.query && this.formWhatsapp.query != "") {
                    axios
                        .get(route("whatsapps.search"), {
                            params: {
                                query: this.formWhatsapp.query
                            }
                        })
                        .then(response => {
                            this.whatsapps = response.data;
                        });
                } else {
                    this.whatsapps = [];
                }
            }, 150)
        }
    },

    methods: {
        readableForHumans(date) {
            return moment(date)
                .tz("Asia/Kuala_Lumpur")
                .format("MMMM Do YYYY, HH:mm:ss");
        },
        selectWhatsapp(whatsapp) {
            this.whatsapp = whatsapp;
            this.formWhatsapp.query = null;
            this.whatsapps = [];
        },
        clearWhatsapp() {
            this.whatsapp = null;
        }
    }
};
</script>
