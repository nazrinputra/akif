<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Customer</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('customers')"
                :active="route().current('customers')"
            >
                Customers
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('customer', customer)"
                :active="route().current('customer', customer)"
            >
                Customer
            </breeze-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>Customer</h2>
                                <p>
                                    View, add or edit customer registered in the
                                    system.
                                </p>
                                <p>{{ customer.name }}</p>
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
        customer: Object
    }
};
</script>
