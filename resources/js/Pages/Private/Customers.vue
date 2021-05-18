<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Customers</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('customers')"
                :active="route().current('customers')"
            >
                Customers
            </breeze-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>Customers</h2>
                                <p>
                                    Add new customer, view or update existing
                                    customers.
                                </p>
                                <span
                                    v-for="customer in customers"
                                    v-bind:key="customer.id"
                                >
                                    <inertia-link
                                        :href="route('customer', customer)"
                                        class="px-2"
                                    >
                                        {{ customer.name }}
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

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink
    },

    props: {
        auth: Object,
        errors: Object,
        customers: Object
    }
};
</script>
