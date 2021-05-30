<template>
    <breeze-authenticated-layout>
        <template #title>
            - Dashboard
        </template>
        <template #header>
            <h6 class="pt-2.5 mx-auto">
                Dashboard view for crew.
            </h6>
        </template>
        <div
            class="px-6 py-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 my-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Orders Received</h6>
                                <h2 class="text-right">
                                    <i class="fa fa-cart-plus f-left"></i
                                    ><span>486</span>
                                </h2>
                                <p class="m-b-0">
                                    Completed Orders<span class="f-right"
                                        >351</span
                                    >
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 my-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Orders Received</h6>
                                <h2 class="text-right">
                                    <i class="fa fa-rocket f-left"></i
                                    ><span>486</span>
                                </h2>
                                <p class="m-b-0">
                                    Completed Orders<span class="f-right"
                                        >351</span
                                    >
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 my-3">
                        <div class="card bg-c-yellow order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Orders Received</h6>
                                <h2 class="text-right">
                                    <i class="fas fa-car f-left"></i
                                    ><span>486</span>
                                </h2>
                                <p class="m-b-0">
                                    Completed Orders<span class="f-right"
                                        >351</span
                                    >
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 my-3">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Orders Received</h6>
                                <h2 class="text-right">
                                    <i class="fa fa-credit-card f-left"></i
                                    ><span>486</span>
                                </h2>
                                <p class="m-b-0">
                                    Completed Orders<span class="f-right"
                                        >351</span
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
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
                        v-if="!formCar.query && cars.length == 0"
                        class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                    >
                        Quickly search for existing cars in the system.
                    </div>

                    <div
                        v-if="formCar.query && cars.length == 0"
                        class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                    >
                        Oops, we could not find any matching cars.
                        <inertia-link
                            :href="route('cars.create')"
                            class="text-blue-500 text-decoration-none"
                            >Create new?</inertia-link
                        >
                    </div>

                    <transition name="fade">
                        <div
                            v-if="cars.length > 0"
                            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                        >
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

<style>
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg, #4099ff, #73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg, #2ed8b6, #59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg, #ffb64d, #ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg, #ff5370, #ff869a);
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>

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
        flash: Object
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
