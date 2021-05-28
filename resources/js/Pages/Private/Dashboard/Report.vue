<template>
    <breeze-authenticated-layout>
        <template #title>
            - Report
        </template>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Generate and view reports.
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link
                :href="route('reports')"
                :active="route().current('reports')"
            >
                Reports
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('reports')"
                :active="route().current('reports')"
            >
                Reports
            </breeze-responsive-nav-link>
        </template>

        <div
            class="px-6 pb-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="p-3">
                <img
                    class="img-fluid w-40 h-40 py-20"
                    src="\fonts\vendor\@fortawesome\fontawesome-free\tools.svg"
                />
                <h4 class="text-center">coming soon</h4>
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
        errors: Object
    }
};
</script>
