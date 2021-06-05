<template>
    <breeze-authenticated-layout>
        <template #title>
            - Create Crew
        </template>
        <template #header>
            <inertia-link
                :href="route('crews.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Add new crew
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('crews.index')" :active="false">
                Crews
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Crew
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="submit">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showGeneral()"
                                :class="activeGeneral ? 'active' : ''"
                                >General</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showCareer()"
                                :class="activeCareer ? 'active' : ''"
                                >Career</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showPrivate()"
                                :class="activePrivate ? 'active' : ''"
                                >Private</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showHealth()"
                                :class="activeHealth ? 'active' : ''"
                                >Health</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showOther()"
                                :class="activeOther ? 'active' : ''"
                                >Other</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showEmergency()"
                                :class="activeEmergency ? 'active' : ''"
                                >Emergency</span
                            >
                        </li>
                    </ul>

                    <breeze-general
                        v-show="activeGeneral"
                        :form="form"
                    ></breeze-general>
                    <div
                        v-show="activeGeneral"
                        class="mt-3 p-6 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            type="button"
                            class="ml-auto"
                            @click="showCareer()"
                        >
                            Next
                        </breeze-button>
                    </div>

                    <breeze-career
                        v-show="activeCareer"
                        :form="form"
                        :stores="stores"
                        :roles="roles"
                    ></breeze-career>
                    <div
                        v-show="activeCareer"
                        class="mt-3 p-6 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button type="button" @click="showGeneral()">
                            Back
                        </breeze-button>
                        <breeze-button
                            type="button"
                            class="ml-auto"
                            @click="showPrivate()"
                        >
                            Next
                        </breeze-button>
                    </div>

                    <breeze-private
                        v-show="activePrivate"
                        :form="form"
                    ></breeze-private>
                    <div
                        v-show="activePrivate"
                        class="mt-3 p-6 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button type="button" @click="showCareer()">
                            Back
                        </breeze-button>
                        <breeze-button
                            type="button"
                            class="ml-auto"
                            @click="showHealth()"
                        >
                            Next
                        </breeze-button>
                    </div>

                    <breeze-health
                        v-show="activeHealth"
                        :form="form"
                        @selectHealth="selectHealth($event)"
                        @removeHealth="removeHealth($event)"
                    ></breeze-health>
                    <div
                        v-show="activeHealth"
                        class="mt-3 p-6 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button type="button" @click="showPrivate()">
                            Back
                        </breeze-button>
                        <breeze-button
                            type="button"
                            class="ml-auto"
                            @click="showOther()"
                        >
                            Next
                        </breeze-button>
                    </div>

                    <breeze-other
                        v-show="activeOther"
                        :form="form"
                    ></breeze-other>
                    <div
                        v-show="activeOther"
                        class="mt-3 p-6 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button type="button" @click="showHealth()">
                            Back
                        </breeze-button>
                        <breeze-button
                            type="button"
                            class="ml-auto"
                            @click="showEmergency()"
                        >
                            Next
                        </breeze-button>
                    </div>

                    <breeze-emergency
                        v-show="activeEmergency"
                        :form="form"
                    ></breeze-emergency>
                    <div
                        v-show="activeEmergency"
                        class="mt-3 p-6 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button type="button" @click="showOther()">
                            Back
                        </breeze-button>
                        <breeze-button
                            class="ml-auto"
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
import BreezeGeneral from "@/Components/Crew/General";
import BreezeCareer from "@/Components/Crew/Career";
import BreezePrivate from "@/Components/Crew/Private";
import BreezeHealth from "@/Components/Crew/Health";
import BreezeEmergency from "@/Components/Crew/Emergency";
import BreezeOther from "@/Components/Crew/Other";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeGeneral,
        BreezeCareer,
        BreezePrivate,
        BreezeHealth,
        BreezeEmergency,
        BreezeOther
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        stores: Object,
        roles: Object
    },

    data() {
        return {
            activeGeneral: true,
            activeCareer: false,
            activePrivate: false,
            activeHealth: false,
            activeOther: false,
            activeEmergency: false
        };
    },

    setup() {
        const form = useForm({
            name: null,
            phone_no: null,
            email: null,
            role_id: "",
            store_id: "",
            password: null,
            password_confirmation: null,
            enrolled_at: null,
            resigned_at: null,
            address: null,
            ic_no: null,
            bank: null,
            acc_no: null,
            oku_card: "",
            emergency_name_1: null,
            emergency_phone_no_1: null,
            emergency_relation_1: null,
            emergency_name_2: null,
            emergency_phone_no_2: null,
            emergency_relation_2: null,
            status: "",
            shirt_size: "",
            motor_license: "",
            car_license: "",
            healths_id: []
        });

        return { form };
    },

    methods: {
        submit() {
            this.form.post(route("crews.store"), {
                onSuccess: () =>
                    this.form.reset("password", "password_confirmation")
            });
        },
        showGeneral() {
            this.activeGeneral = true;
            this.activeCareer = false;
            this.activePrivate = false;
            this.activeHealth = false;
            this.activeOther = false;
            this.activeEmergency = false;
        },
        showCareer() {
            this.activeGeneral = false;
            this.activeCareer = true;
            this.activePrivate = false;
            this.activeHealth = false;
            this.activeOther = false;
            this.activeEmergency = false;
        },
        showPrivate() {
            this.activeGeneral = false;
            this.activeCareer = false;
            this.activePrivate = true;
            this.activeHealth = false;
            this.activeOther = false;
            this.activeEmergency = false;
        },
        showHealth() {
            this.activeGeneral = false;
            this.activeCareer = false;
            this.activePrivate = false;
            this.activeHealth = true;
            this.activeOther = false;
            this.activeEmergency = false;
        },
        showOther() {
            this.activeGeneral = false;
            this.activeCareer = false;
            this.activePrivate = false;
            this.activeHealth = false;
            this.activeOther = true;
            this.activeEmergency = false;
        },
        showEmergency() {
            this.activeGeneral = false;
            this.activeCareer = false;
            this.activePrivate = false;
            this.activeHealth = false;
            this.activeOther = false;
            this.activeEmergency = true;
        },
        selectHealth(data) {
            this.form.healths_id.push(data.id);
        },
        removeHealth(data) {
            this.form.healths_id.splice(data, 1);
        }
    }
};
</script>
