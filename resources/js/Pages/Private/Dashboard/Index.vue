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
            <div class="row p-3">
                <div class="col-md-6 col-sm-12 pb-5">
                    <h2>Counter</h2>
                    <p>Register car and customer into queue.</p>
                    <p>
                        <inertia-link
                            class="btn btn-secondary"
                            :href="route('counter')"
                            >Counter</inertia-link
                        >
                    </p>
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
        flash: Object
    }
};
</script>
