<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Car</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('cars')"
                :active="route().current('cars')"
            >
                Cars
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('car', car)"
                :active="route().current('car', car)"
            >
                Car
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('cars')"
                :active="route().current('cars')"
            >
                Cars
            </breeze-responsive-nav-link>
            <breeze-responsive-nav-link
                :href="route('car', car)"
                :active="route().current('car', car)"
            >
                Car
            </breeze-responsive-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>Car</h2>
                                <p>
                                    View, add or edit car registered in the
                                    system.
                                </p>
                                <p>{{ car.plate_no }}</p>
                                <p
                                    v-for="owner in car.owners"
                                    v-bind:key="owner.id"
                                >
                                    {{ owner.name }}
                                </p>
                                <form method="POST" @submit.prevent="submit">
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
                                            required
                                            autofocus
                                        />
                                    </div>
                                    <div class="mt-4">
                                        <breeze-label
                                            for="model"
                                            value="Model"
                                        />
                                        <breeze-input
                                            id="model"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.model"
                                            required
                                            autofocus
                                        />
                                    </div>
                                    <div class="mt-4">
                                        <breeze-label
                                            for="color"
                                            value="Color"
                                        />
                                        <breeze-input
                                            id="color"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.color"
                                            required
                                            autofocus
                                        />
                                    </div>
                                    <div
                                        class="flex items-center justify-end mt-4"
                                    >
                                        <breeze-button
                                            :class="{
                                                'opacity-25': form.processing
                                            }"
                                            :disabled="form.processing"
                                        >
                                            Submit
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
        car: Object
    },

    data() {
        return {
            form: this.$inertia.form({
                plate_no: this.plate_no
            })
        };
    },

    methods: {
        submit() {
            alert(plate_no.value);
        }
    }
};
</script>
