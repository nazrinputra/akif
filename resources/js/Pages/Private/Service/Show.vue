<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Service</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('services')"
                :active="route().current('services')"
            >
                Services
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('service', service)"
                :active="route().current('service', service)"
            >
                Service
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('services')"
                :active="route().current('services')"
            >
                Services
            </breeze-responsive-nav-link>
            <breeze-responsive-nav-link
                :href="route('service', service)"
                :active="route().current('service', service)"
            >
                Service
            </breeze-responsive-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row pt-3 px-3">
                            <div class="col-md-3 col-sm-12">
                                <h2>Service</h2>
                                <p>
                                    <strong>Package(s):</strong><br />
                                    <span
                                        v-for="pkg in service.packages"
                                        v-bind:key="pkg.id"
                                    >
                                        <inertia-link
                                            :href="route('package', pkg.slug)"
                                            >{{ pkg.name }}</inertia-link
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
                                            :value="service.name"
                                            required
                                            autofocus
                                            :readonly="isView ? 'readonly' : ''"
                                        />
                                    </div>
                                    <div class="mt-4">
                                        <breeze-label
                                            for="price"
                                            value="Price"
                                        />
                                        <breeze-input
                                            id="price"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.price"
                                            :value="service.price"
                                            required
                                            :readonly="isView ? 'readonly' : ''"
                                        />
                                    </div>
                                    <div class="mt-4">
                                        <breeze-label
                                            for="description"
                                            value="Description"
                                        />
                                        <textarea
                                            rows="7"
                                            id="description"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            :value="service.description"
                                            required
                                            :readonly="isView ? 'readonly' : ''"
                                        >
                                        </textarea>
                                    </div>
                                    <div
                                        class="flex items-center justify-end mt-4"
                                    >
                                        <inertia-link :href="route('services')"
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
        service: Object
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
