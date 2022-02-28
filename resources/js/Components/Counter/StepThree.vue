<template>
    <div class="container">
        <div v-if="!checkCustomer" class="p-3 text-red-500">
            <div
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <i class="fas fa-exclamation-triangle"></i> It looks like you
                have not provided any customer.
                <span
                    @click="editStepOne()"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    Input customer?
                </span>
            </div>
        </div>

        <div
            v-if="!customer && checkCustomer"
            class="p-6 mx-3 mb-3 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="p-3">
                <label for="name">Name</label>
                <input
                    type="text"
                    placeholder="Name"
                    id="name"
                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    :value="form.name"
                    disabled
                />
            </div>
            <div class="mt-3 p-3">
                <label for="phone_no">Phone No</label>
                <input
                    type="number"
                    placeholder="Phone No"
                    id="phone_no"
                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    :value="form.phone_no"
                    disabled
                />
            </div>
        </div>

        <div v-if="customer" class="p-3">
            <div
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Selected Customer Name</th>
                    </tr>
                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ customer.name }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button type="button" @click="editStepOne()">
                                <i class="fas fa-pen"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div v-if="!checkCar" class="p-3 text-red-500">
            <div
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <i class="fas fa-exclamation-triangle"></i> It looks like you
                have not provided any car.
                <span
                    @click="editStepOne()"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    Input car?
                </span>
            </div>
        </div>

        <div v-if="car" class="p-3">
            <div
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Selected Car Model</th>
                        <th class="px-3 py-3">Selected Car Plate No</th>
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
                            <breeze-button type="button" @click="editStepOne()">
                                <i class="fas fa-pen"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div
            v-if="!car && checkCar"
            class="p-6 mx-3 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="p-3">
                <label for="plate_no">Plate No</label>
                <input
                    type="text"
                    placeholder="Plate No"
                    id="plate_no"
                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    :value="form.plate_no"
                    disabled
                />
            </div>

            <div class="mt-3 p-3">
                <label for="model">Model</label>
                <input
                    type="text"
                    placeholder="Model"
                    id="model"
                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    :value="form.model"
                    disabled
                />
            </div>
            <div class="mt-3 p-3">
                <label for="size">Size</label>
                <input
                    type="text"
                    placeholder="Size"
                    id="size"
                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    :value="form.size"
                    disabled
                />
            </div>
        </div>

        <div v-if="!product" class="p-3 text-red-500">
            <div
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <i class="fas fa-exclamation-triangle"></i> You have to
                <span
                    @click="back()"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                    >choose either a package or at least one service.
                </span>
            </div>
        </div>

        <div v-if="pkg" class="p-3">
            <div
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Selected Package Name</th>
                    </tr>
                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ pkg.name }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button @click="back()" type="button">
                                <i class="fas fa-pen"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>

                <span
                    v-if="product && services.length == 0"
                    class="p-3 text-xs"
                >
                    No service selected.
                    <span
                        @click="back()"
                        class="text-blue-500 text-decoration-none cursor-pointer"
                        >Would you like to add one?</span
                    >
                </span>
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
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ service.name }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                type="button"
                                @click="back()"
                                tabindex="-1"
                            >
                                <i class="fas fa-pen"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>

                <span v-if="product && !pkg" class="p-3 text-xs">
                    No package selected.
                    <span
                        @click="back()"
                        class="text-blue-500 text-decoration-none cursor-pointer"
                        >Would you like to add one?</span
                    >
                </span>
            </div>
        </div>

        <div v-if="personality" class="p-3">
            <div
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Selected Personality Name</th>
                    </tr>
                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ personality.name }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button type="button" @click="editStepOne()">
                                <i class="fas fa-pen"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mb-3 p-3" v-if="checkStepOne && checkStepTwo">
            <label for="remarks">Remarks</label>
            <textarea
                rows="7"
                id="remarks"
                placeholder="Remarks"
                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="form.remarks"
            />
        </div>

        <div
            class="p-3 bg-gray-50 border-t border-gray-100 row justify-between"
        >
            <breeze-button type="button" @click="back"> Back </breeze-button>
            <breeze-button
                type="button"
                @click="submit"
                :class="{
                    'opacity-25': form.processing,
                }"
                :disabled="form.processing || !checkStepOne || !checkStepTwo"
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
        BreezeButton,
    },

    props: [
        "form",
        "car",
        "customer",
        "personality",
        "pkg",
        "services",
        "checkCar",
        "checkCustomer",
        "checkService",
        "checkStepOne",
        "checkStepTwo",
    ],

    computed: {
        product() {
            if (this.pkg || this.services.length > 0) {
                return true;
            } else {
                return false;
            }
        },
    },

    methods: {
        back() {
            this.$emit("back");
        },
        next() {
            this.$emit("next");
        },
        editStepOne() {
            this.$emit("editStepOne");
        },
        submit() {
            this.$emit("submit");
        },
    },
};
</script>
