    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Testimonial</div>
                <h1 class="display-6 mb-5">Trusted By Thousands Of People And Nonprofits</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                 <?php 
            $sql = mysqli_query($conn, "SELECT * FROM testimonials") or die(mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($sql)) {
            ?>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="admin/uploads/<?= htmlspecialchars($row['image']) ?>" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p><?= htmlspecialchars($row['message']) ?></p>
                        <h5 class="mb-1"><?= htmlspecialchars($row['name']) ?></h5>
                        <span class="fst-italic"><?= htmlspecialchars($row['city']) ?></span>
                    </div>
                </div>
                <?php } ?>
              </div>
                </div>

                </div>
            </div>
        </div>
    </div>
