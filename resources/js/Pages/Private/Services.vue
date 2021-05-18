<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Services</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('services')"
                :active="route().current('services')"
            >
                Services
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('services')"
                :active="route().current('services')"
            >
                Services
            </breeze-responsive-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>Services</h2>
                                <p>
                                    View services in the system and make
                                    modifications.
                                </p>
                                <span
                                    v-for="service in services"
                                    v-bind:key="service.id"
                                >
                                    <inertia-link
                                        :href="route('service', service)"
                                        class="px-2"
                                    >
                                        {{ service.name }}
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
        services: Object
    }
};
</script>
