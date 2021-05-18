<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Packages</template> -->
        <template #nav>
            <breeze-nav-link
                :href="route('packages')"
                :active="route().current('packages')"
            >
                Packages
            </breeze-nav-link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col pb-5">
                                <h2>Packages</h2>
                                <p>
                                    View packages in the system and make
                                    modifications.
                                </p>
                                <span
                                    v-for="pkg in packages"
                                    v-bind:key="pkg.id"
                                >
                                    <inertia-link
                                        :href="route('package', pkg)"
                                        class="px-2"
                                    >
                                        {{ pkg.name }}
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
        packages: Object
    }
};
</script>
