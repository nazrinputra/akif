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
            <!-- Queue Subheading-->
            <div class="row text-uppercase">
                <div class="col-md-4 col-sm-12">
                    <table class="table-queue text-center">
                        <thead>
                            <tr>
                                <th>
                                    <h2>
                                        Waiting
                                        <i class="fas fa-hourglass-start"></i>
                                    </h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="queue in waiting" v-bind:key="queue.id">
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
                                <th>
                                    <h2>
                                        Grooming
                                        <i class="fas fa-hands-wash"></i>
                                    </h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="queue in grooming" v-bind:key="queue.id">
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
                                <th>
                                    <h2>
                                        Completed
                                        <i class="fas fa-clipboard-check"></i>
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
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            queues: []
        };
    },

    created() {
        axios.get(route("queues", route().params)).then(data => {
            this.queues = data;
            console.log("queues :");
            console.dir(this.queues);
        });
    },

    props: {
        auth: Object,
        errors: Object,
        store: Object,
        waiting: Object,
        grooming: Object,
        completed: Object
    }
};
</script>
