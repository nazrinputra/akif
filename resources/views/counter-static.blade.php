<x-layout>
    <!-- Contact Section-->
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Counter</h2>
            <!-- Contact Section Form-->
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <form id="contactForm" name="sentMessage" novalidate="novalidate">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Plate Number</label>
                                <input class="form-control text-center" id="email" type="email"
                                    placeholder="Plate Number" required="required"
                                    data-validation-required-message="Please enter customer car number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <button class="btn btn-primary btn-xl col" id="sendMessageButton"
                                type="submit">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>