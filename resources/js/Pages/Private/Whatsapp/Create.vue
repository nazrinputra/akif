<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Whatsapp Create
        </teleport>
        <template #header>
            <div class="row justify-between px-5">
                <inertia-link
                    :href="route('whatsapps.index')"
                    class="btn btn-secondary"
                >
                    <i class="fas fa-chevron-left"></i>
                </inertia-link>
                <span class="pt-2">
                    Add new WhatsApp message.
                </span>
                <span>&nbsp;</span>
            </div>
        </template>
        <template #nav>
            <breeze-nav-link
                :href="route('whatsapps.index')"
                :active="route().current('whatsapps.index')"
            >
                WhatsApps
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                WhatsApp
            </span>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('whatsapps.index')"
                :active="route().current('whatsapps.index')"
            >
                WhatsApps
            </breeze-responsive-nav-link>
            <span
                class="block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                WhatsApp
            </span>
        </template>

        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row pt-3 px-3">
                        <div class="col">
                            <form @submit.prevent="submit">
                                <div>
                                    <breeze-label for="title" value="Title" />
                                    <breeze-input
                                        id="title"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.title"
                                        required
                                        autofocus
                                    />
                                </div>
                                <div class="mt-4">
                                    <breeze-label
                                        for="message"
                                        value="Message"
                                    />
                                    <textarea
                                        rows="7"
                                        id="message"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        v-model="form.message"
                                        required
                                    >
                                    </textarea>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <inertia-link
                                        :href="route('whatsapps.index')"
                                        class="btn btn-secondary"
                                    >
                                        Back
                                    </inertia-link>
                                    <breeze-button
                                        type="button"
                                        class="ml-4"
                                        @click="submit"
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
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

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
        whatsapp: Object
    },

    data() {
        return {
            form: this.$inertia.form({
                title: this.title,
                message: this.message
            })
        };
    },

    setup() {
        const form = reactive({
            first_name: null,
            last_name: null,
            email: null
        });

        function submit() {
            Inertia.post(route("whatsapps.store"), form);
        }

        return { form, submit };
    },

    methods: {
        edit() {
            alert("Not configured yet");
        }
    }
};
</script>
