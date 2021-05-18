<template>
    <!-- Queue Section-->
    <section class="page-section">
        <div class="container">
            <!-- Queue Section Heading-->
            <h2
                class="page-section-heading text-secondary text-center text-uppercase py-4"
            >
                {{ store.name }}
            </h2>
            <fullscreen ref="fullscreen" :fullscreen.sync="fullscreen">
                <!-- Queue Subheading-->
                <div class="row text-uppercase">
                    <div class="col-md-4 col-sm-12">
                        <table class="table-queue text-center">
                            <thead>
                                <tr>
                                    <th class="bg-light">
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
                    <div class="col-md-4 col-sm-12">
                        <table class="table-queue text-center">
                            <thead>
                                <tr>
                                    <th class="bg-light">
                                        <h2>
                                            Grooming
                                            <i class="fas fa-hands-wash"></i>
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
                    <div class="col-md-4 col-sm-12">
                        <table class="table-queue text-center">
                            <thead>
                                <tr>
                                    <th class="bg-light">
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
            <button type="button" @click="toggle">Fullscreen</button>
        </div>
    </section>
</template>

<script>
import Fullscreen from "vue-fullscreen/src/component.vue";

export default {
    components: { Fullscreen },

    data() {
        return {
            waiting: [],
            grooming: [],
            completed: [],
            fullscreen: false
        };
    },

    mounted() {
        this.getQueue();
        let self = this;
        setInterval(function() {
            self.getQueue();
        }, 5000);
    },

    methods: {
        getQueue() {
            let self = this;
            axios.get(route("queues", route().params)).then(response => {
                self.waiting = response.data.filter(queues =>
                    queues.status.includes("Waiting")
                );
                self.grooming = response.data.filter(queues =>
                    queues.status.includes("Grooming")
                );
                self.completed = response.data.filter(queues =>
                    queues.status.includes("Completed")
                );
            });
        },
        toggle() {
            this.$refs["fullscreen"].toggle();
            // this.fullscreen = !this.fullscreen
        }
    },

    props: {
        auth: Object,
        errors: Object,
        store: Object
    }
};
</script>
