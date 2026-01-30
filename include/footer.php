<?php
include 'admin/db.php';

// Fetch web settings data safely
$stmt = $conn->prepare("SELECT * FROM websetting WHERE id = ?");
$stmt->bind_param("i", $id);
$id = 1;
$stmt->execute();
$result = $stmt->get_result();
$row = $result ? $result->fetch_assoc() : [];
?>

<!-- Footer Start -->
<footer class="container-fluid bg-dark text-white-50 mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Logo and About Section -->
            <div class="col-lg-3 col-md-6">
                <h1 class="fw-bold text-primary mb-3">
                    <?= htmlspecialchars($row['logo_text'] ?? 'Grow Together') ?>
                </h1>
                <p class="small">
                    At <strong>Grow Together</strong>, we believe that everyone deserves dignity, hope,
                    and access to essentials like education, healthcare, and clean water.
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square me-2" href="https://www.facebook.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square me-2" href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square me-2" href="https://www.instagram.com" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-square" href="https://www.youtube.com" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Address Section -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Address</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>Rohini Sec-13, Delhi</p>
                <p><i class="fa fa-phone-alt me-3"></i>+91 123 456 7890</p>
                <p><i class="fa fa-envelope me-3"></i>ngo@cv.com</p>
            </div>

            <!-- Quick Links Section -->
            <div class="col-lg-3 col-md-6">
               <a class="btn btn-link d-block text-start" href="about.php">About Us</a>
               <a class="btn btn-link d-block text-start" href="causes.php">Terms & Conditions</a>
               <a class="btn btn-link d-block text-start" href="team.php">Support</a>
               <a class="btn btn-link d-block text-start" href="contact.php">Contact Us</a>

            </div>

            <!-- Newsletter Section -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Newsletter</h5>
                <p>Subscribe to stay updated with our latest programs and events.</p>
                <form action="contact.php" method="post" class="d-flex">
                    <input type="email" name="email" class="form-control me-2" placeholder="Your Email" required>
                    <button class="btn btn-primary" type="submit">Go</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="container-fluid border-top border-secondary py-3 mt-4">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start">
            <p class="mb-2 mb-md-0">
                &copy; <?= date('Y') ?> <a href="#" class="text-white">Grow Together</a>. All Rights Reserved.
            </p>
            <p class="mb-0">
                Designed for <a href="#" class="text-primary">NGO</a>
            </p>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</footer>
<!-- Footer End -->
