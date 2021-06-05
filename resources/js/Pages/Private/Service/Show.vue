<template>
    <breeze-authenticated-layout>
        <template #title>
            - Show Service
        </template>
        <template #header>
            <inertia-link
                :href="route('services.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View existing service
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('services.index')" :active="false">
                Services
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Service
            </span>
        </template>

        <breeze-trashed-message
            v-if="service.deleted_at"
            class="mb-6"
            @restore="restore(service)"
        >
            This service has been deleted.
        </breeze-trashed-message>

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
                            :value="service.name"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="custom_price">Custom Price</label>
                        <select
                            :value="service.custom_price"
                            disabled
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        >
                            <option value="" disabled
                                >Select Custom Price</option
                            >
                            <option :value="1">Yes</option>
                            <option :value="0">No</option>
                        </select>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="price">Price (RM)</label>
                        <input
                            type="number"
                            id="price"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="(service.price / 100).toFixed(2)"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="commission">Commission (RM)</label>
                        <input
                            type="number"
                            id="commission"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="(service.commission / 100).toFixed(2)"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="description">Description</label>
                        <textarea
                            rows="7"
                            id="description"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="service.description"
                            disabled
                        />
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            v-if="
                                !service.deleted_at &&
                                    hasAnyPermission(['delete services'])
                            "
                            @click="destroy(service)"
                            type="button"
                        >
                            Delete
                        </breeze-button>
                        <inertia-link
                            v-if="
                                !service.deleted_at &&
                                    hasAnyPermission(['edit services'])
                            "
                            class="ml-auto btn btn-secondary"
                            as="button"
                            :href="route('services.edit', service)"
                        >
                            Edit
                        </inertia-link>
                    </div>
                </form>
            </div>
        </div>

        <div
            v-if="service.packages.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Package Name</th>
                </tr>
                <tr
                    v-for="pkg in service.packages"
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
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezeTrashedMessage from "@/Components/TrashedMessage";

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
        service: Object
    },

    methods: {
        destroy(service) {
            this.$inertia.delete(route("services.destroy", service));
        },
        restore(service) {
            this.$inertia.put(route("services.restore", service));
        }
    }
};
</script>
