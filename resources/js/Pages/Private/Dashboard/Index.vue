<template>
    <breeze-authenticated-layout>
        <template #title>
            - Dashboard
        </template>
        <template #header>
            <inertia-link
                v-if="hasAnyPermission(['edit queues'])"
                :href="route('queues.manage')"
                class="btn btn-secondary align-self-end"
            >
                Queues
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Akif Car Grooming Center
            </h6>
            <inertia-link
                v-if="hasAnyPermission(['create queues'])"
                :href="route('counter')"
                class="btn btn-secondary align-self-end"
            >
                Counter
            </inertia-link>
        </template>

        <!-- Welcome for supported devices -->
        <div
            class="hidden sm:flex px-6 py-6 mb-3 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div
                class="container bg-opacity-10 bg-no-repeat bg-right bg-contain"
                style="background-image: url('/img/car-wash.png')"
            >
                <div class="row">
                    <h2 class="text-secondary text-6xl font-sans mr-3 my-auto">
                        Welcome,<br />
                        <span class="text-primary text-4xl font-sans my-auto">{{
                            $page.props.auth.user.name
                        }}</span>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Welcome for unsupported devices -->
        <div
            class="flex sm:hidden p-6 mb-3 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="row p-6 justify-content-center">
                <h2 class="text-secondary text-3xl font-sans mr-3 my-auto">
                    Welcome,
                    <span class="text-primary text-xl font-sans my-auto">{{
                        $page.props.auth.user.name
                    }}</span>
                </h2>
            </div>
        </div>

        <div
            class="p-6 mb-3 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            v-if="hasAnyPermission(['view customers', 'view queues'])"
        >
            <div class="container">
                <div class="row">
                    <inertia-link
                        :href="route('customers.index')"
                        class="col-md-3"
                        v-if="hasAnyPermission(['view customers'])"
                    >
                        <div class="card-counter primary">
                            <i class="fas fa-users"></i>
                            <span class="count-numbers">{{ customers }}</span>
                            <span class="count-name">Total Customers</span>
                        </div>
                    </inertia-link>

                    <inertia-link
                        :href="route('monthly')"
                        class="col-md-3"
                        v-if="hasAnyPermission(['view queues'])"
                    >
                        <div class="card-counter danger">
                            <i class="fas fa-house-user"></i>
                            <span class="count-numbers">{{ monthly }}</span>
                            <span class="count-name">Unique Visits</span>
                        </div>
                    </inertia-link>

                    <inertia-link
                        :href="route('fresh')"
                        class="col-md-3"
                        v-if="hasAnyPermission(['view customers'])"
                    >
                        <div class="card-counter success">
                            <i class="fas fa-user-plus"></i>
                            <span class="count-numbers">{{ fresh }}</span>
                            <span class="count-name">New Customers</span>
                        </div>
                    </inertia-link>

                    <inertia-link
                        :href="route('stale')"
                        class="col-md-3"
                        v-if="hasAnyPermission(['view customers'])"
                    >
                        <div class="card-counter info">
                            <i class="fas fa-address-book"></i>
                            <span class="count-numbers">{{ stale }}</span>
                            <span class="count-name">Old Customers</span>
                        </div>
                    </inertia-link>
                </div>
            </div>
        </div>

        <div class="input-group" v-if="hasAnyPermission(['view cars'])">
            <input
                type="text"
                id="searchCar"
                placeholder="Search car..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formCar.query"
            />
        </div>

        <div
            class="p-6 mb-3 bg-white border-b border-gray-200 shadow sm:rounded-lg"
            v-if="hasAnyPermission(['view cars'])"
        >
            <div class="container">
                <div class="mt-3">
                    <div v-if="!formCar.query && cars.length == 0" class="mb-3">
                        Start searching for a car or
                        <inertia-link
                            :href="route('cars.create')"
                            class="text-blue-500 text-decoration-none"
                            >create new</inertia-link
                        >
                    </div>

                    <div v-if="formCar.query && cars.length == 0" class="mb-3">
                        Oops, we could not find any matching cars.
                        <inertia-link
                            :href="route('cars.create')"
                            class="text-blue-500 text-decoration-none"
                            >Create new?</inertia-link
                        >
                    </div>

                    <transition name="fade">
                        <div v-if="cars.length > 0" class="mb-3">
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
                                        <inertia-link
                                            :href="route('cars.show', car)"
                                            class="btn btn-secondary"
                                        >
                                            <i class="fas fa-eye"></i
                                        ></inertia-link>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </transition>
                </div>
            </div>
        </div>

        <breeze-announcement
            class="alert-danger fixed-top"
            v-if="$page.props.auth.can.length == 0"
        >
            <i class="fas fa-exclamation-triangle my-auto mx-3"></i> You have no
            permissions currently. If you believe this was a mistake, please
            contact the system administrator.
            <i class="fas fa-exclamation-triangle my-auto mx-3"></i>
        </breeze-announcement>

        <div
            v-if="$page.props.auth.can.length == 0"
            class="hidden sm:block p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg text-center"
        >
            <span class="col"
                ><i class="fas fa-info-circle my-auto mx-3"></i> You can always
                update your profile even without any permissions to use the
                system. <i class="fas fa-info-circle my-auto mx-3"></i
            ></span>

            <div class="container text-left mt-3">
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
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";
import BreezeButton from "@/Components/Button";
import BreezeAnnouncement from "@/Components/Announcement";
import BreezeGeneral from "@/Components/Crew/General";
import BreezeCareer from "@/Components/Crew/Career";
import BreezePrivate from "@/Components/Crew/Private";
import BreezeHealth from "@/Components/Crew/Health";
import BreezeEmergency from "@/Components/Crew/Emergency";
import BreezeOther from "@/Components/Crew/Other";
import throttle from "lodash/throttle";
import moment from "moment-timezone";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeButton,
        BreezeAnnouncement,
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
        customers: Number,
        monthly: Number,
        fresh: Number,
        stale: Number,
        healths: Object
    },

    data() {
        return {
            formCar: {
                query: null
            },
            cars: [],
            car: null,

            activeGeneral: true,
            activeCareer: false,
            activePrivate: false,
            activeHealth: false,
            activeOther: false,
            activeEmergency: false
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

<style>
.card-counter {
    box-shadow: 2px 2px 10px #dadada;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: 0.3s linear all;
}

.card-counter:hover {
    box-shadow: 4px 4px 20px #dadada;
    transition: 0.3s linear all;
}

.card-counter.primary {
    background-color: #007bff;
    color: #fff;
}

.card-counter.danger {
    background-color: #ef5350;
    color: #fff;
}

.card-counter.success {
    background-color: #66bb6a;
    color: #fff;
}

.card-counter.info {
    background-color: #26c6da;
    color: #fff;
}

.card-counter i {
    font-size: 5em;
    opacity: 0.2;
}

.card-counter .count-numbers {
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
}

.card-counter .count-name {
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
}
</style>
