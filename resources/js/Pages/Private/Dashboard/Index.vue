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

        <div
            class="p-6 mb-3 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            v-if="hasAnyPermission(['view report'])"
        >
            <div class="p-3">
                <img
                    class="img-fluid w-40 h-40 py-20"
                    src="\fonts\vendor\@fortawesome\fontawesome-free\tools.svg"
                />
                <h4 class="text-center">report coming soon</h4>
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
                <breeze-profile
                    :user="auth.user"
                    :stores="stores"
                    :roles="roles"
                    :healths="healths"
                />
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
import BreezeProfile from "@/Components/Profile/Form";
import throttle from "lodash/throttle";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeButton,
        BreezeAnnouncement,
        BreezeProfile
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        customers: Number,
        monthly: Number,
        fresh: Number,
        stale: Number,
        stores: Object,
        roles: Object,
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
    }
};
</script>
