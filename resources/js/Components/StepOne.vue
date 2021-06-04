<template>
    <div class="container">
        <div class="p-3">
            <div class="container">
                <form>
                    <div class="mt-3 p-3">
                        <label v-if="!customer" for="name">Name</label>
                        <input
                            v-if="!customer"
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
                        <span
                            v-if="!customer"
                            class="text-red-700 mt-2 text-sm"
                            >{{ form.errors.name }}</span
                        >

                        <transition name="fade">
                            <div
                                v-if="customers.length > 0"
                                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">Customer Name</th>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                @click="closeSearchCustomer()"
                                                type="button"
                                            >
                                                <i class="fas fa-times"></i>
                                            </breeze-button>
                                        </td>
                                    </tr>
                                    <tr
                                        v-for="customer in customers"
                                        :key="customer.id"
                                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                                    >
                                        <td
                                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                        >
                                            {{ customer.name }}
                                        </td>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                @click="
                                                    selectCustomer(customer)
                                                "
                                                type="button"
                                            >
                                                <i class="fas fa-check"></i>
                                            </breeze-button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </transition>

                        <transition name="fade">
                            <div
                                v-if="customer"
                                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">
                                            Selected Customer Name
                                        </th>
                                    </tr>
                                    <tr
                                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                                    >
                                        <td
                                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                        >
                                            {{ customer.name }}
                                        </td>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                type="button"
                                                @click="clearCustomer()"
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
                        class="mt-3 p-3"
                        v-if="!customer && customers.length == 0"
                    >
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
                        <label v-if="!car" for="plate_no">Plate No</label>
                        <input
                            v-if="!car"
                            type="text"
                            placeholder="Plate No"
                            id="plate_no"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.plate_no
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.plate_no"
                            @keydown="form.clearErrors('plate_no')"
                            required
                        />
                        <span v-if="!car" class="text-red-700 mt-2 text-sm">{{
                            form.errors.plate_no
                        }}</span>

                        <transition name="fade">
                            <div
                                v-if="cars.length > 0"
                                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">Car Model</th>
                                        <th class="px-3 py-3">Car Plate No</th>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                @click="closeSearchCar()"
                                                type="button"
                                            >
                                                <i class="fas fa-times"></i>
                                            </breeze-button>
                                        </td>
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

                    <div class="mt-3 p-3" v-if="!car && cars.length == 0">
                        <label for="model">Model</label>
                        <input
                            type="text"
                            placeholder="Model"
                            id="model"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.model
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.model"
                            @keydown="form.clearErrors('model')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.model
                        }}</span>
                    </div>
                    <div class="mt-3 p-3" v-if="!car && cars.length == 0">
                        <label for="size">Size</label>
                        <select
                            v-model="form.size"
                            @change="form.clearErrors('size')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.size
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            required
                        >
                            <option value="" disabled>Select Size</option>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.size
                        }}</span>
                    </div>

                    <div class="mt-3 p-3">
                        <label v-if="!personality" for="personality"
                            >Personality (optional)</label
                        >
                        <input
                            v-if="!personality"
                            type="text"
                            placeholder="Personality"
                            id="personality"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.personality"
                            @keydown="form.clearErrors('personality')"
                        />

                        <div
                            v-if="form.personality && personalities.length == 0"
                            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
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
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                @click="
                                                    closeSearchPersonality()
                                                "
                                                type="button"
                                            >
                                                <i class="fas fa-times"></i>
                                            </breeze-button>
                                        </td>
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
                </form>
            </div>
        </div>

        <div
            class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
        >
            <breeze-button type="button" @click="reset()">
                Reset
            </breeze-button>
            <breeze-button type="button" @click="$emit('next')">
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

    props: ["form"],

    data() {
        return {
            cars: [],
            car: null,
            customers: [],
            customer: null,
            personality: null,
            personalities: [],
            disableSearchCustomer: false,
            disableSearchCar: false,
            disableSearchPersonality: false
        };
    },

    watch: {
        form: {
            deep: true,
            handler: throttle(function() {
                if (
                    this.form.plate_no &&
                    this.form.plate_no != "" &&
                    !this.disableSearchCar &&
                    !this.car &&
                    !this.form.model
                ) {
                    axios
                        .get(route("cars.search"), {
                            params: {
                                query: this.form.plate_no
                            }
                        })
                        .then(response => {
                            this.cars = response.data;
                        });
                }
                if (
                    this.form.name &&
                    this.form.name != "" &&
                    !this.disableSearchCustomer &&
                    !this.customer &&
                    !this.form.phone_no
                ) {
                    axios
                        .get(route("customers.search"), {
                            params: {
                                query: this.form.name
                            }
                        })
                        .then(response => {
                            this.customers = response.data;
                        });
                }
                if (
                    this.form.personality &&
                    this.form.personality != "" &&
                    !this.disableSearchPersonality &&
                    !this.personality
                ) {
                    axios
                        .get(route("personalities.search"), {
                            params: {
                                query: this.form.personality
                            }
                        })
                        .then(response => {
                            this.personalities = response.data;
                        });
                }
                if (!this.form.plate_no || this.form.plate_no == "") {
                    this.cars = [];
                }
                if (!this.form.name || this.form.name == "") {
                    this.customers = [];
                }
                if (!this.form.personality || this.form.personality == "") {
                    this.personalities = [];
                }
            }, 150)
        }
    },

    methods: {
        selectCar(car) {
            this.car = car;
            this.form.plate_no = null;
            this.cars = [];
            this.$emit("selectCar", car);
        },
        clearCar() {
            this.car = null;
            this.$emit("clearCar");
        },
        selectCustomer(customer) {
            this.customer = customer;
            this.form.name = null;
            this.customers = [];
            this.$emit("selectCustomer", customer);
        },
        clearCustomer() {
            this.customer = null;
            this.$emit("clearCustomer");
        },
        selectPersonality(personality) {
            this.personality = personality;
            this.form.personality = null;
            this.personalities = [];
            this.$emit("selectPersonality", personality);
        },
        clearPersonality() {
            this.personality = null;
            this.$emit("clearPersonality");
        },
        closeSearchCustomer() {
            this.customers = [];
            this.disableSearchCustomer = true;
        },
        closeSearchCar() {
            this.cars = [];
            this.disableSearchCar = true;
        },
        closeSearchProfile() {
            this.personalities = [];
            this.disableSearchPersonality = true;
        },
        reset() {
            this.disableSearchCustomer = false;
            this.disableSearchCar = false;
            this.disableSearchPersonality = false;
            this.form.plate_no = null;
            this.form.model = null;
            this.form.size = null;
            this.form.name = null;
            this.form.phone_no = null;
            this.form.personality = null;
        },
        viewAllPersonalities() {
            axios.get(route("personalities.all")).then(response => {
                this.personalities = response.data;
            });
        }
    }
};
</script>
