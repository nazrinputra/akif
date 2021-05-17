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
                :href="route('car')"
                :active="route().current('car')"
            >
                Car
            </breeze-nav-link>
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
        errors: Object
    }
};
</script>
