<template>
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
                <inertia-link
                    style="color: inherit; text-decoration: inherit"
                    class="px-3 py-3 flex items-center focus:text-indigo-500"
                    :href="route('queues.show', queue)"
                >
                    <inertia-link
                        v-if="hasAnyPermission(['both queues'])"
                        class="mr-3 badge badge-light p-3"
                        :href="route('stores.show', queue.store)"
                        >{{ queue.store.name }}</inertia-link
                    >

                    {{ queue.car.model + " - " + queue.car.plate_no }}

                    <span
                        class="mx-3 badge badge-pill"
                        :class="tagging(personality.color)"
                        v-for="personality in queue.customer.personalities"
                        :key="personality.id"
                    >
                        {{ personality.name }}
                    </span>
                </inertia-link>
            </td>
            <td class="border-t md:table-cell hidden">
                <inertia-link
                    style="color: inherit; text-decoration: inherit"
                    class="px-3 py-3 flex justify-content-end focus:text-indigo-500"
                    :href="route('queues.show', queue)"
                >
                    <select
                        @click.prevent
                        @change.prevent="
                            updateStatus($event.target.value, queue)
                        "
                        :value="queue.status"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                        <option value="" disabled>Select Status</option>
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
</template>

<script>
export default {
    props: ["waiting"],

    methods: {
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
        },
        updateStatus(status, queue) {
            queue.status = status;
            this.$emit("updateStatus", queue);
        },
    },
};
</script>
