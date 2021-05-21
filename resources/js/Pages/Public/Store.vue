<template>
    <teleport to="#homeButton">
        <inertia-link class="navbar-brand" href="/"
            ><img class="img-thumbnail" src="/img/logo-navbar.png" alt="Akif"
        /></inertia-link>
    </teleport>
    <teleport to="#menuButton">
        <button
            type="button"
            class="text-uppercase font-weight-bold text-white text-xl"
        >
            Menu
            <i class="fas fa-store-alt"></i>
        </button>
    </teleport>
    <teleport to="#navLinks">
        <li class="nav-item  mx-0 mx-lg-1">
            <inertia-link
                v-bind:class="[isTambakBugis ? 'active' : '']"
                class="nav-link py-3 px-0 px-lg-3 rounded"
                :href="route('store', 'tambak-bugis')"
                >Tambak Bugis</inertia-link
            >
        </li>
        <li class="nav-item  mx-0 mx-lg-1">
            <inertia-link
                v-bind:class="[isBukitKatil ? 'active' : '']"
                class="nav-link py-3 px-0 px-lg-3 rounded"
                :href="route('store', 'bukit-katil')"
                >Bukit Katil</inertia-link
            >
        </li>
        <li class="nav-item  mx-0 mx-lg-1">
            <inertia-link
                class="nav-link py-3 px-0 px-lg-3 rounded"
                :href="route('promotions')"
                >Promotions</inertia-link
            >
        </li>
    </teleport>
    <section class="masthead">
        <!-- Queue Section-->
        <section class="page-section py-3">
            <div class="container">
                <!-- Queue Section Heading-->
                <h2
                    @click="toggle"
                    class="page-section-heading text-secondary text-center text-uppercase py-4"
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
                    class="bg-white"
                >
                    <!-- Queue Subheading-->
                    <div class="row text-uppercase">
                        <div class="col-md-4 col-sm-12">
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
                        <div class="col-md-4 col-sm-12">
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
                        <div class="col-md-4 col-sm-12">
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
    </section>
    <teleport to="#copyright">
        <div class="container">
            <small
                >Copyright ©
                <inertia-link :href="route('login')" class="text-primary"
                    >Akif Car Grooming Center</inertia-link
                >
                2021</small
            >
        </div>
    </teleport>
</template>

<script>
import Fullscreen from "vue-fullscreen/src/component.vue";

export default {
    components: { Fullscreen },

    props: {
        auth: Object,
        errors: Object,
        store: Object,
        queuesCount: Number
    },

    data() {
        return {
            isTambakBugis: false,
            isBukitKatil: false,
            polling: null,
            waiting: [],
            grooming: [],
            completed: [],
            fullscreen: false
        };
    },

    mounted() {
        if (route().current("store", "tambak-bugis")) {
            this.isTambakBugis = true;
        }
        if (route().current("store", "bukit-katil")) {
            this.isBukitKatil = true;
        }
        this.getQueue();
        this.pollData();
    },

    unmounted() {
        clearInterval(this.polling);
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
