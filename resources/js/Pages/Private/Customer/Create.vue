<template>
    <breeze-authenticated-layout>
        <template #title>
            - Create Customer
        </template>
        <template #header>
            <inertia-link
                :href="route('customers.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Add new customer
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('customers.index')" :active="false">
                Customers
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Customer
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="submit">
                    <div class="mt-3 p-3">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            placeholder="Name"
                            id="name"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.name
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.name"
                            @keydown="form.clearErrors('name')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.name
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="phone_no">Phone No</label>
                        <input
                            type="number"
                            placeholder="Phone No"
                            id="phone_no"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.phone_no
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.phone_no"
                            @keydown="form.clearErrors('phone_no')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.phone_no
                        }}</span>
                    </div>

                    <div class="mt-3 p-3">
                        <label for="search">Car (optional)</label>
                        <div v-if="!car" class="input-group">
                            <input
                                type="text"
                                id="search"
                                placeholder="Search car..."
                                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="formCar.query"
                            />
                        </div>

                        <div
                            v-if="formCar.query && cars.length == 0"
                            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                        >
                            Oops, we could not find any matching cars.
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
                                    <tr
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

                    <div class="mt-3 p-3">
                        <label for="search">Personality (optional)</label>
                        <div v-if="!personality" class="input-group">
                            <input
                                type="text"
                                id="search"
                                placeholder="Search personality..."
                                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="formPersonality.query"
                            />
                        </div>

                        <div
                            v-if="
                                formPersonality.query &&
                                    personalities.length == 0
                            "
                            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                        >
                            Oops, we could not find any matching personalities.
                            <span
                                @click="viewAllPersonalities"
                                class="text-blue-500 text-decoration-none cursor-pointer"
                            >
                                View all?
                            </span>
                        </div>

                        <transition name="fade">
                            <div
                                v-if="personalities.length > 0"
                                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">
                                            Personality Name
                                        </th>
                                    </tr>
                                    <tr
                                        v-for="personality in personalities"
                                        :key="personality.id"
                                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                                    >
                                        <td
                                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                        >
                                            {{ personality.name }}
                                        </td>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                type="button"
                                                @click="
                                                    selectPersonality(
                                                        personality
                                                    )
                                                "
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
                                v-if="personality"
                                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">
                                            Selected Personality Name
                                        </th>
                                    </tr>
                                    <tr
                                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                                    >
                                        <td
                                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                        >
                                            {{ personality.name }}
                                        </td>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                type="button"
                                                @click="clearPersonality()"
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
                        <inertia-link
                            :href="route('customers.index')"
                            class="btn btn-secondary"
                        >
                            Back
                        </inertia-link>
                        <breeze-button
                            :class="{
                                'opacity-25': form.processing
                            }"
                            :disabled="form.processing"
                        >
                            Submit
                        </breeze-button>
                    </div>
                </form>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import throttle from "lodash/throttle";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object
    },

    setup() {
        const form = useForm({
            name: null,
            phone_no: null,
            car_id: null,
            personality_id: null
        });

        return { form };
    },

    data() {
        return {
            formCar: {
                query: null
            },
            cars: [],
            car: null,
            formPersonality: {
                query: null
            },
            personalities: [],
            personality: null
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
        },
        formPersonality: {
            deep: true,
            handler: throttle(function() {
                if (
                    this.formPersonality.query &&
                    this.formPersonality.query != ""
                ) {
                    axios
                        .get(route("personalities.search"), {
                            params: {
                                query: this.formPersonality.query
                            }
                        })
                        .then(response => {
                            this.personalities = response.data;
                        });
                } else {
                    this.personalities = [];
                }
            }, 150)
        }
    },

    methods: {
        selectCar(car) {
            this.car = car;
            this.formCar.query = "";
            this.cars = [];
        },
        clearCar() {
            this.car = null;
        },
        selectPersonality(personality) {
            this.personality = personality;
            this.formPersonality.query = "";
            this.personalities = [];
        },
        clearPersonality() {
            this.personality = null;
        },
        submit() {
            if (this.car) {
                this.form.car_id = this.car.id;
            }
            if (this.personality) {
                this.form.personality_id = this.personality.id;
            }
            this.form.post(route("customers.store"));
        },
        viewAllPersonalities() {
            axios.get(route("personalities.all")).then(response => {
                this.personalities = response.data;
            });
        }
    }
};
</script>
