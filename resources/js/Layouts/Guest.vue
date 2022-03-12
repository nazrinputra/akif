<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
    >
        <div>
            <inertia-link href="/">
                <breeze-application-logo
                    class="w-40 h-40 fill-current text-gray-500"
                />
            </inertia-link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
    <teleport to="#copyright">
        <div class="container">
            <small
                >Copyright ©
                <inertia-link
                    :href="route('welcome')"
                    class="text-primary text-decoration-none"
                    >Akif Car Grooming Center</inertia-link
                >
                {{ currentYear() }}</small
            >
        </div>
    </teleport>
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo";
import moment from "moment";

export default {
    components: {
        BreezeApplicationLogo,
    },

    methods: {
        currentYear() {
            return moment().year();
        },
    },
};
</script>
