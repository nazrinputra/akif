<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Whatsapps
        </teleport>

        <template #header>
            <div class="row px-5">
                <inertia-link
                    :href="route('dashboard')"
                    class="btn btn-secondary"
                >
                    <i class="fas fa-chevron-left"></i>
                </inertia-link>
                <h6 class="pt-2.5 ml-3">
                    List of WhatsApp messages for the store.
                </h6>
                <inertia-link
                    :href="route('whatsapps.create')"
                    class="btn btn-secondary ml-auto"
                >
                    <i class="fas fa-plus"></i>
                </inertia-link>
            </div>
        </template>

        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                WhatsApps
            </span>
        </template>

        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row pt-3 px-3">
                        <div class="col">
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
                                                    @click="trash(whatsapp)"
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
                            <div class="flex items-center justify-center mt-4">
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
        trash(whatsapp) {
            this.$inertia.delete(route("whatsapps.destroy", whatsapp));
        }
    }
};
</script>
