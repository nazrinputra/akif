<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Whatsapp</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('whatsapps')"
                :active="route().current('whatsapps')"
            >
                WhatsApps
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('whatsapps')"
                :active="route().current('whatsapps')"
            >
                WhatsApps
            </breeze-responsive-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>WhatsApp</h2>
                                <p>Modify WhatsApp messages for the store.</p>
                                <span
                                    v-for="whatsapp in whatsapps"
                                    v-bind:key="whatsapp.id"
                                >
                                    <inertia-link
                                        :href="route('whatsapp', whatsapp)"
                                        class="px-2"
                                    >
                                        {{ whatsapp.title }}
                                    </inertia-link>
                                </span>
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

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink
    },

    props: {
        auth: Object,
        errors: Object,
        whatsapps: Object
    }
};
</script>
