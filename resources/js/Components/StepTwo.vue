<template>
    <div class="container">
        <form @submit.prevent="submit">
            <div class="p-3">
                <label for="name">Name</label>
                <input
                    type="text"
                    placeholder="Name"
                    id="name"
                    class="w-full rounded-md shadow-sm"
                    :class="
                        formCustomer.errors.name
                            ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                            : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                    "
                    v-model="formCustomer.name"
                    @keydown="formCustomer.clearErrors('name')"
                    required
                />
                <span class="text-red-700 mt-2 text-sm">{{
                    formCustomer.errors.name
                }}</span>
            </div>
            <div class="mt-3 p-3">
                <label for="phone_no">Phone No</label>
                <input
                    type="number"
                    placeholder="Phone No"
                    id="phone_no"
                    class="w-full rounded-md shadow-sm"
                    :class="
                        formCustomer.errors.phone_no
                            ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                            : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                    "
                    v-model="formCustomer.phone_no"
                    @keydown="formCustomer.clearErrors('phone_no')"
                    required
                />
                <span class="text-red-700 mt-2 text-sm">{{
                    formCustomer.errors.phone_no
                }}</span>
            </div>
            <div class="mt-3 p-3">
                <label for="gender">Gender</label>
                <select
                    v-model="formCustomer.gender"
                    @change="formCustomer.clearErrors('gender')"
                    class="w-full rounded-md shadow-sm"
                    :class="
                        formCustomer.errors.gender
                            ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                            : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                    "
                    required
                >
                    <option value="" disabled>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <span class="text-red-700 mt-2 text-sm">{{
                    formCustomer.errors.gender
                }}</span>
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
        const formCustomer = useForm({
            name: null,
            phone_no: null,
            gender: "",
            completed: false
        });

        return { formCustomer };
    },

    methods: {
        back() {
            this.$emit("back");
        },
        next() {
            this.checkStepTwo();
            this.$emit("next", this.formCustomer);
        },
        checkStepTwo() {
            if (
                this.formCustomer.name &&
                this.formCustomer.phone_no &&
                this.formCustomer.gender != ""
            ) {
                this.formCustomer.completed = true;
            } else {
                this.formCustomer.completed = false;
            }
        }
    }
};
</script>
