<template>
    <breeze-authenticated-layout>
        <template #title> - Show Package </template>
        <template #header>
            <inertia-link
                :href="route('packages.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">View existing package</h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('packages.index')" :active="false">
                Packages
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Package
            </span>
        </template>
        <breeze-trashed-message
            v-if="pkg.deleted_at"
            class="mb-6"
            @restore="restore(pkg)"
        >
            This package has been deleted.
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
                            :value="pkg.name"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="price">Display Price (RM)</label>
                        <input
                            type="number"
                            id="price"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="(pkg.price / 100).toFixed(2)"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="frequency">Frequency</label>
                        <input
                            type="text"
                            id="frequency"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="pkg.frequency"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="duration">Duration</label>
                        <input
                            type="text"
                            id="duration"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="pkg.duration"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="description">Description</label>
                        <textarea
                            rows="7"
                            id="description"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="pkg.description"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="promotion">Promotion</label>
                        <select
                            :value="pkg.promotion"
                            disabled
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        >
                            <option value="" disabled>Select Promotion</option>
                            <option :value="1">Yes</option>
                            <option :value="0">No</option>
                        </select>
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            v-if="
                                !pkg.deleted_at &&
                                hasAnyPermission(['delete packages'])
                            "
                            @click="destroy(pkg)"
                            type="button"
                        >
                            Delete
                        </breeze-button>
                        <inertia-link
                            v-if="
                                !pkg.deleted_at &&
                                hasAnyPermission(['edit packages'])
                            "
                            class="ml-auto btn btn-secondary"
                            as="button"
                            :href="route('packages.edit', pkg)"
                        >
                            Edit
                        </inertia-link>
                    </div>
                </form>
            </div>
        </div>

        <div
            v-if="pkg.services.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Service Name</th>
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
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
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
        BreezeTrashedMessage,
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        pkg: Object,
    },

    methods: {
        destroy(pkg) {
            this.$inertia.delete(route("packages.destroy", pkg));
        },
        restore(pkg) {
            this.$inertia.put(route("packages.restore", pkg));
        },
    },
};
</script>
