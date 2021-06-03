<template>
    <breeze-authenticated-layout>
        <template #title>
            - Manage Queues
        </template>

        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Manage status of queues
            </h6>
            <inertia-link
                :href="route('counter')"
                v-if="hasAnyPermission(['create_queues'])"
                class="btn btn-secondary"
            >
                <i class="fas fa-cash-register"></i>
            </inertia-link>
        </template>

        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Queues
            </span>
        </template>

        <div
            v-if="completed.length > 0"
            class="mb-3 px-6 pb-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            style="background-color:#c3e6cb !important;"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Completed Queue</th>
                </tr>
                <tr
                    v-for="queue in completed"
                    :key="queue.id"
                    class="hover:bg-green-300 focus-within:bg-green-300"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('queues.show', queue)"
                        >
                            <inertia-link
                                v-if="hasAnyPermission(['both_queues'])"
                                class="mr-3 badge badge-light p-3"
                                :href="route('stores.show', queue.store)"
                                >{{ queue.store.name }}</inertia-link
                            >

                            {{ queue.car.model + " - " + queue.car.plate_no }}

                            <span
                                class="mx-3 badge badge-pill"
                                :class="tagging(personality.color)"
                                v-for="personality in queue.customer
                                    .personalities"
                                :key="personality.id"
                            >
                                {{ personality.name }}
                            </span>
                        </inertia-link>
                    </td>
                    <td class="border-t md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex justify-content-end focus:text-indigo-500"
                            :href="route('queues.show', queue)"
                        >
                            <button
                                class="mr-3 btn btn-light"
                                @click.prevent="moveBottom(queue.move, queue)"
                            >
                                <i class="fas fa-level-down-alt mx-1.5"></i>
                            </button>
                            <select
                                @click.prevent
                                @change.prevent="
                                    updateStatus($event.target.value, queue)
                                "
                                :value="queue.status"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                ><option value="" disabled
                                    >Select Status</option
                                >
                                <option value="Waiting">Waiting</option>
                                <option value="Grooming">Grooming</option>
                                <option value="Completed">Completed</option>
                                <option value="Collected">Collected</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>

        <div
            v-if="waiting.length > 0"
            class="mb-3 px-6 pb-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            style="background-color:#f5c6cb !important;"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Waiting Queue</th>
                </tr>
                <tr
                    v-for="queue in waiting"
                    :key="queue.id"
                    class="hover:bg-red-300 focus-within:bg-red-300"
                >
                    <td class="border-t">
                        <span
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            <inertia-link
                                v-if="hasAnyPermission(['both_queues'])"
                                class="mr-3 badge badge-light p-3"
                                :href="route('stores.show', queue.store)"
                                >{{ queue.store.name }}</inertia-link
                            >

                            {{ queue.car.model + " - " + queue.car.plate_no }}

                            <span
                                class="mx-3 badge badge-pill"
                                :class="tagging(personality.color)"
                                v-for="personality in queue.customer
                                    .personalities"
                                :key="personality.id"
                            >
                                {{ personality.name }}
                            </span>
                        </span>
                    </td>
                    <td class="border-t md:table-cell hidden text-right">
                        <select
                            @change="updateStatus($event.target.value, queue)"
                            :value="queue.status"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            ><option value="" disabled>Select Status</option>
                            <option value="Waiting">Waiting</option>
                            <option value="Grooming">Grooming</option>
                            <option value="Completed">Completed</option>
                            <option value="Collected">Collected</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div
            v-if="grooming.length > 0"
            class="mb-3 px-6 pb-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            style="background-color:#ffeeba !important;"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Grooming Queue</th>
                </tr>
                <tr
                    v-for="queue in grooming"
                    :key="queue.id"
                    class="hover:bg-yellow-200 focus-within:bg-yellow-200"
                >
                    <td class="border-t">
                        <span
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            <inertia-link
                                v-if="hasAnyPermission(['both_queues'])"
                                class="mr-3 badge badge-light p-3"
                                :href="route('stores.show', queue.store)"
                                >{{ queue.store.name }}</inertia-link
                            >

                            {{ queue.car.model + " - " + queue.car.plate_no }}

                            <span
                                class="mx-3 badge badge-pill"
                                :class="tagging(personality.color)"
                                v-for="personality in queue.customer
                                    .personalities"
                                :key="personality.id"
                            >
                                {{ personality.name }}
                            </span>
                        </span>
                    </td>
                    <td class="border-t md:table-cell hidden text-right">
                        <select
                            @change="updateStatus($event.target.value, queue)"
                            :value="queue.status"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            ><option value="" disabled>Select Status</option>
                            <option value="Waiting">Waiting</option>
                            <option value="Grooming">Grooming</option>
                            <option value="Completed">Completed</option>
                            <option value="Collected">Collected</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div
            v-if="collected.length > 0"
            class="mb-3 px-6 pb-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Collected Queue</th>
                </tr>
                <tr
                    v-for="queue in collected"
                    :key="queue.id"
                    class="hover:bg-gray-300 focus-within:bg-gray-300"
                >
                    <td class="border-t">
                        <span
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            <inertia-link
                                v-if="hasAnyPermission(['both_queues'])"
                                class="mr-3 badge badge-dark p-3"
                                :href="route('stores.show', queue.store)"
                                >{{ queue.store.name }}</inertia-link
                            >

                            {{ queue.car.model + " - " + queue.car.plate_no }}

                            <span
                                class="mx-3 badge badge-pill"
                                :class="tagging(personality.color)"
                                v-for="personality in queue.customer
                                    .personalities"
                                :key="personality.id"
                            >
                                {{ personality.name }}
                            </span>
                        </span>
                    </td>
                    <td class="border-t md:table-cell hidden text-right">
                        <select
                            @change="updateStatus($event.target.value, queue)"
                            :value="queue.status"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            ><option value="" disabled>Select Status</option>
                            <option value="Waiting">Waiting</option>
                            <option value="Grooming">Grooming</option>
                            <option value="Completed">Completed</option>
                            <option value="Collected">Collected</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <div
            v-if="cancelled.length > 0"
            class="mb-3 px-6 pb-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Cancelled Queue</th>
                </tr>
                <tr
                    v-for="queue in cancelled"
                    :key="queue.id"
                    class="hover:bg-gray-300 focus-within:bg-gray-300"
                >
                    <td class="border-t">
                        <span
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            <inertia-link
                                v-if="hasAnyPermission(['both_queues'])"
                                class="mr-3 badge badge-dark p-3"
                                :href="route('stores.show', queue.store)"
                                >{{ queue.store.name }}</inertia-link
                            >

                            {{ queue.car.model + " - " + queue.car.plate_no }}

                            <span
                                class="mx-3 badge badge-pill"
                                :class="tagging(personality.color)"
                                v-for="personality in queue.customer
                                    .personalities"
                                :key="personality.id"
                            >
                                {{ personality.name }}
                            </span>
                        </span>
                    </td>
                    <td class="border-t md:table-cell hidden text-right">
                        <select
                            @change="updateStatus($event.target.value, queue)"
                            :value="queue.status"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            ><option value="" disabled>Select Status</option>
                            <option value="Waiting">Waiting</option>
                            <option value="Grooming">Grooming</option>
                            <option value="Completed">Completed</option>
                            <option value="Collected">Collected</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezePagination from "@/Components/Pagination";

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
        flash: Object
    },

    data() {
        return {
            queues: [],
            waiting: [],
            grooming: [],
            completed: [],
            collected: [],
            cancelled: []
        };
    },

    mounted() {
        this.getQueue();
    },

    methods: {
        updateStatus(status, queue) {
            this.$inertia.post(
                route("manage"),
                {
                    queue_id: queue.id,
                    status: status
                },
                {
                    onSuccess: () => {
                        this.getQueue();
                        this.flash.success =
                            queue.car.model +
                            " - " +
                            queue.car.plate_no +
                            " status changed to " +
                            status +
                            " successfully.";
                    }
                }
            );
        },
        moveBottom(move, queue) {
            move = move + 1;
            this.$inertia.post(
                route("bottom"),
                {
                    queue_id: queue.id,
                    move: move
                },
                {
                    onSuccess: () => {
                        this.getQueue();
                        this.flash.warning =
                            queue.car.model +
                            " - " +
                            queue.car.plate_no +
                            " moved to the bottom successfully.";
                    }
                }
            );
        },
        sortQueue() {
            this.waiting = this.queues.filter(queues =>
                queues.status.includes("Waiting")
            );
            this.waiting.sort((a, b) => (a.store_id < b.store_id ? -1 : 1));

            this.grooming = this.queues.filter(queues =>
                queues.status.includes("Grooming")
            );
            this.grooming.sort((a, b) => (a.store_id < b.store_id ? -1 : 1));

            this.completed = this.queues.filter(queues =>
                queues.status.includes("Completed")
            );
            this.completed.sort((a, b) => (a.store_id < b.store_id ? -1 : 1));

            this.collected = this.queues.filter(queues =>
                queues.status.includes("Collected")
            );
            this.collected.sort((a, b) => (a.store_id < b.store_id ? -1 : 1));

            this.cancelled = this.queues.filter(queues =>
                queues.status.includes("Cancelled")
            );
            this.cancelled.sort((a, b) => (a.store_id < b.store_id ? -1 : 1));
        },
        getQueue() {
            let self = this;
            axios
                .post(route("queues.search"), {
                    user_id: this.auth.user.id
                })
                .then(response => {
                    self.queues = response.data;
                    this.sortQueue();
                });
        },
        tagging(color) {
            if (color == "Red") {
                return "badge-danger";
            }
            if (color == "Yellow") {
                return "badge-warning";
            }
            if (color == "Green") {
                return "badge-success";
            }
            if (color == "Black") {
                return "badge-dark";
            }
        }
    }
};
</script>
