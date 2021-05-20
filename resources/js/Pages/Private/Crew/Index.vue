<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Crews</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('crews')"
                :active="route().current('crews')"
            >
                Crews
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('crews')"
                :active="route().current('crews')"
            >
                Crews
            </breeze-responsive-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row pt-3 px-3">
                            <div class="col-md-3 col-sm-12">
                                <h2>Crews</h2>
                                <p>
                                    Enable or disable staff access to the
                                    system.
                                </p>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr
                                            v-for="crew in crews"
                                            v-bind:key="crew.id"
                                        >
                                            <td class="col-10">
                                                {{ crew.name }}
                                            </td>
                                            <td class="col-2">
                                                <inertia-link
                                                    :href="route('crew', crew)"
                                                    ><breeze-button
                                                        type="button"
                                                    >
                                                        View
                                                    </breeze-button></inertia-link
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
        crews: Object
    }
};
</script>
