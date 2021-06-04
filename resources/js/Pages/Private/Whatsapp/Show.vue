<template>
    <breeze-authenticated-layout>
        <template #title> - Show WhatsApp </template>
        <template #header>
            <inertia-link
                :href="route('whatsapps.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View existing WhatsApp message
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

        <breeze-trashed-message
            v-if="whatsapp.deleted_at"
            class="mb-6"
            @restore="restore(whatsapp)"
        >
            This message has been deleted.
        </breeze-trashed-message>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form>
                    <div class="mt-3 p-3">
                        <label for="title">Title</label>
                        <input
                            type="text"
                            id="title"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="whatsapp.title"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="message">Message</label>
                        <textarea
                            rows="7"
                            id="message"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="whatsapp.message"
                            disabled
                        />
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            v-if="
                                !whatsapp.deleted_at &&
                                    hasAnyPermission(['delete whatsapps'])
                            "
                            @click="destroy(whatsapp)"
                            type="button"
                        >
                            Delete
                        </breeze-button>
                        <inertia-link
                            v-if="
                                !whatsapp.deleted_at &&
                                    hasAnyPermission(['edit whatsapps'])
                            "
                            class="ml-auto btn btn-secondary"
                            as="button"
                            :href="route('whatsapps.edit', whatsapp)"
                        >
                            Edit
                        </inertia-link>
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
import BreezeTrashedMessage from "@/Components/TrashedMessage";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeTrashedMessage
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        whatsapp: Object
    },

    methods: {
        destroy(whatsapp) {
            this.$inertia.delete(route("whatsapps.destroy", whatsapp));
        },
        restore(whatsapp) {
            this.$inertia.put(route("whatsapps.restore", whatsapp));
        }
    }
};
</script>
