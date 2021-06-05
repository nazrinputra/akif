<template>
    <breeze-authenticated-layout>
        <template #title>
            - Profile
        </template>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View logged in user profile.
            </h6>
        </template>
        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Profile
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="submit">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showGeneral()"
                                :class="activeGeneral ? 'active' : ''"
                                >General</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showCareer()"
                                :class="activeCareer ? 'active' : ''"
                                >Career</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showPrivate()"
                                :class="activePrivate ? 'active' : ''"
                                >Private</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showHealth()"
                                :class="activeHealth ? 'active' : ''"
                                >Health</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showOther()"
                                :class="activeOther ? 'active' : ''"
                                >Other</span
                            >
                        </li>
                        <li class="nav-item">
                            <span
                                class="nav-link cursor-pointer"
                                @click="showEmergency()"
                                :class="activeEmergency ? 'active' : ''"
                                >Emergency</span
                            >
                        </li>
                    </ul>

                    <breeze-general
                        v-if="activeGeneral"
                        :form="form"
                        :stores="stores"
                        :roles="roles"
                    ></breeze-general>

                    <div
                        class="mt-3 p-6 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            class="ml-auto"
                            :class="{
                                'opacity-25': form.processing
                            }"
                            :disabled="form.processing"
                        >
                            Update
                        </breeze-button>
                    </div>
                </form>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezeGeneral from "@/Components/Crew/General";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeGeneral
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        stores: Object,
        roles: Object
    },

    data() {
        return {
            activeGeneral: true,
            activeCareer: false,
            activePrivate: false,
            activeHealth: false,
            activeOther: false,
            activeEmergency: false
        };
    },

    setup() {
        const form = useForm({
            name: null,
            phone_no: null,
            email: null,
            role_id: null,
            store_id: null,
            password: null,
            password_confirmation: null
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.auth.user.name;
            this.form.phone_no = this.auth.user.phone_no;
            this.form.email = this.auth.user.email;
            this.form.store_id = this.auth.user.store_id;
            this.form.role_id = this.getRole();
        },
        submit() {
            this.form.put(route("profiles.update"), {
                onSuccess: () =>
                    this.form.reset("password", "password_confirmation")
            });
        },
        getRole() {
            if (this.auth.user.roles[0]) {
                return this.auth.user.roles[0].id;
            } else {
                return "";
            }
        },
        showGeneral() {
            this.activeGeneral = true;
            this.activeCareer = false;
            this.activePrivate = false;
            this.activeHealth = false;
            this.activeOther = false;
            this.activeEmergency = false;
        },
        showCareer() {
            this.activeGeneral = false;
            this.activeCareer = true;
            this.activePrivate = false;
            this.activeHealth = false;
            this.activeOther = false;
            this.activeEmergency = false;
        },
        showPrivate() {
            this.activeGeneral = false;
            this.activeCareer = false;
            this.activePrivate = true;
            this.activeHealth = false;
            this.activeOther = false;
            this.activeEmergency = false;
        },
        showHealth() {
            this.activeGeneral = false;
            this.activeCareer = false;
            this.activePrivate = false;
            this.activeHealth = true;
            this.activeOther = false;
            this.activeEmergency = false;
        },
        showOther() {
            this.activeGeneral = false;
            this.activeCareer = false;
            this.activePrivate = false;
            this.activeHealth = false;
            this.activeOther = true;
            this.activeEmergency = false;
        },
        showEmergency() {
            this.activeGeneral = false;
            this.activeCareer = false;
            this.activePrivate = false;
            this.activeHealth = false;
            this.activeOther = false;
            this.activeEmergency = true;
        }
    }
};
</script>
