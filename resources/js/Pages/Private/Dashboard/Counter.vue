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
                    :class="show.stepOne ? 'active' : ''"
                    @click="stepOne"
                >
                    <div class="md-step-circle">
                        <span v-if="!completed.stepOne">1</span>
                        <span v-if="completed.stepOne"
                            ><i class="fas fa-check"></i
                        ></span>
                    </div>
                    <div class="md-step-title">Car</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <div
                    class="md-step cursor-pointer"
                    :class="show.stepTwo ? 'active' : ''"
                    @click="stepTwo"
                >
                    <div class="md-step-circle">
                        <span v-if="!completed.stepTwo">2</span>
                        <span v-if="completed.stepTwo"
                            ><i class="fas fa-check"></i
                        ></span>
                    </div>
                    <div class="md-step-title">Customer</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <!-- FIXME package selction does not work -->
                <div
                    class="md-step cursor-pointer"
                    :class="show.stepThree ? 'active' : ''"
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
                    :class="show.stepFour ? 'active' : ''"
                    @click="stepFour"
                >
                    <div class="md-step-circle"><span>4</span></div>
                    <div class="md-step-title">Review</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
            </div>

            <breeze-step-one
                v-show="show.stepOne"
                @next="
                    stepTwo();
                    setCar($event);
                "
            />

            <breeze-step-two
                v-show="show.stepTwo"
                @back="stepOne"
                @next="
                    stepThree();
                    setCustomer($event);
                "
            />

            <breeze-step-three
                v-show="show.stepThree"
                @package-selected="package_id = $event"
                @back="stepTwo"
                @next="stepFour"
            />

            <breeze-step-four
                v-show="show.stepFour"
                @back="stepThree"
                @next="finalStep"
            />
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezeStepOne from "@/Components/StepOne";
import BreezeStepTwo from "@/Components/StepTwo";
import BreezeStepThree from "@/Components/StepThree";
import BreezeStepFour from "@/Components/StepFour";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeStepOne,
        BreezeStepTwo,
        BreezeStepThree,
        BreezeStepFour
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object
    },

    data() {
        return {
            show: {
                stepOne: true,
                stepTwo: false,
                stepThree: false,
                stepFour: false
            },
            completed: {
                stepOne: false,
                stepTwo: false,
                stepThree: false,
                stepFour: false
            },
            formCar: null,
            formCustomer: null,
            package_id: null
        };
    },

    methods: {
        stepOne() {
            this.show.stepOne = true;
            this.show.stepTwo = false;
            this.show.stepThree = false;
            this.show.stepFour = false;
        },
        stepTwo() {
            this.show.stepOne = false;
            this.show.stepTwo = true;
            this.show.stepThree = false;
            this.show.stepFour = false;
        },
        stepThree() {
            this.show.stepOne = false;
            this.show.stepTwo = false;
            this.show.stepThree = true;
            this.show.stepFour = false;
        },
        stepFour() {
            this.show.stepOne = false;
            this.show.stepTwo = false;
            this.show.stepThree = false;
            this.show.stepFour = true;
        },
        finalStep() {
            alert("Coming soon...");
            // this.formCar.post(route("cars.store"));
            // this.formCustomer.post(route("customers.store"));
            // TODO add counter.store route for all forms at once, make a single form for all items;
        },
        setCar(data) {
            this.formCar = data;
            this.completed.stepOne = data.completed;
        },
        setCustomer(data) {
            this.formCustomer = data;
            this.completed.stepTwo = data.completed;
        }
    }
};
</script>
