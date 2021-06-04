<template>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('dashboard') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('dashboard')"
            >my dashboard</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('personalities.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('personalities.index')"
            v-if="hasAnyPermission(['view_personalities'])"
            >personalities</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('whatsapps.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('whatsapps.index')"
            v-if="hasAnyPermission(['view_whatsapps'])"
            >whatsapps</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('customers.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('customers.index')"
            v-if="hasAnyPermission(['view_customers'])"
            >customers</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('packages.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('packages.index')"
            v-if="hasAnyPermission(['view_packages'])"
            >packages</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('services.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('services.index')"
            v-if="hasAnyPermission(['view_services'])"
            >services</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('queues.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('queues.index')"
            v-if="hasAnyPermission(['view_queues'])"
            >queues</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('crews.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('crews.index')"
            v-if="hasAnyPermission(['view_crews'])"
            >crews</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('roles.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('roles.index')"
            v-if="hasAnyPermission(['view_roles'])"
            >roles</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('cars.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('cars.index')"
            v-if="hasAnyPermission(['view_cars'])"
            >cars</inertia-link
        >
    </li>
</template>
