<template>
    <teleport to="title">
        <slot name="title" />
    </teleport>
    <teleport to="#homeButton">
        <inertia-link class="navbar-brand" href="/"
            ><img class="img-thumbnail" src="/img/logo-navbar.png" alt="Akif"
        /></inertia-link>
    </teleport>
    <teleport to="#menuButton">
        <button
            type="button"
            class="text-uppercase font-weight-bold text-white text-xl"
        >
            Menu
            <i class="fas fa-store-alt"></i>
        </button>
    </teleport>
    <teleport to="#navLinks">
        <li class="nav-item mx-0 mx-lg-1">
            <inertia-link
                :class="
                    route().current('stores.show', 'bukit-katil')
                        ? 'active'
                        : ''
                "
                class="nav-link py-3 px-0 px-lg-3 rounded"
                :href="route('stores.show', 'bukit-katil')"
                >Bukit Katil</inertia-link
            >
        </li>
        <li class="nav-item mx-0 mx-lg-1">
            <inertia-link
                :class="route().current('promotions.index') ? 'active' : ''"
                class="nav-link py-3 px-0 px-lg-3 rounded"
                :href="route('promotions.index')"
                >Promotions</inertia-link
            >
        </li>
    </teleport>
    <section class="masthead">
        <slot />
    </section>
    <teleport to="#footer">
        <div class="footer text-center">
            <div class="row">
                <!-- Footer Social Icons-->
                <div class="col-lg mb-lg-0">
                    <h4 class="text-uppercase">Contact Us</h4>
                    <a
                        class="btn btn-outline-light btn-social mx-1"
                        href="https://www.facebook.com/akifcarwash/"
                    >
                        <i class="fab fa-fw fa-facebook-f"></i>
                    </a>
                    <a
                        class="btn btn-outline-light btn-social mx-1"
                        href="https://api.whatsapp.com/send?phone=60136541240"
                    >
                        <i class="fab fa-fw fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </teleport>
    <teleport to="#copyright">
        <div class="container">
            <small
                >Copyright ©
                <inertia-link
                    :href="route('login')"
                    class="text-primary text-decoration-none"
                    >Akif Car Grooming Center</inertia-link
                >
                2021</small
            >
        </div>
    </teleport>
</template>

<script>
import moment from "moment";

export default {
    methods: {
        currentYear() {
            return moment().year();
        },
    },
};
</script>
