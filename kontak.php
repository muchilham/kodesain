<!-- Contact Section -->
    <section id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Kontak</h2>
                    <h3 class="section-subheading"></h3>
                </div>
            </div>
            <div class="row">
     			<div class="col-md-4 text-center">
        			<h5><i class="fa fa-map-marker"></i> Address</h5>
        			<p>Jl. Bambu Hitam, Bambu Apus, Cipayung - Jakarta Timur 13890</p>
      			</div>
      			<div class="col-md-4 text-center">
        			<h5><i class="fa fa-envelope-o"></i> Email</h5>
        			<p>kodesain@kodesain.com</p>
                    <p>kodesain@kodesain.com</p>
                    <p>kodesain@kodesain.com</p>
      			</div>
      			<div class="col-md-4 text-center">
        			<h5><i class="fa fa-phone"></i> Phone</h5>
        			<p>+62 896 3010 0214</p>
                    <p>+62 896 3010 0214</p>
                    <p>+62 896 3010 0214</p>
                </div>
    		</div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="contact text-muted"><br><br></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" method="POST" novalidate action="user/kritik_saran_proses.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name." name="name">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address." name="email">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number." name="phone">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message." name="message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
