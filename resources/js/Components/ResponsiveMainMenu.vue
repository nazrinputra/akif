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
            >personalities</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('whatsapps.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('whatsapps.index')"
            >whatsapps</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('customers.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('customers.index')"
            >customers</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('packages.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('packages.index')"
            >packages</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('services.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('services.index')"
            >services</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('queues.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('queues.index')"
            >queues</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('crews.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('crews.index')"
            >crews</inertia-link
        >
    </li>
    <li class="flex md:hidden nav-item  mx-0 mx-lg-1">
        <inertia-link
            :class="route().current('cars.index') ? 'active' : ''"
            class="nav-link py-3 px-0 px-lg-3 rounded"
            :href="route('cars.index')"
            >cars</inertia-link
        >
    </li>
</template>
