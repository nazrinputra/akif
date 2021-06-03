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
            class="p-5 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg md-stepper-horizontal"
        >
            <ul class="nav nav-tabs mx-3">
                <li class="nav-item">
                    <span
                        class="nav-link cursor-pointer"
                        :style="
                            activeWaiting
                                ? 'background-color:#f5c6cb !important;border-bottom-color: #f5c6cb !important;color: black !important;'
                                : ''
                        "
                        @click="showWaiting()"
                        :class="activeWaiting ? 'active' : ''"
                        >Waiting</span
                    >
                </li>
                <li class="nav-item">
                    <span
                        class="nav-link cursor-pointer"
                        :style="
                            activeGrooming
                                ? 'background-color:#ffeeba !important;border-bottom-color: #ffeeba !important;color: black !important;'
                                : ''
                        "
                        @click="showGrooming()"
                        :class="activeGrooming ? 'active' : ''"
                        >Grooming</span
                    >
                </li>
                <li class="nav-item">
                    <span
                        class="nav-link cursor-pointer"
                        :style="
                            activeCompleted
                                ? 'background-color:#c3e6cb !important;border-bottom-color: #c3e6cb !important;color: black !important;'
                                : ''
                        "
                        @click="showCompleted()"
                        :class="activeCompleted ? 'active' : ''"
                        >Completed</span
                    >
                </li>
                <li class="nav-item">
                    <span
                        class="nav-link cursor-pointer"
                        :style="
                            activeCollected ? 'color: black !important;' : ''
                        "
                        @click="showCollected()"
                        :class="activeCollected ? 'active ' : ''"
                        >Collected</span
                    >
                </li>
                <li class="nav-item">
                    <span
                        class="nav-link cursor-pointer"
                        :style="
                            activeCancelled ? 'color: black !important;' : ''
                        "
                        @click="showCancelled()"
                        :class="activeCancelled ? 'active' : ''"
                        >Cancelled</span
                    >
                </li>
            </ul>

            <breeze-queue-waiting
                v-show="activeWaiting"
                v-if="waiting.length > 0"
                :waiting="waiting"
                @moveBottom="moveBottom($event)"
                @updateStatus="updateStatus($event)"
                class="mb-3 p-6 max-w-7xl shadow sm:rounded-lg"
                style="background-color:#f5c6cb !important;"
            />

            <breeze-queue-grooming
                v-show="activeGrooming"
                v-if="grooming.length > 0"
                :grooming="grooming"
                @moveBottom="moveBottom($event)"
                @updateStatus="updateStatus($event)"
                class="mb-3 p-6 max-w-7xl shadow sm:rounded-lg"
                style="background-color:#ffeeba !important;"
            />

            <breeze-queue-completed
                v-show="activeCompleted"
                v-if="completed.length > 0"
                :completed="completed"
                @updateStatus="updateStatus($event)"
                class="mb-3 p-6 max-w-7xl shadow sm:rounded-lg"
                style="background-color:#c3e6cb !important;"
            />

            <breeze-queue-collected
                v-show="activeCollected"
                v-if="collected.length > 0"
                :collected="collected"
                @updateStatus="updateStatus($event)"
                class="mb-3 p-6 max-w-7xl shadow sm:rounded-lg"
            />

            <breeze-queue-cancelled
                v-show="activeCancelled"
                v-if="cancelled.length > 0"
                :cancelled="cancelled"
                @updateStatus="updateStatus($event)"
                class="mb-3 p-6 max-w-7xl shadow sm:rounded-lg"
            />
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezeQueueWaiting from "@/Components/QueueWaiting";
import BreezeQueueGrooming from "@/Components/QueueGrooming";
import BreezeQueueCompleted from "@/Components/QueueCompleted";
import BreezeQueueCollected from "@/Components/QueueCollected";
import BreezeQueueCancelled from "@/Components/QueueCancelled";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeQueueWaiting,
        BreezeQueueGrooming,
        BreezeQueueCompleted,
        BreezeQueueCollected,
        BreezeQueueCancelled
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
            cancelled: [],
            activeWaiting: true,
            activeGrooming: false,
            activeCompleted: false,
            activeCollected: false,
            activeCancelled: false
        };
    },

    mounted() {
        this.getQueue();
    },

    methods: {
        updateStatus(queue) {
            this.$inertia.post(
                route("manage"),
                {
                    queue_id: queue.id,
                    status: queue.status
                },
                {
                    onSuccess: () => {
                        this.getQueue();
                        this.flash.success =
                            queue.car.model +
                            " - " +
                            queue.car.plate_no +
                            " status changed to " +
                            queue.status +
                            " successfully.";
                    }
                }
            );
        },
        moveBottom(queue) {
            queue.move += 1;
            this.$inertia.post(
                route("bottom"),
                {
                    queue_id: queue.id,
                    move: queue.move
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
        },
        showWaiting() {
            this.activeWaiting = true;
            this.activeGrooming = false;
            this.activeCompleted = false;
            this.activeCollected = false;
            this.activeCancelled = false;
        },
        showGrooming() {
            this.activeWaiting = false;
            this.activeGrooming = true;
            this.activeCompleted = false;
            this.activeCollected = false;
            this.activeCancelled = false;
        },
        showCompleted() {
            this.activeWaiting = false;
            this.activeGrooming = false;
            this.activeCompleted = true;
            this.activeCollected = false;
            this.activeCancelled = false;
        },
        showCollected() {
            this.activeWaiting = false;
            this.activeGrooming = false;
            this.activeCompleted = false;
            this.activeCollected = true;
            this.activeCancelled = false;
        },
        showCancelled() {
            this.activeWaiting = false;
            this.activeGrooming = false;
            this.activeCompleted = false;
            this.activeCollected = false;
            this.activeCancelled = true;
        }
    }
};
</script>
