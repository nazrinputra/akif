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
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>Crews</h2>
                                <p>
                                    Enable or disable staff access to the
                                    system.
                                </p>
                                <span
                                    v-for="crew in crews"
                                    v-bind:key="crew.id"
                                >
                                    <inertia-link
                                        :href="route('crew', crew)"
                                        class="px-2"
                                    >
                                        {{ crew.name }}
                                    </inertia-link>
                                </span>
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

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink
    },

    props: {
        auth: Object,
        errors: Object,
        crews: Object
    }
};
</script>
