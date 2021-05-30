<template>
    <breeze-authenticated-layout>
        <template #title> - Preview WhatsApp </template>
        <template #header>
            <inertia-link
                :href="route('whatsapps.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Preview WhatsApp message
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

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form>
                    <div class="mt-3 p-3">
                        <label for="name">Customer Name</label>
                        <input
                            type="text"
                            id="name"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="customer.name"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="phone_no">Customer Phone No</label>
                        <input
                            type="text"
                            id="phone_no"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="customer.phone_no"
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
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-start"
                    >
                        <inertia-link
                            as="button"
                            class="mr-3 btn btn-secondary"
                            :href="route('customers.edit', customer)"
                        >
                            Edit Customer
                        </inertia-link>
                        <inertia-link
                            as="button"
                            class="mr-3 btn btn-secondary"
                            :href="route('whatsapps.edit', whatsapp)"
                        >
                            Edit Message
                        </inertia-link>
                        <a
                            as="button"
                            class="mr-3 btn btn-secondary ml-auto"
                            target="_blank"
                            :href="
                                'https://api.whatsapp.com/send?phone=6' +
                                    customer.phone_no +
                                    '&text=' +
                                    whatsapp.message
                            "
                        >
                            Send
                        </a>
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
        whatsapp: Object,
        customer: Object
    },

    methods: {
        // destroy(whatsapp) {
        //     this.$inertia.delete(route("whatsapps.destroy", whatsapp));
        // },
        // restore(whatsapp) {
        //     this.$inertia.put(route("whatsapps.restore", whatsapp));
        // }
    }
};
</script>
