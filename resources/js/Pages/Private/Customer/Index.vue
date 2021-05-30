<template>
    <breeze-authenticated-layout>
        <template #title>
            - List Customers
        </template>

        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                List of customers
            </h6>
            <inertia-link
                :href="route('customers.create')"
                class="btn btn-secondary align-self-end"
            >
                <i class="fas fa-plus"></i>
            </inertia-link>
        </template>

        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Customers
            </span>
        </template>

        <!-- TODO add role checking for this filter-->
        <div class="input-group pb-4">
            <select
                v-if="auth.user.role_id == 7"
                :value="filters.trashed"
                @input="this.form.trashed = $event.target.value"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
                <option value="without">Without Trashed</option>
                <option value="with">With Trashed</option>
                <option value="only">Only Trashed</option>
            </select>
            <input
                type="text"
                id="search"
                placeholder="Search something..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                :value="filters.search"
                @input="this.form.search = $event.target.value"
            />
        </div>

        <div
            class="px-6 pb-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Customer Name</th>
                </tr>
                <tr
                    v-for="customer in customers.data"
                    :key="customer.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('customers.show', customer)"
                        >
                            {{ customer.name }}
                            <i
                                v-if="customer.deleted_at"
                                class="fas fa-trash opacity-50 ml-3"
                            ></i>
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('customers.show', customer)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
                <tr v-if="customers.data.length === 0">
                    <td class="border-t px-3 py-3">
                        Uh-oh! No customers found.
                    </td>
                </tr>
            </table>
        </div>
        <breeze-pagination
            class="mt-6 d-flex align-items-center"
            :links="customers.links"
        />
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezePagination from "@/Components/Pagination";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezePagination
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        filters: Object,
        customers: Object
    },

    data() {
        return {
            form: {
                search: null
            }
        };
    },

    watch: {
        form: {
            deep: true,
            handler: throttle(function() {
                this.$inertia.get(route("customers.index"), pickBy(this.form), {
                    preserveState: true
                });
            }, 150)
        }
    }
};
</script>
