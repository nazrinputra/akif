<template>
    <div
        class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0"
    >
        <header class="text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Logo Image-->
                <img
                    class="masthead-avatar py-4"
                    src="/img/logo-web.png"
                    alt="Akif"
                />
                <!-- Logo Heading-->
                <h1 class="masthead-heading text-secondary text-uppercase mb-0">
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
    </div>
</template>

<script>
export default {
    props: {
        auth: Object,
        errors: Object
    }
};
</script>
