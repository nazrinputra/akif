<template>
    <breeze-authenticated-layout>
        <template #title>
            - Dashboard
        </template>
        <template #header>
            <h6 class="pt-2.5 mx-auto">
                Dashboard view for crew.
            </h6>
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
        errors: Object,
        flash: Object
    }
};
</script>
