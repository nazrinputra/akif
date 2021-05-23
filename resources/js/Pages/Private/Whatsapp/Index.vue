<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Whatsapps
        </teleport>

        <template #header>
            <h6 class="pt-2.5 mx-auto">
                List of WhatsApp messages for the store.
            </h6>
            <inertia-link
                :href="route('whatsapps.create')"
                class="btn btn-secondary align-self-end"
            >
                <i class="fas fa-plus"></i>
            </inertia-link>
        </template>

        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                WhatsApps
            </span>
        </template>

        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white rounded-md shadow overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">WhatsApp Title</th>
                    </tr>
                    <tr
                        v-for="whatsapp in whatsapps.data"
                        :key="whatsapp.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td class="border-t">
                            <inertia-link
                                style="color: inherit; text-decoration: inherit;"
                                class="px-3 py-3 flex items-center focus:text-indigo-500"
                                :href="route('whatsapps.index', whatsapp.id)"
                            >
                                {{ whatsapp.title }}
                                <!-- <icon v-if="whatsapp.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" /> -->
                            </inertia-link>
                        </td>
                        <td class="border-t w-px">
                            <inertia-link
                                class="px-3 flex items-center"
                                :href="route('whatsapps.index', whatsapp.id)"
                                tabindex="-1"
                            >
                                <!-- <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" /> -->>
                            </inertia-link>
                        </td>
                    </tr>
                    <tr v-if="whatsapps.data.length === 0">
                        <td class="border-t px-3 py-3">
                            Uh-oh! No whatsapp messages found.
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <breeze-pagination
            class="mt-6 d-flex align-items-center"
            :links="whatsapps.links"
        />
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";
import BreezeButton from "@/Components/Button";
import BreezePagination from "@/Components/Pagination";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeButton,
        BreezePagination
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        whatsapps: Object
    },

    methods: {
        trash(whatsapp) {
            this.$inertia.delete(route("whatsapps.destroy", whatsapp));
        }
    }
};
</script>
