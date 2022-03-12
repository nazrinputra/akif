<template>
    <div id="menu-links">
        <inertia-link
            class="flex items-center group py-3"
            :href="route('dashboard')"
            v-if="$page.props.auth.can.length != 0"
        >
            <div
                :class="
                    route().current('dashboard')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-tachometer-alt"></i> My Dashboard
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('personalities.index')"
            v-if="hasAnyPermission(['view personalities'])"
        >
            <div
                :class="
                    route().current('personalities.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="far fa-laugh-beam"></i>
                Personalities
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('whatsapps.index')"
            v-if="hasAnyPermission(['view whatsapps'])"
        >
            <div
                :class="
                    route().current('whatsapps.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fab fa-whatsapp"></i> WhatsApps
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('customers.index')"
            v-if="hasAnyPermission(['view customers'])"
        >
            <div
                :class="
                    route().current('customers.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-users"></i> Customers
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('packages.index')"
            v-if="hasAnyPermission(['view packages'])"
        >
            <div
                :class="
                    route().current('packages.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-cubes"></i> Packages
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('services.index')"
            v-if="hasAnyPermission(['view services'])"
        >
            <div
                :class="
                    route().current('services.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-cube"></i> Services
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('healths.index')"
            v-if="hasAnyPermission(['view healths'])"
        >
            <div
                :class="
                    route().current('healths.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-medkit"></i> Healths
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('queues.index')"
            v-if="hasAnyPermission(['view queues'])"
        >
            <div
                :class="
                    route().current('queues.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-hourglass-half"></i> Queues
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('crews.index')"
            v-if="hasAnyPermission(['view crews'])"
        >
            <div
                :class="
                    route().current('crews.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-user-shield"></i> Crews
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('roles.index')"
            v-if="hasAnyPermission(['view roles'])"
        >
            <div
                :class="
                    route().current('roles.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-user-cog"></i> Roles
            </div>
        </inertia-link>
        <inertia-link
            class="flex items-center group py-3"
            :href="route('cars.index')"
            v-if="hasAnyPermission(['view cars'])"
        >
            <div
                :class="
                    route().current('cars.index')
                        ? 'text-white'
                        : 'text-indigo-300 group-hover:text-white'
                "
            >
                <i class="fas fa-car"></i> Cars
            </div>
        </inertia-link>
    </div>
</template>
