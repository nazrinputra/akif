<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Counter
        </teleport>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Register customer car into queue.
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link
                :href="route('counter')"
                :active="route().current('counter')"
            >
                Counter
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('counter')"
                :active="route().current('counter')"
            >
                Counter
            </breeze-responsive-nav-link>
        </template>

        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row p-3">
                        <div class="col pb-5">
                            <h2>Counter</h2>
                            <p>Register car and customer into queue.</p>
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
import BreezeInput from "@/Components/Input";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors
    },

    props: {
        auth: Object,
        errors: Object
    },

    data() {
        return {
            form: this.$inertia.form({
                test: this.test
            })
        };
    },

    methods: {
        submit() {
            alert(text.value);
        }
    }
};
</script>
