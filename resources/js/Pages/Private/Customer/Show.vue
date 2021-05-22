<template>
    <breeze-authenticated-layout>
        <teleport to="title"> - Customer {{ customer.name }} </teleport>
        <template #header>
            <div class="row px-5">
                <inertia-link
                    :href="route('customers.index')"
                    class="btn btn-secondary"
                >
                    <i class="fas fa-chevron-left"></i>
                </inertia-link>
                <h6 class="pt-2.5 ml-3">
                    View specific customer in the system.
                </h6>
            </div>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('customers.index')" :active="false">
                Customers
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Customer
            </span>
        </template>

        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row pt-3 px-3">
                        <div class="col-md-3 col-sm-12">
                            <h2 v-on:click="isVisible = !isVisible">
                                Customer
                            </h2>
                            <div v-if="isVisible" id="personalities">
                                <inertia-link
                                    :href="
                                        route('personalities.show', personality)
                                    "
                                    class="badge badge-info mr-2"
                                    v-for="personality in customer.personalities"
                                    v-bind:key="personality.id"
                                    >{{ personality.name }}</inertia-link
                                >
                            </div>
                            <p class="mt-2">
                                <strong>Car(s):</strong><br />
                                <span
                                    v-for="car in customer.cars"
                                    v-bind:key="car.id"
                                >
                                    <inertia-link
                                        :href="route('cars.show', car)"
                                        >{{ car.plate_no }}</inertia-link
                                    >
                                    <br />
                                </span>
                            </p>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <form @submit.prevent="submit">
                                <div>
                                    <breeze-label for="name" value="Name" />
                                    <breeze-input
                                        id="name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.name"
                                        :value="customer.name"
                                        required
                                        autofocus
                                        :readonly="isView ? 'readonly' : ''"
                                    />
                                </div>
                                <div class="mt-4">
                                    <breeze-label
                                        for="phone_no"
                                        value="Phone Number"
                                    />
                                    <breeze-input
                                        id="phone_no"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.phone_no"
                                        :value="customer.phone_no"
                                        required
                                        :readonly="isView ? 'readonly' : ''"
                                    />
                                </div>
                                <div class="mt-4">
                                    <breeze-label for="gender" value="Gender" />
                                    <breeze-input
                                        id="gender"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.gender"
                                        :value="customer.gender"
                                        required
                                        :readonly="isView ? 'readonly' : ''"
                                    />
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <inertia-link
                                        :href="route('customers.index')"
                                        ><breeze-button type="button">
                                            Back
                                        </breeze-button></inertia-link
                                    >
                                    <breeze-button
                                        type="button"
                                        class="ml-4"
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
        customer: Object
    },

    data() {
        return {
            isVisible: false,
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
