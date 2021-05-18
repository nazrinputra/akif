<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Package</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('packages')"
                :active="route().current('packages')"
            >
                Packages
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('package', pkg)"
                :active="route().current('package', pkg)"
            >
                Package
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('packages')"
                :active="route().current('packages')"
            >
                Packages
            </breeze-responsive-nav-link>
            <breeze-responsive-nav-link
                :href="route('package', pkg)"
                :active="route().current('package', pkg)"
            >
                Package
            </breeze-responsive-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>Package</h2>
                                <p>
                                    View, add or edit package registered in the
                                    system.
                                </p>
                                <p>{{ pkg.name }}</p>
                                <p
                                    v-for="service in pkg.services"
                                    v-bind:key="service.id"
                                >
                                    {{ service.name }}
                                </p>
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
        pkg: Object
    }
};
</script>
