<template>
    <teleport to="title">
        <slot name="title" />
    </teleport>
    <teleport to="#homeButton">
        <inertia-link class="navbar-brand" href="/"
            ><img
                class="flex md:hidden img-thumbnail"
                src="/img/logo-navbar.png"
                alt="Akif"
        /></inertia-link>
    </teleport>
    <teleport to="#menuButton">
        <button
            type="button"
            class="flex md:hidden text-uppercase font-weight-bold text-white text-xl"
        >
            <i class="fas fa-ellipsis-h"></i>
        </button>
    </teleport>
    <teleport to="#navLinks">
        <breeze-responsive-main-menu />
    </teleport>
    <div class="pt-12">
        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <div class="md:flex md:flex-shrink-0">
                <div
                    class="bg-secondary md:flex-shrink-0 md:w-56 px-5 hidden md:flex items-center justify-center"
                >
                    <inertia-link class="mt-1" href="/">
                        <breeze-application-logo class="w-28 h-28" />
                    </inertia-link>
                </div>
                <div
                    class="bg-white border-b w-full md:px-10 text-sm md:text-md"
                >
                    <nav class="bg-white border-b border-gray-100 mt-4 md:mt-0">
                        <!-- Primary Navigation Menu -->
                        <div class="max-w-7xl mx-auto pt-10 md:pt-3 px-8">
                            <div class="flex justify-between">
                                <div class="flex">
                                    <!-- Navigation Links -->
                                    <div class="md:-my-px md:flex">
                                        <breeze-nav-link
                                            v-if="!route().current('dashboard')"
                                            :href="route('dashboard')"
                                            :active="false"
                                        >
                                            Dashboard
                                        </breeze-nav-link>
                                        <span
                                            v-if="route().current('dashboard')"
                                            class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
                                        >
                                            Dashboard
                                        </span>
                                        <slot name="nav" />
                                    </div>
                                </div>

                                <div
                                    class="hidden sm:flex sm:items-center sm:ml-6"
                                >
                                    <!-- Settings Dropdown -->
                                    <div class="ml-3 relative">
                                        <breeze-dropdown
                                            align="right"
                                            width="48"
                                        >
                                            <template #trigger>
                                                <span
                                                    class="inline-flex rounded-md"
                                                >
                                                    <button
                                                        type="button"
                                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                                    >
                                                        {{
                                                            $page.props.auth
                                                                .user.name
                                                        }}

                                                        <svg
                                                            class="ml-2 -mr-0.5 h-4 w-4"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                        >
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"
                                                            />
                                                        </svg>
                                                    </button>
                                                </span>
                                            </template>

                                            <template #content>
                                                <breeze-dropdown-link
                                                    :href="route('reports')"
                                                    as="button"
                                                    v-if="
                                                        hasAnyPermission([
                                                            'view report'
                                                        ])
                                                    "
                                                >
                                                    View Reports
                                                </breeze-dropdown-link>
                                                <breeze-dropdown-link
                                                    :href="
                                                        route('profiles.show')
                                                    "
                                                    as="button"
                                                >
                                                    My Profile
                                                </breeze-dropdown-link>
                                                <breeze-dropdown-link
                                                    :href="route('counter')"
                                                    as="button"
                                                    v-if="
                                                        hasAnyPermission([
                                                            'create queues'
                                                        ])
                                                    "
                                                >
                                                    Counter
                                                </breeze-dropdown-link>
                                                <breeze-dropdown-link
                                                    :href="
                                                        route('queues.manage')
                                                    "
                                                    as="button"
                                                    v-if="
                                                        hasAnyPermission([
                                                            'edit queues'
                                                        ])
                                                    "
                                                >
                                                    Q - MS
                                                </breeze-dropdown-link>
                                                <breeze-dropdown-link
                                                    :href="route('logout')"
                                                    method="post"
                                                    as="button"
                                                >
                                                    Log Out
                                                </breeze-dropdown-link>
                                            </template>
                                        </breeze-dropdown>
                                    </div>
                                </div>

                                <!-- Hamburger -->
                                <div class="-mr-2 flex items-center sm:hidden">
                                    <button
                                        @click="
                                            showingNavigationDropdown = !showingNavigationDropdown
                                        "
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                    >
                                        <svg
                                            class="h-6 w-6"
                                            stroke="currentColor"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                :class="{
                                                    hidden: showingNavigationDropdown,
                                                    'inline-flex': !showingNavigationDropdown
                                                }"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16"
                                            />
                                            <path
                                                :class="{
                                                    hidden: !showingNavigationDropdown,
                                                    'inline-flex': showingNavigationDropdown
                                                }"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Responsive Navigation Menu -->
                        <div
                            :class="{
                                block: showingNavigationDropdown,
                                hidden: !showingNavigationDropdown
                            }"
                            class="sm:hidden"
                        >
                            <!-- Responsive Settings Options -->
                            <div class="pt-4 pb-1 border-t border-gray-200">
                                <div class="flex items-center px-4">
                                    <div
                                        class="font-medium text-base text-gray-800"
                                    >
                                        {{ $page.props.auth.user.name }}
                                    </div>
                                    <div
                                        class="font-medium text-sm text-gray-500 ml-2"
                                    >
                                        {{ $page.props.auth.user.email }}
                                    </div>
                                </div>

                                <div class="mt-3 space-y-1">
                                    <breeze-responsive-nav-link
                                        :href="route('reports')"
                                        as="button"
                                        v-if="hasAnyPermission(['view report'])"
                                    >
                                        View Reports
                                    </breeze-responsive-nav-link>
                                    <breeze-responsive-nav-link
                                        :href="route('profiles.show')"
                                        as="button"
                                    >
                                        My Profile
                                    </breeze-responsive-nav-link>
                                    <breeze-responsive-nav-link
                                        :href="route('counter')"
                                        v-if="
                                            hasAnyPermission(['create queues'])
                                        "
                                        as="button"
                                    >
                                        Counter
                                    </breeze-responsive-nav-link>
                                    <breeze-responsive-nav-link
                                        :href="route('queues.manage')"
                                        v-if="hasAnyPermission(['edit queues'])"
                                        as="button"
                                    >
                                        Q - MS
                                    </breeze-responsive-nav-link>
                                    <breeze-responsive-nav-link
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                    >
                                        Log Out
                                    </breeze-responsive-nav-link>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- Page Heading -->
                    <header class="bg-white shadow-sm" v-if="$slots.header">
                        <div class="max-w-7xl mx-auto py-2 h-14">
                            <div class="d-flex px-2">
                                <slot name="header" />
                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <div class="md:flex md:flex-grow md:overflow-hidden">
                <div
                    class="hidden md:block bg-secondary flex-shrink-0 w-56 px-5 py-5 overflow-y-auto"
                    id="main-menu"
                >
                    <breeze-main-menu />
                </div>
                <div
                    class="md:flex-1 px-4 py-8 md:p-6 md:overflow-y-auto"
                    scroll-region
                >
                    <breeze-flash-messages />
                    <slot />
                </div>
            </div>
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

    <breeze-announcement class="block sm:hidden alert-danger fixed-top">
        <i class="fas fa-exclamation-triangle mx-3"></i><strong>Caution</strong
        ><i class="fas fa-exclamation-triangle mx-3"></i><br />
        This system is not meant for small devices!<br />
        Some features may not work as intended.
    </breeze-announcement>
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo";
import BreezeDropdown from "@/Components/Dropdown";
import BreezeDropdownLink from "@/Components/DropdownLink";
import BreezeNavLink from "@/Components/NavLink";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";
import BreezeMainMenu from "@/Components/MainMenu";
import BreezeFlashMessages from "@/Components/FlashMessages";
import BreezeResponsiveMainMenu from "@/Components/ResponsiveMainMenu";
import moment from "moment";
import BreezeAnnouncement from "@/Components/Announcement";

export default {
    components: {
        BreezeApplicationLogo,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeMainMenu,
        BreezeFlashMessages,
        BreezeResponsiveMainMenu,
        BreezeAnnouncement
    },

    data() {
        return {
            showingNavigationDropdown: false
        };
    },

    methods: {
        currentYear() {
            return moment().year();
        }
    }
};
</script>
