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
                <div class="col">
                    <p><strong>Name:</strong> {{ promotion.name }}</p>
                </div>
                <div class="col">
                    <p><strong>Price:</strong> RM{{ promotion.price }}</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <p>
                        <strong> Frequency:</strong> {{ promotion.frequency }}
                    </p>
                </div>
                <div class="col">
                    <p><strong>Duration:</strong>{{ promotion.duration }}</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <p>
                        <strong>Description:</strong>
                        {{ promotion.description }}
                    </p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <p><strong>Services:</strong></p>
                    <ul>
                        <li
                            v-for="service in promotion.services"
                            v-bind:key="service.id"
                        >
                            <p>
                                <strong
                                    >RM{{ service.price }}
                                    {{ service.name }}</strong
                                >
                                -
                                {{ service.description }}
                            </p>
                        </li>
                    </ul>
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
        promotion: Object
    }
};
</script>
