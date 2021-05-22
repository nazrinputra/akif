<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Dashboard
        </teleport>
        <template #header>
            <div class="row px-5">
                <h6 class="pt-2.5 ml-3">
                    Dashboard view for crew.
                </h6>
            </div>
        </template>
        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row p-3">
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
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
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                            <h2>WhatsApps</h2>
                            <p>List of WhatsApp messages for the store.</p>
                            <p>
                                <inertia-link
                                    class="btn btn-secondary"
                                    :href="route('whatsapps.index')"
                                    >WhatsApps</inertia-link
                                >
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                            <h2>Cars</h2>
                            <p>
                                View, add or edit cars registered in the system.
                            </p>
                            <p>
                                <inertia-link
                                    class="btn btn-secondary"
                                    :href="route('cars.index')"
                                    >Cars</inertia-link
                                >
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                            <h2>Customers</h2>
                            <p>
                                Add new customer, view or update existing
                                customers.
                            </p>
                            <p>
                                <inertia-link
                                    class="btn btn-secondary"
                                    :href="route('customers.index')"
                                    >Customers</inertia-link
                                >
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                            <h2>Packages</h2>
                            <p>
                                Define packages or create new promotional
                                package.
                            </p>
                            <p>
                                <inertia-link
                                    class="btn btn-secondary"
                                    :href="route('packages.index')"
                                    >Packages</inertia-link
                                >
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                            <h2>Services</h2>
                            <p>
                                View services in the system and make
                                modifications.
                            </p>
                            <p>
                                <inertia-link
                                    class="btn btn-secondary"
                                    :href="route('services.index')"
                                    >Services</inertia-link
                                >
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                            <h2>Personalities</h2>
                            <p>
                                Manage customer personalities to help counter
                                crew.
                            </p>
                            <p>
                                <inertia-link
                                    class="btn btn-secondary"
                                    :href="route('personalities.index')"
                                    >Personalities</inertia-link
                                >
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                            <h2>Crews</h2>
                            <p>
                                Enable or disable staff access to the system.
                            </p>
                            <p>
                                <inertia-link
                                    class="btn btn-secondary"
                                    :href="route('crews.index')"
                                    >Crews</inertia-link
                                >
                            </p>
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
        errors: Object
    }
};
</script>
