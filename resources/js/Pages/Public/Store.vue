<template>
    <breeze-customer-layout>
        <template #title> - {{ store.name }} </template>
        <!-- Queue Section-->
        <section class="page-section py-3">
            <div class="container">
                <!-- Queue Section Heading-->
                <h2
                    @click="toggle"
                    class="page-section-heading text-secondary text-center text-uppercase pt-4"
                >
                    {{ store.name }}
                </h2>
                <div id="empty" v-if="queuesCount <= 0">
                    <h2
                        class="page-section-heading text-secondary text-center text-uppercase py-4"
                    >
                        Yeay, you're in luck
                    </h2>
                    <!-- Icon Divider-->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <h2
                        class="page-section-heading text-secondary text-center text-uppercase py-4"
                    >
                        No queue at the moment
                    </h2>
                </div>
                <fullscreen
                    ref="fullscreen"
                    v-if="queuesCount > 0"
                    v-model:fullscreen.sync="fullscreen"
                    class="bg-white shadow px-6 py-3"
                >
                    <!-- Queue Subheading-->
                    <div class="row text-uppercase">
                        <div class="col-lg-4 col-sm-12">
                            <table class="table-queue text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            <h2>
                                                Waiting
                                                <i
                                                    class="fas fa-hourglass-start"
                                                ></i>
                                            </h2>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="queue in waiting"
                                        v-bind:key="queue.id"
                                    >
                                        <td class="table-danger">
                                            <h4>
                                                {{
                                                    queue.car.model +
                                                        " " +
                                                        queue.car.plate_no
                                                }}
                                            </h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <table class="table-queue text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            <h2>
                                                Grooming
                                                <i
                                                    class="fas fa-hands-wash"
                                                ></i>
                                            </h2>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="queue in grooming"
                                        v-bind:key="queue.id"
                                    >
                                        <td class="table-warning">
                                            <h4>
                                                {{
                                                    queue.car.model +
                                                        " " +
                                                        queue.car.plate_no
                                                }}
                                            </h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <table class="table-queue text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            <h2>
                                                Completed
                                                <i
                                                    class="fas fa-clipboard-check"
                                                ></i>
                                            </h2>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="queue in completed"
                                        v-bind:key="queue.id"
                                    >
                                        <td class="table-success">
                                            <h4>
                                                {{
                                                    queue.car.model +
                                                        " " +
                                                        queue.car.plate_no
                                                }}
                                            </h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fullscreen>
            </div>
        </section>
    </breeze-customer-layout>
</template>

<script>
import BreezeCustomerLayout from "@/Layouts/Customer";
import Fullscreen from "vue-fullscreen/src/component.vue";

export default {
    components: {
        BreezeCustomerLayout,
        Fullscreen
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        store: Object,
        queues: Object
    },

    data() {
        return {
            polling: null,
            queuesCount: 0,
            waiting: [],
            grooming: [],
            completed: [],
            fullscreen: false
        };
    },

    mounted() {
        this.queuesCount = this.queues.length;
        this.sortQueue();
        this.pollData();
    },

    unmounted() {
        clearInterval(this.polling);
    },

    methods: {
        sortQueue() {
            this.waiting = this.queues.filter(queues =>
                queues.status.includes("Waiting")
            );
            this.grooming = this.queues.filter(queues =>
                queues.status.includes("Grooming")
            );
            this.completed = this.queues.filter(queues =>
                queues.status.includes("Completed")
            );
        },
        getQueue() {
            let self = this;
            axios.get(route("queues.index", route().params)).then(response => {
                self.waiting = response.data.filter(queues =>
                    queues.status.includes("Waiting")
                );
                self.grooming = response.data.filter(queues =>
                    queues.status.includes("Grooming")
                );
                self.completed = response.data.filter(queues =>
                    queues.status.includes("Completed")
                );
                self.queuesCount =
                    self.waiting.length +
                    self.grooming.length +
                    self.completed.length;
            });
        },
        pollData() {
            this.polling = setInterval(() => {
                this.getQueue();
            }, 10000);
        },
        toggle() {
            this.$refs["fullscreen"].toggle();
        }
    }
};
</script>
