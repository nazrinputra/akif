<template>
    <breeze-authenticated-layout>
        <teleport to="title"> - Whatsapp {{ whatsapp.title }} </teleport>
        <template #header>
            <h6 class="pt-2.5 mx-auto">
                View existing WhatsApp message.
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('whatsapps.index')" :active="false">
                WhatsApps
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                WhatsApp
            </span>
        </template>

        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row pt-3 px-3">
                        <div class="col">
                            <form>
                                <div>
                                    <breeze-label for="title" value="Title" />
                                    <breeze-input
                                        id="title"
                                        type="text"
                                        class="mt-1 block w-full"
                                        :value="whatsapp.title"
                                        required
                                        autofocus
                                        readonly
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
                                        :value="whatsapp.message"
                                        required
                                        readonly
                                    >
                                    </textarea>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <inertia-link
                                        :href="route('whatsapps.index')"
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
import BreezeButton from "@/Components/Button";
import BreezeInput from "@/Components/Input";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
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

    methods: {
        edit() {
            alert("Not configured yet");
        }
    }
};
</script>
