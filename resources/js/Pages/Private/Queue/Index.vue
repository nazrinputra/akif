<template>
    <breeze-authenticated-layout>
        <template #title>
            - List Queues
        </template>

        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                List of queues
            </h6>
        </template>

        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Queues
            </span>
        </template>

        <div class="input-group pb-4">
            <select
                v-if="auth.user.role_id == 7"
                :value="filters.status"
                @input="this.form.status = $event.target.value"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
                <option value="All">All</option>
                <option value="Waiting">Waiting</option>
                <option value="Grooming">Grooming</option>
                <option value="Completed">Completed</option>
                <option value="Collected">Collected</option>
                <option value="Cancelled">Cancelled</option>
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
                    <th class="px-3 py-3">Customer Car</th>
                </tr>
                <tr
                    v-for="queue in queues.data"
                    :key="queue.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('queues.show', queue)"
                        >
                            {{ queue.car.model + " - " + queue.car.plate_no }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('queues.show', queue)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
                <tr v-if="queues.data.length === 0">
                    <td class="border-t px-3 py-3" colspan="2">
                        Uh-oh! No queues found.
                    </td>
                </tr>
            </table>
        </div>
        <breeze-pagination
            class="mt-6 d-flex align-items-center"
            :links="queues.links"
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
        queues: Object
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
                this.$inertia.get(route("queues.index"), pickBy(this.form), {
                    preserveState: true
                });
            }, 150)
        }
    }
};
</script>
