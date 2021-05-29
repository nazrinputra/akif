<template>
    <breeze-authenticated-layout>
        <template #title>
            - Counter
        </template>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Register customer car into queue.
            </h6>
        </template>
        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Counter
            </span>
        </template>

        <div
            class="px-6 pb-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg md-stepper-horizontal"
        >
            <div class="pt-3 d-flex justify-content-between">
                <div
                    class="md-step cursor-pointer"
                    :class="stepper.stepOne ? 'active' : ''"
                    @click="stepOne"
                >
                    <div class="md-step-circle"><span>1</span></div>
                    <div class="md-step-title">Car</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <div
                    class="md-step cursor-pointer"
                    :class="stepper.stepTwo ? 'active' : ''"
                    @click="stepTwo"
                >
                    <div class="md-step-circle"><span>2</span></div>
                    <div class="md-step-title">Customer</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <div
                    class="md-step cursor-pointer"
                    :class="stepper.stepThree ? 'active' : ''"
                    @click="stepThree"
                >
                    <div class="md-step-circle"><span>3</span></div>
                    <div class="md-step-title">Package</div>
                    <div class="md-step-optional">Optional</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <div
                    class="md-step cursor-pointer"
                    :class="stepper.stepFour ? 'active' : ''"
                    @click="stepFour"
                >
                    <div class="md-step-circle"><span>4</span></div>
                    <div class="md-step-title">Review</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
            </div>

            <div v-if="stepper.stepOne" class="container">
                <form @submit.prevent="submit">
                    <div class="mt-3 p-3">
                        <label for="plate_no">Plate No</label>
                        <input
                            type="text"
                            placeholder="Plate No"
                            id="plate_no"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                formCar.errors.plate_no
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="formCar.plate_no"
                            @keydown="formCar.clearErrors('plate_no')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            formCar.errors.plate_no
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="brand">Brand</label>
                        <input
                            type="text"
                            placeholder="Brand"
                            id="brand"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                formCar.errors.brand
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="formCar.brand"
                            @keydown="formCar.clearErrors('brand')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            formCar.errors.brand
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="model">Model</label>
                        <input
                            type="text"
                            placeholder="Model"
                            id="model"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                formCar.errors.model
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="formCar.model"
                            @keydown="formCar.clearErrors('model')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            formCar.errors.model
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="color">Color</label>
                        <input
                            type="text"
                            placeholder="Color"
                            id="color"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                formCar.errors.color
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="formCar.color"
                            @keydown="formCar.clearErrors('color')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            formCar.errors.color
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="size">Size</label>
                        <select
                            v-model="formCar.size"
                            @change="formCar.clearErrors('size')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                formCar.errors.size
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
                            formCar.errors.size
                        }}</span>
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <inertia-link
                            :href="route('cars.index')"
                            class="btn btn-secondary"
                        >
                            Back
                        </inertia-link>
                        <breeze-button type="button" @click="stepTwo">
                            Next
                        </breeze-button>
                    </div>
                </form>
            </div>

            <div v-if="stepper.stepTwo" class="container">
                <form @submit.prevent="submit">
                    <div class="mt-3 p-3">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            placeholder="Name"
                            id="name"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                formCustomer.errors.name
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="formCustomer.name"
                            @keydown="formCustomer.clearErrors('name')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            formCustomer.errors.name
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
                                formCustomer.errors.phone_no
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="formCustomer.phone_no"
                            @keydown="formCustomer.clearErrors('phone_no')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            formCustomer.errors.phone_no
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="gender">Gender</label>
                        <select
                            v-model="formCustomer.gender"
                            @change="formCustomer.clearErrors('gender')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                formCustomer.errors.gender
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            required
                        >
                            <option value="" disabled>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            formCustomer.errors.gender
                        }}</span>
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button type="button" @click="stepOne">
                            Back
                        </breeze-button>
                        <breeze-button type="button" @click="stepThree">
                            Next
                        </breeze-button>
                    </div>
                </form>
            </div>

            <div v-if="stepper.stepThree" class="mt-3 p-3">
                <label for="search">Package</label>
                <div v-if="!pkg" class="input-group">
                    <input
                        type="text"
                        id="search"
                        placeholder="Search package..."
                        class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="formPackage.query"
                    />
                </div>

                <transition name="fade">
                    <div
                        v-if="packages.length > 0"
                        class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                    >
                        <table class="w-full whitespace-nowrap">
                            <tr class="text-left font-bold">
                                <th class="px-3 py-3">Package Name</th>
                            </tr>
                            <tr
                                v-for="pkg in packages"
                                :key="pkg.id"
                                class="hover:bg-gray-100 focus-within:bg-gray-100"
                            >
                                <td
                                    class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                >
                                    {{ pkg.name }}
                                </td>
                                <td
                                    class="border-t w-px md:table-cell hidden pr-3"
                                >
                                    <breeze-button
                                        @click="selectPackage(pkg)"
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
                        v-if="pkg"
                        class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                    >
                        <table class="w-full whitespace-nowrap">
                            <tr class="text-left font-bold">
                                <th class="px-3 py-3">
                                    Selected Package Name
                                </th>
                            </tr>
                            <tr
                                class="hover:bg-gray-100 focus-within:bg-gray-100"
                            >
                                <td
                                    class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                >
                                    {{ pkg.name }}
                                </td>
                                <td
                                    class="border-t w-px md:table-cell hidden pr-3"
                                >
                                    <breeze-button
                                        @click="clearPackage()"
                                        type="button"
                                    >
                                        <i class="fas fa-times"></i>
                                    </breeze-button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </transition>
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
        const formCar = useForm({
            plate_no: null,
            brand: null,
            model: null,
            color: null,
            size: "",
            customer_id: null
        });

        const formCustomer = useForm({
            name: null,
            phone_no: null,
            gender: "",
            car_id: null
        });

        return { formCar, formCustomer };
    },

    data() {
        return {
            stepper: {
                stepOne: true,
                stepTwo: false,
                stepThree: false,
                stepFour: false
            },
            formPackage: {
                query: null
            },
            packages: [],
            pkg: null
        };
    },

    watch: {
        formPackage: {
            deep: true,
            handler: throttle(function() {
                if (this.formPackage.query && this.formPackage.query != "") {
                    axios
                        .get(route("packages.search"), {
                            params: {
                                query: this.formPackage.query
                            }
                        })
                        .then(response => {
                            this.packages = response.data;
                        });
                } else {
                    this.packages = [];
                }
            }, 150)
        }
    },

    methods: {
        stepOne() {
            this.stepper.stepOne = true;
            this.stepper.stepTwo = false;
            this.stepper.stepThree = false;
            this.stepper.stepFour = false;
        },
        stepTwo() {
            this.stepper.stepOne = false;
            this.stepper.stepTwo = true;
            this.stepper.stepThree = false;
            this.stepper.stepFour = false;
        },
        stepThree() {
            this.stepper.stepOne = false;
            this.stepper.stepTwo = false;
            this.stepper.stepThree = true;
            this.stepper.stepFour = false;
        },
        stepFour() {
            this.stepper.stepOne = false;
            this.stepper.stepTwo = false;
            this.stepper.stepThree = false;
            this.stepper.stepFour = true;
        },
        selectPackage(pkg) {
            this.pkg = pkg;
            this.formPackage.query = "";
            this.packages = [];
        },
        clearPackage() {
            this.pkg = null;
        }
    }
};
</script>
