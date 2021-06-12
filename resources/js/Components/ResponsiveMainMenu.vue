<template>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('dashboard') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('dashboard')"
            v-if="$page.props.auth.can.length != 0"
            >my dashboard</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('personalities.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('personalities.index')"
            v-if="hasAnyPermission(['view personalities'])"
            >personalities</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('commissions.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('commissions.index')"
            v-if="hasAnyPermission(['view commissions'])"
            >commissions</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('whatsapps.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('whatsapps.index')"
            v-if="hasAnyPermission(['view whatsapps'])"
            >whatsapps</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('customers.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('customers.index')"
            v-if="hasAnyPermission(['view customers'])"
            >customers</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('packages.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('packages.index')"
            v-if="hasAnyPermission(['view packages'])"
            >packages</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('services.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('services.index')"
            v-if="hasAnyPermission(['view services'])"
            >services</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('healths.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('healths.index')"
            v-if="hasAnyPermission(['view healths'])"
            >healths</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('queues.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('queues.index')"
            v-if="hasAnyPermission(['view queues'])"
            >queues</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('crews.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('crews.index')"
            v-if="hasAnyPermission(['view crews'])"
            >crews</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('roles.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('roles.index')"
            v-if="hasAnyPermission(['view roles'])"
            >roles</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('cars.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('cars.index')"
            v-if="hasAnyPermission(['view cars'])"
            >cars</inertia-link
        >
    </li>
</template>
