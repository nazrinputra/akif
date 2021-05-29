<template>
    <div class="container">
        <form @submit.prevent="submit">
            <div class="p-3">
                <label for="plate_no">Plate No</label>
                <input
                    type="text"
                    placeholder="Plate No"
                    id="plate_no"
                    class="w-full rounded-md shadow-sm"
                    :class="
                        formCar.errors.plate_no
                            ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                            : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                    "
                    v-model="formCar.plate_no"
                    @keydown="formCar.clearErrors('plate_no')"
                    required
                />
                <span class="text-red-700 mt-2 text-sm">{{
                    formCar.errors.plate_no
                }}</span>
            </div>
            <div class="mt-3 p-3">
                <label for="brand">Brand</label>
                <input
                    type="text"
                    placeholder="Brand"
                    id="brand"
                    class="w-full rounded-md shadow-sm"
                    :class="
                        formCar.errors.brand
                            ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                            : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                    "
                    v-model="formCar.brand"
                    @keydown="formCar.clearErrors('brand')"
                    required
                />
                <span class="text-red-700 mt-2 text-sm">{{
                    formCar.errors.brand
                }}</span>
            </div>
            <div class="mt-3 p-3">
                <label for="model">Model</label>
                <input
                    type="text"
                    placeholder="Model"
                    id="model"
                    class="w-full rounded-md shadow-sm"
                    :class="
                        formCar.errors.model
                            ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                            : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                    "
                    v-model="formCar.model"
                    @keydown="formCar.clearErrors('model')"
                    required
                />
                <span class="text-red-700 mt-2 text-sm">{{
                    formCar.errors.model
                }}</span>
            </div>
            <div class="mt-3 p-3">
                <label for="color">Color</label>
                <input
                    type="text"
                    placeholder="Color"
                    id="color"
                    class="w-full rounded-md shadow-sm"
                    :class="
                        formCar.errors.color
                            ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                            : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                    "
                    v-model="formCar.color"
                    @keydown="formCar.clearErrors('color')"
                    required
                />
                <span class="text-red-700 mt-2 text-sm">{{
                    formCar.errors.color
                }}</span>
            </div>
            <div class="mt-3 p-3">
                <label for="size">Size</label>
                <select
                    v-model="formCar.size"
                    @change="formCar.clearErrors('size')"
                    class="w-full rounded-md shadow-sm"
                    :class="
                        formCar.errors.size
                            ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                            : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                    "
                    required
                >
                    <option value="" disabled>Select Size</option>
                    <option value="S">Small</option>
                    <option value="M">Medium</option>
                    <option value="L">Large</option>
                    <option value="XL">Extra Large</option>
                </select>
                <span class="text-red-700 mt-2 text-sm">{{
                    formCar.errors.size
                }}</span>
            </div>

            <div
                class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
            >
                <inertia-link
                    :href="route('dashboard')"
                    class="btn btn-secondary"
                >
                    Cancel
                </inertia-link>
                <breeze-button type="button" @click="next">
                    Next
                </breeze-button>
            </div>
        </form>
    </div>
</template>

<script>
import BreezeButton from "@/Components/Button";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeButton
    },

    setup() {
        const formCar = useForm({
            plate_no: null,
            brand: null,
            model: null,
            color: null,
            size: "",
            completed: false
        });

        return { formCar };
    },

    methods: {
        next() {
            this.checkStepOne();
            this.$emit("next", this.formCar);
        },
        checkStepOne() {
            if (
                this.formCar.brand &&
                this.formCar.color &&
                this.formCar.model &&
                this.formCar.plate_no &&
                this.formCar.size != ""
            ) {
                this.formCar.completed = true;
            } else {
                this.formCar.completed = false;
            }
        }
    }
};
</script>
