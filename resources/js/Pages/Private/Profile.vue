<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Profile
        </teleport>
        <template #header>
            <div class="row px-5">
                <inertia-link
                    :href="route('dashboard')"
                    class="btn btn-secondary"
                >
                    <i class="fas fa-chevron-left"></i>
                </inertia-link>
                <h6 class="pt-2.5 ml-3">
                    View logged in user profile.
                </h6>
            </div>
        </template>
        <template #nav>
            <breeze-nav-link
                :href="route('profile')"
                :active="route().current('profile')"
            >
                Profile
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('profile')"
                :active="route().current('profile')"
            >
                Profile
            </breeze-responsive-nav-link>
        </template>

        <div class="max-w-7xl mx-auto px-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row p-3">
                        <div class="col pb-5">
                            <h2>Profile</h2>
                            <p>
                                View, add or edit my profile.
                            </p>
                            <p>{{ user.name }}</p>
                            <p>{{ user.store.name }}</p>
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
        user: Object
    }
};
</script>
