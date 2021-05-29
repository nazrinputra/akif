<template>
    <div class="container">
        <div class="p-3">
            <div
                v-if="car"
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
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

        <div class="p-3">
            <div
                v-if="customer"
                class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
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

        <div class="p-3">
            <div
                v-if="pkg"
                class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
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

        <div
            class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
        >
            <breeze-button type="button" @click="back">
                Back
            </breeze-button>
            <breeze-button type="button" @click="submit">
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

    props: ["car", "customer", "pkg"],

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
        submit() {
            this.$inertia.post(route("queues.store"), {
                car_id: this.car.id,
                customer_id: this.customer.id,
                package_id: this.pkg.id
            });
        }
    }
};
</script>
