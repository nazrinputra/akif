<template>
    <breeze-authenticated-layout>
        <template #title>
            - Dashboard
        </template>
        <template #header>
            <h6 class="pt-2.5 mx-auto">
                Akif Car Grooming Center
            </h6>
        </template>

        <!-- Welcome for supported devices -->
        <div
            class="hidden sm:flex px-6 py-6 mb-3 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div
                class="container bg-opacity-10 bg-no-repeat bg-right bg-contain"
                style="background-image: url('/img/car-wash.png')"
            >
                <div class="row">
                    <h2 class="text-secondary text-6xl font-sans mr-3 my-auto">
                        Welcome,<br />
                        <span class="text-primary text-4xl font-sans my-auto">{{
                            $page.props.auth.user.name
                        }}</span>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Welcome for unsupported devices -->
        <div
            class="flex sm:hidden p-6 mb-3 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="row p-6 justify-content-center">
                <h2 class="text-secondary text-3xl font-sans mr-3 my-auto">
                    Welcome,
                    <span class="text-primary text-xl font-sans my-auto">{{
                        $page.props.auth.user.name
                    }}</span>
                </h2>
            </div>
        </div>

        <div
            class="p-6 mb-3 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <div class="row">
                    <inertia-link
                        :href="route('customers.index')"
                        class="col-md-3"
                    >
                        <div class="card-counter primary">
                            <i class="fas fa-users"></i>
                            <span class="count-numbers">{{ customers }}</span>
                            <span class="count-name">Total Customers</span>
                        </div>
                    </inertia-link>

                    <inertia-link :href="route('monthly')" class="col-md-3">
                        <div class="card-counter danger">
                            <i class="fas fa-house-user"></i>
                            <span class="count-numbers">{{ monthly }}</span>
                            <span class="count-name">Unique Visits</span>
                        </div>
                    </inertia-link>

                    <inertia-link :href="route('fresh')" class="col-md-3">
                        <div class="card-counter success">
                            <i class="fas fa-user-plus"></i>
                            <span class="count-numbers">{{ fresh }}</span>
                            <span class="count-name">New Customers</span>
                        </div>
                    </inertia-link>

                    <inertia-link :href="route('stale')" class="col-md-3">
                        <div class="card-counter info">
                            <i class="fas fa-address-book"></i>
                            <span class="count-numbers">{{ stale }}</span>
                            <span class="count-name">Old Customers</span>
                        </div>
                    </inertia-link>
                </div>
            </div>
        </div>

        <div class="input-group">
            <input
                type="text"
                id="searchCar"
                placeholder="Search car..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formCar.query"
            />
        </div>

        <div
            class="p-6 mb-3 bg-white border-b border-gray-200 shadow sm:rounded-lg"
        >
            <div class="container">
                <div class="mt-3">
                    <div v-if="!formCar.query && cars.length == 0" class="mb-3">
                        Start searching for a car or
                        <inertia-link
                            :href="route('cars.create')"
                            class="text-blue-500 text-decoration-none"
                            >create new</inertia-link
                        >
                    </div>

                    <div v-if="formCar.query && cars.length == 0" class="mb-3">
                        Oops, we could not find any matching cars.
                        <inertia-link
                            :href="route('cars.create')"
                            class="text-blue-500 text-decoration-none"
                            >Create new?</inertia-link
                        >
                    </div>

                    <transition name="fade">
                        <div v-if="cars.length > 0" class="mb-3">
                            <table class="w-full whitespace-nowrap">
                                <tr class="text-left font-bold">
                                    <th class="px-3 py-3">Car Model</th>
                                    <th class="px-3 py-3">Car Plate No</th>
                                </tr>
                                <tr
                                    v-for="car in cars"
                                    :key="car.id"
                                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                                >
                                    <td
                                        class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                    >
                                        {{ car.model }}
                                    </td>
                                    <td
                                        class="border-t px-3 focus:text-indigo-500"
                                    >
                                        {{ car.plate_no }}
                                    </td>
                                    <td
                                        class="border-t w-px md:table-cell hidden pr-3"
                                    >
                                        <inertia-link
                                            :href="route('cars.show', car)"
                                            class="btn btn-secondary"
                                        >
                                            <i class="fas fa-eye"></i
                                        ></inertia-link>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";
import throttle from "lodash/throttle";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        customers: Number,
        monthly: Number,
        fresh: Number,
        stale: Number
    },

    data() {
        return {
            formCar: {
                query: null
            },
            cars: [],
            car: null
        };
    },

    watch: {
        formCar: {
            deep: true,
            handler: throttle(function() {
                if (this.formCar.query && this.formCar.query != "") {
                    axios
                        .get(route("cars.search"), {
                            params: {
                                query: this.formCar.query
                            }
                        })
                        .then(response => {
                            this.cars = response.data;
                        });
                } else {
                    this.cars = [];
                }
            }, 150)
        }
    }
};
</script>

<style>
.card-counter {
    box-shadow: 2px 2px 10px #dadada;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: 0.3s linear all;
}

.card-counter:hover {
    box-shadow: 4px 4px 20px #dadada;
    transition: 0.3s linear all;
}

.card-counter.primary {
    background-color: #007bff;
    color: #fff;
}

.card-counter.danger {
    background-color: #ef5350;
    color: #fff;
}

.card-counter.success {
    background-color: #66bb6a;
    color: #fff;
}

.card-counter.info {
    background-color: #26c6da;
    color: #fff;
}

.card-counter i {
    font-size: 5em;
    opacity: 0.2;
}

.card-counter .count-numbers {
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
}

.card-counter .count-name {
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
}
</style>
