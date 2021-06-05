<template>
    <breeze-authenticated-layout>
        <template #title>
            - Profile
        </template>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View logged in user profile.
            </h6>
        </template>
        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Profile
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

                    <breeze-career
                        v-show="activeCareer"
                        :form="form"
                        :stores="stores"
                        :roles="roles"
                    ></breeze-career>

                    <breeze-private
                        v-show="activePrivate"
                        :form="form"
                    ></breeze-private>

                    <breeze-health
                        v-show="activeHealth"
                        :form="form"
                        :currentHealths="healths"
                        @selectHealth="selectHealth($event)"
                        @removeHealth="removeHealth($event)"
                    ></breeze-health>
                    <breeze-emergency
                        v-show="activeEmergency"
                        :form="form"
                    ></breeze-emergency>
                    <breeze-other
                        v-show="activeOther"
                        :form="form"
                    ></breeze-other>
                    <div
                        class="mt-3 p-6 bg-gray-50 border-t border-gray-100 row justify-between"
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
import moment from "moment-timezone";
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
        roles: Object,
        healths: Object
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
            role_id: null,
            store_id: null,
            password: null,
            password_confirmation: null,
            enrolled_at: null,
            resigned_at: null,
            address: null,
            ic_no: null,
            bank: null,
            acc_no: null,
            oku_card: null,
            emergency_name_1: null,
            emergency_phone_no_1: null,
            emergency_relation_1: null,
            emergency_name_2: null,
            emergency_phone_no_2: null,
            emergency_relation_2: null,
            status: null,
            shirt_size: null,
            motor_license: null,
            car_license: null,
            healths_id: []
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.auth.user.name;
            this.form.phone_no = this.auth.user.phone_no;
            this.form.email = this.auth.user.email;
            this.form.store_id = this.auth.user.store_id;
            this.form.role_id = this.getRole();
            this.form.enrolled_at = this.readableForHumans(
                this.auth.user.enrolled_at
            );
            this.form.resigned_at = this.readableForHumans(
                this.auth.user.resigned_at
            );
            this.form.address = this.auth.user.address;
            this.form.ic_no = this.auth.user.ic_no;
            this.form.bank = this.auth.user.bank;
            this.form.acc_no = this.auth.user.acc_no;
            this.form.oku_card = this.auth.user.oku_card;
            this.form.emergency_name_1 = this.auth.user.emergency_name_1;
            this.form.emergency_phone_no_1 = this.auth.user.emergency_phone_no_1;
            this.form.emergency_relation_1 = this.auth.user.emergency_relation_1;
            this.form.emergency_name_2 = this.auth.user.emergency_name_2;
            this.form.emergency_phone_no_2 = this.auth.user.emergency_phone_no_2;
            this.form.emergency_relation_2 = this.auth.user.emergency_relation_2;
            this.form.status = this.auth.user.status;
            this.form.shirt_size = this.auth.user.shirt_size;
            this.form.motor_license = this.auth.user.motor_license;
            this.form.car_license = this.auth.user.car_license;
            this.form.healths_id = this.healths.map(x => x.id);
        },
        submit() {
            this.form.put(route("profiles.update"), {
                onSuccess: () =>
                    this.form.reset("password", "password_confirmation")
            });
        },
        getRole() {
            if (this.auth.user.roles[0]) {
                return this.auth.user.roles[0].id;
            } else {
                return "";
            }
        },
        readableForHumans(date) {
            return moment(date)
                .tz("Asia/Kuala_Lumpur")
                .format("YYYY-MM-DD");
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
