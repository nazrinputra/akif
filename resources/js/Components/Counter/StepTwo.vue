<template>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <span
                    class="nav-link cursor-pointer"
                    @click="showService()"
                    :class="activeService ? 'active' : ''"
                    >Services</span
                >
            </li>
            <li class="nav-item">
                <span
                    class="nav-link cursor-pointer"
                    @click="showPackage()"
                    :class="activePackage ? 'active' : ''"
                    >Packages</span
                >
            </li>
        </ul>

        <div class="p-3" v-show="activePackage">
            <div v-if="!pkg" class="input-group">
                <input
                    type="text"
                    id="searchPackage"
                    placeholder="Search package..."
                    class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="form.package"
                />
            </div>

            <div
                v-if="!form.package && packages.length == 0 && !pkg"
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                Start typing to search for packages.
                <span
                    @click="viewAllPackages"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    View all?
                </span>
            </div>

            <div
                v-if="form.package && packages.length == 0"
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                Oops, we could not find any matching packages.
                <span
                    @click="viewAllPackages"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    View all?
                </span>
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
                            <td class="border-t w-px md:table-cell hidden pr-3">
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
                        <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                            <td
                                class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                            >
                                {{ pkg.name }}
                            </td>
                            <td class="border-t w-px md:table-cell hidden pr-3">
                                <breeze-button
                                    @click="clearPackage()"
                                    type="button"
                                >
                                    <i class="fas fa-times"></i>
                                </breeze-button>
                            </td>
                        </tr>
                    </table>

                    <div class="px-3" v-if="pkg.custom_price">
                        <label
                            v-if="!form.pkg_custom_price"
                            for="pkg_custom_price"
                            class="text-sm text-red-500"
                            ><i class="fas fa-exclamation-triangle"></i> This
                            package requires a custom price input.</label
                        >
                        <label
                            v-if="form.pkg_custom_price"
                            for="pkg_custom_price"
                            class="text-sm"
                            >Custom Price</label
                        >
                        <input
                            type="number"
                            placeholder="Custom Price"
                            id="pkg_custom_price"
                            step=".05"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.pkg_custom_price
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.pkg_custom_price"
                            @keydown="form.clearErrors('pkg_custom_price')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.pkg_custom_price
                        }}</span>
                    </div>
                </div>
            </transition>
        </div>

        <div class="p-3" v-show="activeService">
            <div class="input-group">
                <input
                    type="text"
                    id="searchService"
                    placeholder="Search service..."
                    class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="form.service"
                />
            </div>

            <div
                v-if="
                    !form.service &&
                        services.length == 0 &&
                        selectedServices.length == 0
                "
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                Start typing to search for services.
                <span
                    @click="viewAllServices"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    View all?
                </span>
            </div>

            <div
                v-if="form.service && services.length == 0"
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                Oops, we could not find any matching services.
                <span
                    @click="viewAllServices"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    View all?
                </span>
            </div>

            <transition name="fade">
                <div
                    v-if="services.length > 0"
                    class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                >
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="px-3 py-3">Service Name</th>
                        </tr>
                        <tr
                            v-for="service in services"
                            :key="service.id"
                            class="hover:bg-gray-100 focus-within:bg-gray-100"
                        >
                            <td
                                class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                            >
                                {{ service.name }}
                            </td>
                            <td class="border-t w-px md:table-cell hidden pr-3">
                                <breeze-button
                                    v-if="
                                        !selectedServices.some(
                                            data => data.id === service.id
                                        )
                                    "
                                    type="button"
                                    @click="selectService(service)"
                                    tabindex="-1"
                                >
                                    <i class="fas fa-check"></i>
                                </breeze-button>
                            </td>
                        </tr>
                    </table>
                </div>
            </transition>

            <div
                v-if="selectedServices.length > 0"
                class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Selected Service Name</th>
                    </tr>
                    <tr
                        v-for="(service, index) in selectedServices"
                        :key="service.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td class="border-t">
                            <inertia-link
                                style="color: inherit; text-decoration: inherit;"
                                class="px-3 py-3 flex items-center focus:text-indigo-500"
                                :href="route('services.show', service)"
                            >
                                {{ service.name }}
                            </inertia-link>
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                type="button"
                                @click="removeService(index)"
                                tabindex="-1"
                            >
                                <i class="fas fa-times"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div
            class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
        >
            <breeze-button type="button" @click="back">
                Back
            </breeze-button>
            <breeze-button type="button" @click="next">
                Next
            </breeze-button>
        </div>
    </div>
</template>

<script>
import throttle from "lodash/throttle";
import BreezeButton from "@/Components/Button";

export default {
    components: {
        BreezeButton
    },

    props: ["form"],

    data() {
        return {
            packages: [],
            pkg: null,
            services: [],
            selectedServices: [],
            activePackage: false,
            activeService: true
        };
    },

    watch: {
        form: {
            deep: true,
            handler: throttle(function() {
                if (this.form.package && this.form.package != "") {
                    axios
                        .get(route("packages.search"), {
                            params: {
                                query: this.form.package
                            }
                        })
                        .then(response => {
                            this.packages = response.data;
                        });
                }
                if (!this.form.package || this.form.package == "") {
                    this.packages = [];
                }
                if (this.form.service && this.form.service != "") {
                    axios
                        .get(route("services.search"), {
                            params: {
                                query: this.form.service
                            }
                        })
                        .then(response => {
                            this.services = response.data;
                        });
                }
                if (!this.form.service || this.form.service == "") {
                    this.services = [];
                }
            }, 150)
        }
    },

    methods: {
        selectPackage(pkg) {
            this.pkg = pkg;
            this.form.package = null;
            this.packages = [];
            this.$emit("selectPackage", this.pkg);
        },
        clearPackage() {
            this.pkg = null;
            this.$emit("clearPackage");
        },
        back() {
            this.$emit("back");
        },
        next() {
            this.$emit("next");
        },
        viewAllPackages() {
            axios.get(route("packages.all")).then(response => {
                this.packages = response.data;
            });
        },
        viewAllServices() {
            axios.get(route("services.all")).then(response => {
                this.services = response.data;
            });
        },
        selectService(service) {
            this.form.service = null;
            this.services = [];
            this.selectedServices.push(service);
            this.$emit("selectService", service);
        },
        removeService(index) {
            this.selectedServices.splice(index, 1);
            this.$emit("removeService", index);
        },
        showPackage() {
            this.activePackage = true;
            this.activeService = false;
        },
        showService() {
            this.activePackage = false;
            this.activeService = true;
        }
    }
};
</script>
