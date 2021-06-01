<template>
    <breeze-authenticated-layout>
        <template #title>
            - Dashboard
        </template>
        <template #header>
            <div class="input-group">
                <input
                    type="text"
                    id="searchCar"
                    placeholder="Search car..."
                    class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="formCar.query"
                />
            </div>
        </template>

        <div
            class="px-6 py-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <div class="mt-3">
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
