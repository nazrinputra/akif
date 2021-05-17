<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Whatsapp</template> -->

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
                                <inertia-link
                                    href="#"
                                    v-for="car in cars"
                                    v-bind:key="car.id"
                                    class="px-2"
                                >
                                    {{ car.plate_no }}
                                </inertia-link>
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

export default {
    components: {
        BreezeAuthenticatedLayout
    },

    props: {
        auth: Object,
        errors: Object,
        cars: Object
    }
};
</script>
