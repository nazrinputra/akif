<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Customers</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('customers.index')"
                :active="route().current('customers.index')"
            >
                Customers
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('customers.index')"
                :active="route().current('customers.index')"
            >
                Customers
            </breeze-responsive-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row pt-3 px-3">
                            <div class="col-md-3 col-sm-12">
                                <h2>Customers</h2>
                                <p>
                                    Add new customer, view or update existing
                                    customers.
                                </p>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div id="empty" v-if="customersCount <= 0">
                                    <h2 class="text-secondary text-center py-4">
                                        Oops, we're sorry. <br />
                                        No item in this list.
                                    </h2>
                                </div>
                                <table
                                    v-if="customersCount > 0"
                                    class="table table-hover"
                                >
                                    <tbody>
                                        <tr
                                            v-for="customer in customers"
                                            v-bind:key="customer.id"
                                        >
                                            <td class="col-9">
                                                {{ customer.name }}
                                            </td>
                                            <td class="col-3">
                                                <div
                                                    class="flex items-center justify-center"
                                                >
                                                    <inertia-link
                                                        :href="
                                                            route(
                                                                'customers.show',
                                                                customer
                                                            )
                                                        "
                                                        ><breeze-button
                                                            type="button"
                                                        >
                                                            <i
                                                                class="fas fa-angle-double-right"
                                                            ></i></breeze-button
                                                    ></inertia-link>
                                                    <breeze-button
                                                        type="button"
                                                        class="ml-3"
                                                        @click="remove"
                                                    >
                                                        <i
                                                            class="far fa-trash-alt"
                                                        ></i>
                                                    </breeze-button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div
                                    class="flex items-center justify-center mt-4"
                                >
                                    <inertia-link :href="route('dashboard')"
                                        ><breeze-button type="button">
                                            Back
                                        </breeze-button></inertia-link
                                    >
                                    <breeze-button
                                        type="button"
                                        class="ml-20"
                                        @click="add"
                                    >
                                        Add
                                    </breeze-button>
                                </div>
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
        customers: Object,
        customersCount: Number
    },

    methods: {
        add() {
            alert("Not configured yet");
        },
        remove() {
            alert("Not configured yet");
        }
    }
};
</script>
