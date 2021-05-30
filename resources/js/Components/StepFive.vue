<template>
    <div class="container">
        <div v-if="!car" class="p-3">
            <div
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <i class="fas fa-exclamation-triangle"></i> It looks like you
                have not selected any car.
                <span
                    @click="editCar()"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    Select car?
                </span>
            </div>
        </div>

        <div v-if="car" class="p-3">
            <div
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
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
                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ car.model }}
                        </td>
                        <td class="border-t px-3 focus:text-indigo-500">
                            {{ car.plate_no }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button type="button" @click="editCar()">
                                <i class="fas fa-pen"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div v-if="!customer" class="p-3">
            <div
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <i class="fas fa-exclamation-triangle"></i> It looks like you
                have not selected any customer.
                <span
                    @click="editCustomer()"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    Select customer?
                </span>
            </div>
        </div>

        <div v-if="customer" class="p-3">
            <div
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">
                            Selected Customer Name
                        </th>
                    </tr>
                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ customer.name }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                type="button"
                                @click="editCustomer()"
                            >
                                <i class="fas fa-pen"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div v-if="!product" class="p-3">
            <div
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <i class="fas fa-exclamation-triangle"></i> You have to choose
                either a package or at least one service. Choose
                <span
                    @click="editPackage()"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    package
                </span>
                or
                <span
                    @click="editService()"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    service
                </span>
            </div>
        </div>

        <div v-if="pkg" class="p-3">
            <div
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
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
                            <breeze-button @click="editPackage()" type="button">
                                <i class="fas fa-pen"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div v-if="services.length > 0" class="p-3">
            <div
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Selected Service Name</th>
                    </tr>
                    <tr
                        v-for="service in services"
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
                                @click="editService()"
                                tabindex="-1"
                            >
                                <i class="fas fa-pen"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mb-3 p-3">
            <label for="remarks">Remarks</label>
            <textarea
                rows="7"
                id="remarks"
                placeholder="Remarks"
                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="remarks"
            />
        </div>

        <div
            class="p-3 bg-gray-50 border-t border-gray-100 row justify-between"
        >
            <breeze-button type="button" @click="back">
                Back
            </breeze-button>
            <breeze-button
                type="button"
                @click="submit"
                :disabled="!car || !customer || !product"
            >
                Submit
            </breeze-button>
        </div>
    </div>
</template>

<script>
import BreezeButton from "@/Components/Button";

export default {
    components: {
        BreezeButton
    },

    props: ["car", "customer", "pkg", "services"],

    data() {
        return {
            remarks: null
        };
    },

    computed: {
        product: function() {
            if (this.pkg || this.services.length > 0) {
                return true;
            } else {
                return false;
            }
        }
    },

    methods: {
        back() {
            this.$emit("back");
        },
        next() {
            this.$emit("next");
        },
        editCar() {
            this.$emit("editCar");
        },
        editCustomer() {
            this.$emit("editCustomer");
        },
        editPackage() {
            this.$emit("editPackage");
        },
        editService() {
            this.$emit("editService");
        },
        submit() {
            let pkg_id,
                remarks = null;

            if (this.pkg) {
                pkg_id = this.pkg.id;
            }

            this.$inertia.post(route("queues.store"), {
                car_id: this.car.id,
                customer_id: this.customer.id,
                package_id: pkg_id,
                services_id: this.services.map(service => service.id),
                remarks: this.remarks
            });
        }
    }
};
</script>
