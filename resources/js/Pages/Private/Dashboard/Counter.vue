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
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";

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

    data() {
        return {
            stepper: {
                stepOne: true,
                stepTwo: false,
                stepThree: false,
                stepFour: false
            }
        };
    },

    methods: {
        stepOne() {
            this.stepper.stepTwo = false;
            this.stepper.stepThree = false;
            this.stepper.stepFour = false;
        },
        stepTwo() {
            this.stepper.stepOne = true;
            this.stepper.stepTwo = true;
            this.stepper.stepThree = false;
            this.stepper.stepFour = false;
        },
        stepThree() {
            this.stepper.stepOne = true;
            this.stepper.stepTwo = true;
            this.stepper.stepThree = true;
            this.stepper.stepFour = false;
        },
        stepFour() {
            this.stepper.stepOne = true;
            this.stepper.stepTwo = true;
            this.stepper.stepThree = true;
            this.stepper.stepFour = true;
        }
    }
};
</script>

<style>
.md-stepper-horizontal {
    display: table;
    width: 100%;
    margin: 0 auto;
    background-color: #ffffff;
    box-shadow: 0 3px 8px -6px rgba(0, 0, 0, 0.5);
}
.md-stepper-horizontal .md-step {
    display: table-cell;
    position: relative;
    padding: 24px;
}
.md-stepper-horizontal .md-step:hover,
.md-stepper-horizontal .md-step:active {
    background-color: rgba(0, 0, 0, 0.04);
}
.md-stepper-horizontal .md-step:active {
    border-radius: 15% / 75%;
}
.md-stepper-horizontal .md-step:first-child:active {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.md-stepper-horizontal .md-step:last-child:active {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.md-stepper-horizontal .md-step:hover .md-step-circle {
    background-color: #757575;
}
.md-stepper-horizontal .md-step:first-child .md-step-bar-left,
.md-stepper-horizontal .md-step:last-child .md-step-bar-right {
    display: none;
}
.md-stepper-horizontal .md-step .md-step-circle {
    width: 30px;
    height: 30px;
    margin: 0 auto;
    background-color: #999999;
    border-radius: 50%;
    text-align: center;
    line-height: 30px;
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
}
.md-stepper-horizontal .md-step.active .md-step-circle {
    background-color: #6dbcdb;
}
.md-stepper-horizontal .md-step .md-step-title {
    margin-top: 16px;
    font-size: 16px;
    font-weight: 600;
}
.md-stepper-horizontal .md-step .md-step-title,
.md-stepper-horizontal .md-step .md-step-optional {
    text-align: center;
    color: rgba(0, 0, 0, 0.26);
}
.md-stepper-horizontal .md-step.active .md-step-title {
    font-weight: 600;
    color: rgba(0, 0, 0, 0.87);
}
.md-stepper-horizontal .md-step.active.done .md-step-title,
.md-stepper-horizontal .md-step.active.editable .md-step-title {
    font-weight: 600;
}
.md-stepper-horizontal .md-step .md-step-optional {
    font-size: 12px;
}
.md-stepper-horizontal .md-step.active .md-step-optional {
    color: rgba(0, 0, 0, 0.54);
}
.md-stepper-horizontal .md-step .md-step-bar-left,
.md-stepper-horizontal .md-step .md-step-bar-right {
    position: absolute;
    top: 36px;
    height: 1px;
    border-top: 1px solid #dddddd;
}
.md-stepper-horizontal .md-step .md-step-bar-right {
    right: 0;
    left: 50%;
    margin-left: 20px;
}
.md-stepper-horizontal .md-step .md-step-bar-left {
    left: 0;
    right: 50%;
    margin-right: 20px;
}
</style>
