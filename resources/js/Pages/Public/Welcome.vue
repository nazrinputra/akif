<template>
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
        <li class="nav-item  mx-0 mx-lg-1">
            <inertia-link
                class="nav-link py-3 px-0 px-lg-3 rounded"
                :href="route('store', 'tambak-bugis')"
                >Tambak Bugis</inertia-link
            >
        </li>
        <li class="nav-item  mx-0 mx-lg-1">
            <inertia-link
                class="nav-link py-3 px-0 px-lg-3 rounded"
                :href="route('store', 'bukit-katil')"
                >Bukit Katil</inertia-link
            >
        </li>
        <li class="nav-item  mx-0 mx-lg-1">
            <inertia-link
                class="nav-link py-3 px-0 px-lg-3 rounded"
                :href="route('promotions')"
                >Promotions</inertia-link
            >
        </li>
    </teleport>
    <section class="masthead">
        <div
            class="relative items-top justify-center min-h-screen sm:items-center sm:pt-0"
        >
            <header class="text-center">
                <div class="container d-flex align-items-center flex-column">
                    <!-- Logo Image-->
                    <img
                        class="masthead-avatar py-5"
                        src="/img/logo-web.png"
                        alt="Akif"
                    />
                    <!-- Logo Heading-->
                    <h1
                        class="masthead-heading text-secondary text-uppercase mb-0"
                    >
                        Car Grooming Center
                    </h1>
                    <!-- Icon Divider-->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <!-- Logo Subheading-->
                    <p class="masthead-subheading font-weight-light mb-0">
                        Akif Car Grooming Center are committed to ensuring the
                        external and internal cleaning of your vehicle.
                    </p>
                    <p class="masthead-subheading font-weight-light mb-0">
                        Give us your trust, and we will give you satisfaction!
                    </p>
                </div>
            </header>
            <section class="page-section py-5 mt-5" id="bukit katil">
                <div class="container">
                    <!-- Store Section Heading-->
                    <h2
                        class="page-section-heading text-secondary text-center text-uppercase mb-0"
                    >
                        Our Stores
                    </h2>
                    <!-- Icon Divider-->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <!-- Store Grid Items-->
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-lg-offset-3">
                            <inertia-link
                                :href="route('store', 'tambak-bugis')"
                            >
                                <img
                                    class="img-fluid pb-3"
                                    src="img/store/tambak-bugis.png"
                                    alt="Tambak Bugis"
                                />
                            </inertia-link>
                        </div>
                        <div class="col-lg-3 col-lg-offset-3">
                            <inertia-link :href="route('store', 'bukit-katil')">
                                <img
                                    class="img-fluid pb-3"
                                    src="img/store/bukit-katil.png"
                                    alt="Bukit Katil"
                                />
                            </inertia-link>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <teleport to="#copyright">
        <div class="container">
            <small
                >Copyright ©
                <inertia-link :href="route('login')" class="text-primary"
                    >Akif Car Grooming Center</inertia-link
                >
                2021</small
            >
        </div>
    </teleport>
</template>

<script>
export default {
    props: {
        auth: Object,
        errors: Object
    }
};
</script>
