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
                Register new queue.
            </h6>
            <inertia-link
                v-if="hasAnyPermission(['edit queues'])"
                :href="route('queues.manage')"
                class="btn btn-secondary"
            >
                <i class="fas fa-clipboard-list"></i>
            </inertia-link>
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
                    :class="show.stepOne ? 'active' : ''"
                    @click="stepOne"
                >
                    <div class="md-step-circle">
                        <span v-if="!checkStepOne">1</span>
                        <span v-if="checkStepOne"
                            ><i class="fas fa-check"></i
                        ></span>
                    </div>
                    <div class="md-step-title">Customer</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <div
                    class="md-step cursor-pointer"
                    :class="show.stepTwo ? 'active' : ''"
                    @click="stepTwo"
                >
                    <div class="md-step-circle">
                        <span v-if="!checkStepTwo">2</span>
                        <span v-if="checkStepTwo"
                            ><i class="fas fa-check"></i
                        ></span>
                    </div>
                    <div class="md-step-title">Product</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <div
                    class="md-step cursor-pointer"
                    :class="show.stepThree ? 'active' : ''"
                    @click="stepThree"
                >
                    <div class="md-step-circle">
                        <span v-if="!checkStepOne || !checkStepTwo">3</span>
                        <span v-if="checkStepOne && checkStepTwo"
                            ><i class="fas fa-check"></i
                        ></span>
                    </div>
                    <div class="md-step-title">Review</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
            </div>

            <breeze-step-one
                v-show="show.stepOne"
                :form="form"
                @next="stepTwo()"
                @selectCar="selectCar($event)"
                @clearCar="clearCar()"
                @selectCustomer="selectCustomer($event)"
                @clearCustomer="clearCustomer()"
                @selectPersonality="selectPersonality($event)"
                @clearPersonality="clearPersonality()"
            />

            <breeze-step-two
                v-show="show.stepTwo"
                :form="form"
                @back="stepOne()"
                @next="stepThree()"
                @selectPackage="selectPackage($event)"
                @clearPackage="clearPackage()"
                @selectService="selectService($event)"
                @removeService="removeService($event)"
            />

            <breeze-step-three
                v-show="show.stepThree"
                :car="car"
                :customer="customer"
                :personality="personality"
                :pkg="pkg"
                :services="services"
                :form="form"
                @back="stepTwo()"
                @editStepOne="stepOne()"
                @submit="form.post(route('queues.store'))"
            />
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezeStepOne from "@/Components/Counter/StepOne";
import BreezeStepTwo from "@/Components/Counter/StepTwo";
import BreezeStepThree from "@/Components/Counter/StepThree";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeStepOne,
        BreezeStepTwo,
        BreezeStepThree
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object
    },

    setup() {
        const form = useForm({
            car_id: null,
            customer_id: null,
            personality_id: null,
            package_id: null,
            services_id: [],
            plate_no: null,
            model: null,
            size: "",
            name: null,
            phone_no: null,
            package: null,
            service: null,
            remarks: null
        });

        return { form };
    },

    computed: {
        checkStepOne() {
            if (this.checkCar() && this.checkCustomer()) {
                return true;
            } else {
                return false;
            }
        },
        checkStepTwo() {
            if (this.checkPackage() || this.checkService()) {
                return true;
            } else {
                return false;
            }
        }
    },

    data() {
        return {
            show: {
                stepOne: true,
                stepTwo: false,
                stepThree: false
            },
            car: null,
            customer: null,
            personality: null,
            pkg: null,
            services: []
        };
    },

    methods: {
        stepOne() {
            this.show.stepOne = true;
            this.show.stepTwo = false;
            this.show.stepThree = false;
        },
        stepTwo() {
            this.show.stepOne = false;
            this.show.stepTwo = true;
            this.show.stepThree = false;
        },
        stepThree() {
            this.show.stepOne = false;
            this.show.stepTwo = false;
            this.show.stepThree = true;
        },
        selectCar(data) {
            this.car = data;
            this.form.car_id = data.id;
            this.form.model = null;
            this.form.size = "";
        },
        clearCar() {
            this.car = null;
            this.form.car_id = null;
        },
        selectPersonality(data) {
            this.personality = data;
            this.form.personality_id = data.id;
        },
        clearPersonality() {
            this.personality = null;
            this.form.personality_id = null;
        },
        selectCustomer(data) {
            this.customer = data;
            this.form.customer_id = data.id;
            this.form.phone_no = null;
        },
        clearCustomer() {
            this.customer = null;
            this.form.customer_id = null;
        },
        selectPackage(data) {
            this.pkg = data;
            this.form.package_id = data.id;
        },
        clearPackage() {
            this.pkg = null;
            this.form.package_id = null;
        },
        selectService(data) {
            this.services.push(data);
            this.form.services_id.push(data.id);
        },
        removeService(data) {
            this.services.splice(data, 1);
            this.form.services_id.splice(data, 1);
        },
        checkCar() {
            if (this.car) {
                return true;
            } else if (
                this.form.plate_no &&
                this.form.model &&
                this.form.size != ""
            ) {
                return true;
            } else {
                return false;
            }
        },
        checkCustomer() {
            if (this.customer) {
                return true;
            } else if (this.form.name && this.form.phone_no) {
                return true;
            } else {
                return false;
            }
        },
        checkPackage() {
            if (this.pkg) {
                return true;
            } else {
                return false;
            }
        },
        checkService() {
            if (this.services.length > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
};
</script>
