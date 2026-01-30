<?php
include 'admin/db.php';

// Fetch web settings data
$result = $conn->query("SELECT * FROM websetting WHERE id = 1");
$row = $result ? $result->fetch_assoc() : [];
?>
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
            <h1 class="display-4 text-white animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100 pt-5 pe-5" src="admin/uploads/<?= htmlspecialchars($row['about_image']) ?>" alt="" style="object-fit: cover;">
                        <!-- <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="img/about-2.jpg" alt="" style="width: 200px; height: 200px;"> -->
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">About Us</div>
                        <h1 class="display-6 mb-5"><?= htmlspecialchars($row['about_title']) ?></h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <p class="text-dark mb-2"><?= htmlspecialchars($row['about_subtitle']) ?></p>
                            <span class="text-primary">Alice Bromine, Founder</span>
                        </div>
                        <p class="mb-5"><?= htmlspecialchars($row['about_description']) ?></p>
                        <!-- <a class="btn btn-primary py-2 px-3 me-3" href="">
                            Learn More
                            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                        <a class="btn btn-outline-primary py-2 px-3" href="">
                            Contact Us
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
        <?php include 'include/service.php'; ?>

    <!-- Service End -->


    <!-- Footer Start -->
 <!-- Footer Start -->
    <?php include 'include/footer.php'; ?>


    <!-- JavaScript Libraries -->
    <?php include 'include/script.php'; ?>
    <!-- Template Javascript -->
</body>

</html>