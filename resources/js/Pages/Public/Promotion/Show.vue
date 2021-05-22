<template>
    <teleport to="title"> - {{ promotion.name }} </teleport>
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
                :href="route('promotions.index')"
                >Promotions</inertia-link
            >
        </li>
    </teleport>
    <section class="masthead">
        <div class="container p-4">
            <div
                class="row featurette pt-5 mt-4 shadow px-2 p-3 mb-5 bg-white rounded"
            >
                <div class="col-md-6">
                    <h1 class="featurette-heading ">
                        {{ promotion.name }}
                    </h1>
                    <h4>Price: RM {{ promotion.price }}</h4>
                    <h5>
                        <span class="text-muted">
                            Frequency: {{ promotion.frequency }} <br />
                            Duration: {{ promotion.duration }} <br
                        /></span>
                    </h5>
                    <p class="lead">
                        {{ promotion.description }}
                    </p>
                </div>
                <!-- <div class="col-md-5">
                    <svg
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        width="500"
                        height="500"
                        xmlns="http://www.w3.org/2000/svg"
                        role="img"
                        aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice"
                        focusable="false"
                    >
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" />
                        <text x="50%" y="50%" fill="#aaa" dy=".3em">
                            500x500
                        </text>
                    </svg>
                </div> -->
                <div id="accordion" class="col-md-6 pb-4">
                    <div
                        class="card"
                        v-for="(service, index) in promotion.services"
                        v-bind:key="service.id"
                    >
                        <div class="card-header" :id="'header' + index">
                            <h5 class="mb-0">
                                <button
                                    class="btn btn-link"
                                    data-toggle="collapse"
                                    :data-target="'#body' + index"
                                    aria-expanded="true"
                                    :aria-controls="'body' + index"
                                >
                                    {{ service.name }}
                                </button>
                            </h5>
                        </div>

                        <div
                            :id="'body' + index"
                            class="collapse"
                            :aria-labelledby="'header' + index"
                            data-parent="#accordion"
                        >
                            <div class="card-body">
                                {{ service.description }}
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
export default {
    props: {
        auth: Object,
        errors: Object,
        promotion: Object
    }
};
</script>
