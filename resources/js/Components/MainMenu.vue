<template>
    <div id="menu-links">
        <inertia-link
            class="flex items-center group py-3"
            :href="route('dashboard')"
        >
            <div
                :class="
                    route().current('dashboard')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('cars.index')"
        >
            <div
                :class="
                    route().current('cars.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i> Cars
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('counter')"
        >
            <div
                :class="
                    route().current('counter')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i> Counter
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('customers.index')"
        >
            <div
                :class="
                    route().current('customers.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i> Customers
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('packages.index')"
        >
            <div
                :class="
                    route().current('packages.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i> Packages
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('services.index')"
        >
            <div
                :class="
                    route().current('services.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i> Services
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('whatsapps.index')"
        >
            <div
                :class="
                    route().current('whatsapps.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i> WhatsApps
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('crews.index')"
        >
            <div
                :class="
                    route().current('crews.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i> Crews
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('personalities.index')"
        >
            <div
                :class="
                    route().current('personalities.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i>
                Personalities
            </div>
        </inertia-link>
    </div>
</template>
