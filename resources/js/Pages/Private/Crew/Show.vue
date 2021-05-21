<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Crew</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('crews.index')"
                :active="route().current('crews.index')"
            >
                Crews
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('crews.show', crew)"
                :active="route().current('crews.show', crew)"
            >
                Crew
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('crews.index')"
                :active="route().current('crews.index')"
            >
                Crews
            </breeze-responsive-nav-link>
            <breeze-responsive-nav-link
                :href="route('crews.show', crew)"
                :active="route().current('crews.show', crew)"
            >
                Crew
            </breeze-responsive-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row pt-3 px-3">
                            <div class="col-md-3 col-sm-12">
                                <h2>Crew</h2>
                                <p>
                                    <strong>Role: </strong>{{ crew.role.name }}
                                </p>
                                <p>
                                    <strong>Store: </strong
                                    >{{ crew.store.name }}
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
                                            :value="crew.name"
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
                                            :value="crew.phone_no"
                                            required
                                            :readonly="isView ? 'readonly' : ''"
                                        />
                                    </div>
                                    <div class="mt-4">
                                        <breeze-label
                                            for="email"
                                            value="Email"
                                        />
                                        <breeze-input
                                            id="email"
                                            type="email"
                                            class="mt-1 block w-full"
                                            v-model="form.email"
                                            :value="crew.email"
                                            required
                                            :readonly="isView ? 'readonly' : ''"
                                        />
                                    </div>
                                    <div
                                        class="flex items-center justify-end mt-4"
                                    >
                                        <inertia-link
                                            :href="route('crews.index')"
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
        crew: Object
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
