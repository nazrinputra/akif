<template>
    <breeze-authenticated-layout>
        <template #title>
            - Show Personality
        </template>
        <template #header>
            <inertia-link
                :href="route('personalities.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View existing personality
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link
                :href="route('personalities.index')"
                :active="false"
            >
                Personalities
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Personality
            </span>
        </template>
        <breeze-trashed-message
            v-if="personality.deleted_at"
            class="mb-6"
            @restore="restore(personality)"
        >
            This personality has been deleted.
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
                            :value="personality.name"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="color">Color</label>
                        <input
                            type="text"
                            id="color"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="personality.color"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="description">Description</label>
                        <textarea
                            rows="7"
                            id="description"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="personality.description"
                            disabled
                        />
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            v-if="!personality.deleted_at"
                            @click="destroy(personality)"
                            type="button"
                        >
                            Delete
                        </breeze-button>
                        <inertia-link
                            v-if="!personality.deleted_at"
                            class="ml-auto btn btn-secondary"
                            as="button"
                            :href="route('personalities.edit', personality)"
                        >
                            Edit
                        </inertia-link>
                    </div>
                </form>
            </div>
        </div>

        <div
            v-if="personality.customers.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Customer Name</th>
                </tr>
                <tr
                    v-for="customer in personality.customers"
                    :key="customer.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('customers.show', customer)"
                        >
                            {{ customer.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('customers.show', customer)"
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
        personality: Object
    },

    methods: {
        destroy(personality) {
            this.$inertia.delete(route("personalities.destroy", personality));
        },
        restore(personality) {
            this.$inertia.put(route("personalities.restore", personality));
        }
    }
};
</script>
