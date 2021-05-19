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
        <div class="container">
            <div class="row mt-5">
                <div
                    class="col-xs-12 col-sm-6 col-md-4"
                    v-for="promo in promotions"
                    v-bind:key="promo.id"
                >
                    <div
                        class="image-flip"
                        ontouchstart="this.classList.toggle('hover');"
                    >
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">
                                            {{ promo.name }}
                                        </h4>
                                        <p class="card-text">
                                            {{ promo.description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">
                                            {{ promo.name }}
                                        </h4>
                                        <p class="card-text">
                                            <ul>
                                                <li v-for="service in promo.services"
                                                v-bind:key="service.id">
                                                {{ service.name }}</li>
                                            </ul>
                                        </p>
                                        <inertia-link :href="route('promotion', promo.slug)" class="btn btn-outline-secondary">View More</inertia-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        errors: Object,
        promotions: Object
    },
};
</script>
