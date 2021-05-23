<template>
    <breeze-authenticated-layout>
        <teleport to="title"> - Car {{ car.plate_no }} </teleport>

        <template #header>
            <div class="row px-5">
                <inertia-link
                    :href="route('cars.index')"
                    class="btn btn-secondary"
                >
                    <i class="fas fa-chevron-left"></i>
                </inertia-link>
                <h6 class="pt-2.5 ml-3">
                    View specific car in the system.
                </h6>
            </div>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('cars.index')" :active="false">
                Cars
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Car
            </span>
        </template>

        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row pt-3 px-3">
                        <div class="col-md-3 col-sm-12">
                            <h2>Car</h2>
                            <p>
                                <strong>Owner(s):</strong><br />
                                <span
                                    v-for="owner in car.owners"
                                    v-bind:key="owner.id"
                                >
                                    <inertia-link
                                        :href="
                                            route('customers.show', owner.slug)
                                        "
                                        >{{ owner.name }}</inertia-link
                                    >
                                    <br />
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <form @submit.prevent="submit">
                                <div>
                                    <breeze-label
                                        for="plate_no"
                                        value="Plate No"
                                    />
                                    <breeze-input
                                        id="plate_no"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.plate_no"
                                        :value="car.plate_no"
                                        required
                                        autofocus
                                        :readonly="isView ? 'readonly' : ''"
                                    />
                                </div>
                                <div class="mt-4">
                                    <breeze-label for="brand" value="Brand" />
                                    <breeze-input
                                        id="brand"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.brand"
                                        :value="car.brand"
                                        required
                                        :readonly="isView ? 'readonly' : ''"
                                    />
                                </div>
                                <div class="mt-4">
                                    <breeze-label for="model" value="Model" />
                                    <breeze-input
                                        id="model"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.model"
                                        :value="car.model"
                                        required
                                        :readonly="isView ? 'readonly' : ''"
                                    />
                                </div>
                                <div class="mt-4">
                                    <breeze-label for="size" value="Size" />
                                    <breeze-input
                                        id="size"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.size"
                                        :value="car.size"
                                        required
                                        :readonly="isView ? 'readonly' : ''"
                                    />
                                </div>
                                <div class="mt-4">
                                    <breeze-label for="color" value="Color" />
                                    <breeze-input
                                        id="color"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.color"
                                        :value="car.color"
                                        required
                                        :readonly="isView ? 'readonly' : ''"
                                    />
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <inertia-link :href="route('cars.index')"
                                        ><breeze-button type="button">
                                            Back
                                        </breeze-button></inertia-link
                                    >
                                    <breeze-button
                                        class="ml-4"
                                        type="button"
                                        @click="edit"
                                    >
                                        Edit
                                    </breeze-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";
import BreezeButton from "@/Components/Button";
import BreezeInput from "@/Components/Input";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors
    },

    props: {
        auth: Object,
        errors: Object,
        car: Object
    },

    data() {
        return {
            isView: true,
            form: this.$inertia.form({
                plate_no: this.plate_no
            })
        };
    },

    methods: {
        submit() {
            alert("Not configured yet");
        },
        edit() {
            alert("Not configured yet");
        }
    }
};
</script>
