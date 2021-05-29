<template>
    <div class="container">
        <div class="p-3">
            <div v-if="!car" class="input-group">
                <input
                    type="text"
                    id="searchCar"
                    placeholder="Search car..."
                    class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="formCar.query"
                />
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
                            <td class="border-t px-3 focus:text-indigo-500">
                                {{ car.plate_no }}
                            </td>
                            <td class="border-t w-px md:table-cell hidden pr-3">
                                <breeze-button
                                    type="button"
                                    @click="selectCar(car)"
                                >
                                    <i class="fas fa-check"></i
                                ></breeze-button>
                            </td>
                        </tr>
                    </table>
                </div>
            </transition>

            <transition name="fade">
                <div
                    v-if="car"
                    class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                >
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="px-3 py-3">
                                Selected Car Model
                            </th>
                            <th class="px-3 py-3">
                                Selected Car Plate No
                            </th>
                        </tr>
                        <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                            <td
                                class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                            >
                                {{ car.model }}
                            </td>
                            <td class="border-t px-3 focus:text-indigo-500">
                                {{ car.plate_no }}
                            </td>
                            <td class="border-t w-px md:table-cell hidden pr-3">
                                <breeze-button
                                    type="button"
                                    @click="clearCar()"
                                >
                                    <i class="fas fa-times"></i>
                                </breeze-button>
                            </td>
                        </tr>
                    </table>
                </div>
            </transition>
        </div>

        <div
            class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
        >
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                Cancel
            </inertia-link>
            <breeze-button type="button" @click="next">
                Next
            </breeze-button>
        </div>
    </div>
</template>

<script>
import BreezeButton from "@/Components/Button";
import throttle from "lodash/throttle";

export default {
    components: {
        BreezeButton
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
    },

    methods: {
        selectCar(car) {
            this.car = car;
            this.formCar.query = "";
            this.cars = [];
            this.$emit("selectCar", car);
        },
        clearCar() {
            this.car = null;
            this.$emit("clearCar");
        },
        next() {
            if (this.car) {
                this.$emit("next");
            } else {
                this.$emit("next");
            }
        }
    }
};
</script>
