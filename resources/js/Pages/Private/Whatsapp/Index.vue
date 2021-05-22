<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Whatsapps
        </teleport>
        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                WhatsApps
            </span>
        </template>

        <template #responsive-nav>
            <span
                class="block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                WhatsApps
            </span>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row pt-3 px-3">
                            <div class="col-md-3 col-sm-12">
                                <h2>WhatsApps</h2>
                                <p>List of WhatsApp messages for the store.</p>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <div id="empty" v-if="whatsappsCount <= 0">
                                    <h2 class="text-secondary text-center py-4">
                                        Oops, we're sorry. <br />
                                        No item in this list.
                                    </h2>
                                </div>
                                <table
                                    v-if="whatsappsCount > 0"
                                    class="table table-hover"
                                >
                                    <tbody>
                                        <tr
                                            v-for="whatsapp in whatsapps"
                                            v-bind:key="whatsapp.id"
                                        >
                                            <td class="col-9">
                                                {{ whatsapp.title }}
                                            </td>
                                            <td class="col-3">
                                                <div
                                                    class="flex items-center justify-center"
                                                >
                                                    <inertia-link
                                                        :href="
                                                            route(
                                                                'whatsapps.show',
                                                                whatsapp
                                                            )
                                                        "
                                                        ><breeze-button
                                                            type="button"
                                                        >
                                                            View</breeze-button
                                                        ></inertia-link
                                                    >
                                                    <breeze-button
                                                        type="button"
                                                        class="ml-3"
                                                        @click="
                                                            this.$inertia.delete(
                                                                route(
                                                                    'whatsapps.destroy',
                                                                    whatsapp
                                                                )
                                                            )
                                                        "
                                                    >
                                                        <i
                                                            class="far fa-trash-alt"
                                                        ></i>
                                                    </breeze-button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div
                                    class="flex items-center justify-center mt-4"
                                >
                                    <inertia-link
                                        :href="route('dashboard')"
                                        class="btn btn-secondary"
                                    >
                                        Back
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('whatsapps.create')"
                                        class="btn btn-secondary ml-20"
                                    >
                                        Add
                                    </inertia-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";
import BreezeButton from "@/Components/Button";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeButton
    },

    props: {
        auth: Object,
        errors: Object,
        whatsapps: Object,
        whatsappsCount: Number
    },

    methods: {
        remove(whatsapp) {
            // alert("Deleting " + whatsapp.title);
            if (!confirm("Are you sure want to remove this item?")) return;
            // whatsapp._method = "DELETE";
            this.$inertia.delete(route("whatsapps.destroy", whatsapp.slug));
        }
    }
};
</script>
