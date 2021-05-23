<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Whatsapp Create
        </teleport>
        <template #header>
            <h6 class="pt-2.5 mx-auto">
                Add new WhatsApp message.
            </h6>
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
                            <form @submit.prevent="store">
                                <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                                    <breeze-text-input
                                        v-model="form.title"
                                        :error="form.errors.title"
                                        class="pr-6 pb-8 w-full lg:w-1/2"
                                        label="Title"
                                        id="title"
                                    />
                                    <breeze-textarea-input
                                        v-model="form.message"
                                        :error="form.errors.message"
                                        class="pr-6 pb-8 w-full lg:w-1/2"
                                        label="Message"
                                        id="message"
                                    />
                                </div>
                                <div
                                    class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end items-center"
                                >
                                    <breeze-loading-button
                                        :loading="form.processing"
                                        class="btn btn-indigo"
                                        type="submit"
                                        >Create Message</breeze-loading-button
                                    >
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
import BreezeTextInput from "@/Components/TextInput";
import BreezeSelectInput from "@/Components/SelectInput";
import BreezeTextareaInput from "@/Components/TextareaInput";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";
import BreezeLoadingButton from "@/Components/LoadingButton";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeButton,
        BreezeTextInput,
        BreezeSelectInput,
        BreezeLabel,
        BreezeValidationErrors,
        BreezeLoadingButton,
        BreezeTextareaInput
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object
    },

    data() {
        return {
            form: this.$inertia.form({
                title: null,
                message: null
            })
        };
    },
    methods: {
        store() {
            this.form.post(this.route("whatsapps.store"));
        }
    }
};
</script>
