<template>
    <breeze-customer-layout>
        <template #title>
            Car Grooming Center
        </template>
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
                        <div class="col-lg-4 mx-5 my-3 shadow">
                            <inertia-link
                                :href="route('stores.show', 'tambak-bugis')"
                                class="text-decoration-none"
                            >
                                <img
                                    class="img-fluid"
                                    src="img/logo-store.png"
                                    alt="Tambak Bugis"
                                />
                                <h1 class="text-center text-secondary">
                                    TAMBAK<br />BUGIS
                                </h1>
                            </inertia-link>
                        </div>
                        <div class="col-lg-4 mx-5 my-3 shadow">
                            <inertia-link
                                :href="route('stores.show', 'bukit-katil')"
                                class="text-decoration-none"
                            >
                                <img
                                    class="img-fluid"
                                    src="img/logo-store.png"
                                    alt="Bukit Katil"
                                />
                                <h1 class="text-center text-secondary">
                                    BUKIT<br />KATIL
                                </h1>
                            </inertia-link>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </breeze-customer-layout>
</template>

<script>
import BreezeCustomerLayout from "@/Layouts/Customer";

export default {
    components: {
        BreezeCustomerLayout
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object
    }
};
</script>
