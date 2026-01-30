<div class="container-fluid donate my-5 py-5" data-parallax="scroll" data-image-src="img/carousel-2.jpg">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            
            <!-- Left Content -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Donate Now</div>
                <h1 class="display-6 text-white mb-4">Your Support Can Change Lives</h1>
                <p class="text-white-50 mb-4">
                    Every contribution you make helps us provide education, healthcare, and clean water to those in need across India. 
                    Join us in building a brighter, healthier, and more hopeful future for underprivileged families and children.
                </p>
                <p class="text-white fw-semibold">
                    Together, we can turn compassion into action — one donation at a time.
                </p>
            </div>

            <!-- Donation Form -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 bg-white p-5 rounded shadow-lg">
                    <h3 class="mb-4 text-primary">Make a Secure Donation</h3>
                    <form action="process-donation.php" method="post">
                        <div class="row g-3">
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="donor_name" id="donor_name" placeholder="Your Name" required>
                                    <label for="donor_name">Your Name</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="donor_email" id="donor_email" placeholder="Your Email" required>
                                    <label for="donor_email">Your Email</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="donor_phone" id="donor_phone" placeholder="Your Phone" required>
                                    <label for="donor_phone">Your Phone</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="amount" id="amount" placeholder="Donation Amount" required>
                                    <label for="amount">Donation Amount (₹)</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" name="payment_method" id="payment_method" required>
                                        <option value="" selected disabled>Select Payment Method</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Net Banking">Net Banking</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="Debit Card">Debit Card</option>
                                    </select>
                                    <label for="payment_method">Payment Method</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" id="message" placeholder="Leave a message (optional)" style="height: 100px"></textarea>
                                    <label for="message">Message (Optional)</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary py-2 px-4 w-100" type="submit">
                                    <i class="fa fa-heart me-2"></i> Donate Now
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="mt-3 small text-muted">
                        100% of your donation goes directly to our ongoing projects. All donations are tax-deductible under Section 80G of the Income Tax Act (India).
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
