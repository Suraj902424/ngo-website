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
            <h1 class="display-4 text-white animated slideInDown mb-4">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Contact Us</div>
                    <h1 class="display-6 mb-5">If You Have Any Query, Please Contact Us</h1>
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="#"></a>.</p>
<form action="process-enquiry.php" method="post">
  <div class="row g-3">
    <div class="col-md-6">
      <div class="form-floating">
        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
        <label for="name">Your Name</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating">
        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
        <label for="email">Your Email</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating">
        <input type="text" class="form-control" name="phone" id="phone" placeholder="your Mobile Number" required>
        <label for="subject">Mobile number</label>
      </div>
    </div>

     <div class="col-md-6">
      <div class="form-floating">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        <label for="subject">Subject</label>
      </div>
    </div>
    
    <div class="col-12">
      <div class="form-floating">
        <textarea class="form-control" name="message" id="message" placeholder="Leave a message here" style="height: 100px" required></textarea>
        <label for="message">Message</label>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary py-2 px-3 me-3" type="submit" name="submit">
        Send Message
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
    <!-- Contact End -->


    <!-- Footer Start -->
  <!-- Footer Start -->
    <?php include 'include/footer.php'; ?>


    <!-- JavaScript Libraries -->
    <?php include 'include/script.php'; ?>
    <!-- Template Javascript -->
</body>

</html>