<template>
    <breeze-authenticated-layout>
        <template #title>
            - Edit Customer
        </template>
        <template #header>
            <inertia-link
                :href="route('customers.show', customer)"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Edit existing customer
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('customers.index')" :active="false">
                Customers
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('customers.show', customer)"
                :active="false"
            >
                Customer
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Edit
            </span>
        </template>

        <div class="input-group pt-3">
            <input
                type="text"
                id="searchPersonality"
                placeholder="Search personality..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formPersonality.query"
            />
        </div>

        <div
            v-if="formPersonality.query && personalities.length == 0"
            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching personalities.
        </div>

        <div
            v-if="personalities.length > 0"
            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Personalities</th>
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
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            v-if="
                                !customer.personalities.some(
                                    data => data.id === personality.id
                                )
                            "
                            type="button"
                            @click="linkPersonality(personality)"
                            tabindex="-1"
                        >
                            <i class="fas fa-link"></i>
                        </breeze-button>
                    </td>
                </tr>
            </table>
        </div>

        <div
            v-if="customer.personalities.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Current Personalities</th>
                </tr>
                <tr
                    v-for="personality in customer.personalities"
                    :key="personality.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('personalities.edit', personality)"
                        >
                            {{ personality.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="unlinkPersonality(personality)"
                            tabindex="-1"
                        >
                            <i class="fas fa-unlink"></i>
                        </breeze-button>
                    </td>
                </tr>
            </table>
        </div>

        <div
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form
                    @submit.prevent="
                        form.put(route('customers.update', customer))
                    "
                >
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

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            class="ml-auto"
                            :class="{
                                'opacity-25': form.processing
                            }"
                            :disabled="form.processing"
                        >
                            Update
                        </breeze-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="input-group pt-3">
            <input
                type="text"
                id="searchCar"
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
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
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
                                v-if="
                                    !customer.cars.some(
                                        data => data.id === car.id
                                    )
                                "
                                type="button"
                                @click="linkCar(car)"
                                tabindex="-1"
                            >
                                <i class="fas fa-link"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </transition>

        <div
            v-if="customer.cars.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Owned Car Model</th>
                    <th class="px-3 py-3">Owned Car Plate No</th>
                </tr>
                <tr
                    v-for="car in customer.cars"
                    :key="car.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('cars.show', car)"
                        >
                            {{ car.model }}
                        </inertia-link>
                    </td>
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('cars.show', car)"
                        >
                            {{ car.plate_no }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="unlinkCar(car)"
                            tabindex="-1"
                        >
                            <i class="fas fa-unlink"></i>
                        </breeze-button>
                    </td>
                </tr>
            </table>
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
        flash: Object,
        customer: Object
    },

    setup() {
        const form = useForm({
            name: null,
            phone_no: null
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.customer.name;
            this.form.phone_no = this.customer.phone_no;
            this.form.gender = this.customer.gender;
        },
        linkCar(car) {
            this.$inertia.post(
                route("owner.link"),
                {
                    car_id: car.id,
                    customer_id: this.customer.id
                },
                {
                    onSuccess: () => {
                        this.formCar.query = "";
                        this.cars = [];
                        this.flash.success =
                            "Car linked successfully to customer.";
                    }
                }
            );
        },
        unlinkCar(car) {
            this.$inertia.post(
                route("owner.unlink"),
                {
                    car_id: car.id,
                    customer_id: this.customer.id
                },
                {
                    onSuccess: () => {
                        this.flash.warning =
                            "Car unlinked from customer. <a href='" +
                            route("cars.show", car) +
                            " 'style='color:#92400e;text-decoration:underline;'>View car</a>";
                    }
                }
            );
        },
        linkPersonality(personality) {
            this.$inertia.post(
                route("personality.link"),
                {
                    personality_id: personality.id,
                    customer_id: this.customer.id
                },
                {
                    onSuccess: () => {
                        this.formPersonality.query = "";
                        this.personalities = [];
                        this.flash.success =
                            "Personality linked successfully to customer.";
                    }
                }
            );
        },
        unlinkPersonality(personality) {
            this.$inertia.post(
                route("personality.unlink"),
                {
                    personality_id: personality.id,
                    customer_id: this.customer.id
                },
                {
                    onSuccess: () => {
                        this.flash.warning =
                            "Personality unlinked from customer. <a href='" +
                            route("personalities.show", personality) +
                            " 'style='color:#92400e;text-decoration:underline;'>View personality</a>";
                    }
                }
            );
        }
    },

    data() {
        return {
            formCar: {
                query: null
            },
            cars: [],
            formPersonality: {
                query: null
            },
            personalities: []
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
    }
};
</script>
