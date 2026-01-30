<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php'; ?>

<body>
    <!-- Spinner Start -->
    <?php include 'include/loader.php'; ?>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <?php include 'include/navbar.php'; ?>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Donate Now</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Donation</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Donation Form Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Donate</div>
                    <h1 class="display-6 mb-5">Support Us With Your Donation</h1>
                    <p class="mb-4">Your small contribution helps us continue our mission. Please fill the donation form below to proceed.</p>
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
                                        <option value="" selected disabled>Choose Payment Method</option>
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
                                    <textarea class="form-control" name="message" placeholder="Leave a message" id="message" style="height: 100px"></textarea>
                                    <label for="message">Message (Optional)</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-2 px-3 me-3" type="submit">
                                    Donate Now
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                                             <iframe
  src="https://www.google.com/maps?q=28.7162092,77.1170743&z=15&output=embed"
  width="100%"
  height="600"
  style="border:0;"
  allowfullscreen=""
  loading="lazy">
</iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donation Form End -->

    <!-- Footer Start -->
    <?php include 'include/footer.php'; ?>

    <!-- JavaScript Libraries -->
    <?php include 'include/script.php'; ?>
    <!-- Template Javascript -->
</body>
</html>
