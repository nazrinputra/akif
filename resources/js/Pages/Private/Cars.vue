<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Cars</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('cars')"
                :active="route().current('cars')"
            >
                Cars
            </breeze-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>Cars</h2>
                                <p>
                                    View, add or edit cars registered in the
                                    system.
                                </p>
                                <span v-for="car in cars" v-bind:key="car.id">
                                    <inertia-link
                                        :href="route('car', car)"
                                        class="px-2"
                                    >
                                        {{ car.plate_no }}
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

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink
    },

    props: {
        auth: Object,
        errors: Object,
        cars: Object
    }
};
</script>
