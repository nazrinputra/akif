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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>Service</h2>
                                <p>
                                    View, add or edit service registered in the
                                    system.
                                </p>
                                <p>{{ service.name }}</p>
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

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink
    },

    props: {
        auth: Object,
        errors: Object,
        service: Object
    }
};
</script>
