<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Crews
        </teleport>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                List of crews
            </h6>
            <inertia-link
                :href="route('crews.create')"
                class="btn btn-secondary align-self-end"
            >
                <i class="fas fa-plus"></i>
            </inertia-link>
        </template>
        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Crews
            </span>
        </template>

        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row pt-3 px-3">
                        <div class="col">
                            <div id="empty" v-if="crewsCount <= 0">
                                <h2 class="text-secondary text-center py-4">
                                    Oops, we're sorry. <br />
                                    No item in this list.
                                </h2>
                            </div>
                            <table
                                v-if="crewsCount > 0"
                                class="table table-hover"
                            >
                                <tbody>
                                    <tr
                                        v-for="crew in crews"
                                        v-bind:key="crew.id"
                                    >
                                        <td class="col-9">
                                            {{ crew.name }}
                                        </td>
                                        <td class="col-3">
                                            <div
                                                class="flex items-center justify-center"
                                            >
                                                <inertia-link
                                                    :href="
                                                        route(
                                                            'crews.show',
                                                            crew
                                                        )
                                                    "
                                                    ><breeze-button
                                                        type="button"
                                                    >
                                                        <i
                                                            class="fas fa-angle-double-right"
                                                        ></i></breeze-button
                                                ></inertia-link>
                                                <breeze-button
                                                    type="button"
                                                    class="ml-3"
                                                    @click="remove"
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
                                <inertia-link :href="route('dashboard')"
                                    ><breeze-button type="button">
                                        Back
                                    </breeze-button></inertia-link
                                >
                                <breeze-button
                                    type="button"
                                    class="ml-20"
                                    @click="add"
                                >
                                    Add
                                </breeze-button>
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
        crews: Object,
        crewsCount: Number
    },

    methods: {
        add() {
            alert("Not configured yet");
        },
        remove() {
            alert("Not configured yet");
        }
    }
};
</script>
