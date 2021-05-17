<template>
    <breeze-authenticated-layout>
        <!-- <template #header>Header</template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row p-3">
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                                <h2>Counter</h2>
                                <p>Register car and customer into queue.</p>
                                <p>
                                    <a class="btn btn-secondary" href="#"
                                        >Counter</a
                                    >
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                                <h2>WhatsApp</h2>
                                <p>Modify WhatsApp messages for the store.</p>
                                <p>
                                    <a class="btn btn-secondary" href="#"
                                        >WhatsApp</a
                                    >
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                                <h2>Cars</h2>
                                <p>
                                    View, add or edit cars registered in the
                                    system.
                                </p>
                                <p>
                                    <a class="btn btn-secondary" href="#"
                                        >Cars</a
                                    >
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                                <h2>Customers</h2>
                                <p>
                                    Add new customer, view or update existing
                                    customers.
                                </p>
                                <p>
                                    <a class="btn btn-secondary" href="#"
                                        >Customers</a
                                    >
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                                <h2>Services</h2>
                                <p>
                                    View services in the system and make
                                    modifications.
                                </p>
                                <p>
                                    <a class="btn btn-secondary" href="#"
                                        >Services</a
                                    >
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                                <h2>Packages</h2>
                                <p>
                                    Define packages or create new promotional
                                    package.
                                </p>
                                <p>
                                    <a class="btn btn-secondary" href="#"
                                        >Packages</a
                                    >
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                                <h2>Reports</h2>
                                <p>Generate monthly reports and statistics.</p>
                                <p>
                                    <a class="btn btn-secondary" href="#"
                                        >Reports</a
                                    >
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-5">
                                <h2>Crews</h2>
                                <p>
                                    Enable or disable staff access to the
                                    system.
                                </p>
                                <p>
                                    <a class="btn btn-secondary" href="#"
                                        >Crews</a
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";

export default {
    components: {
        BreezeAuthenticatedLayout
    },

    props: {
        auth: Object,
        errors: Object
    }
};
</script>
