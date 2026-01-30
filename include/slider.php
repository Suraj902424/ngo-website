<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php 
            $sql = mysqli_query($conn, "SELECT * FROM banner") or die(mysqli_error($conn));
            $isFirst = true; // पहली स्लाइड active के लिए
            while ($row = mysqli_fetch_assoc($sql)) {
                $activeClass = $isFirst ? 'active' : '';
            ?>
            <div class="carousel-item <?= $activeClass ?>">
                <img class="w-100" src="admin/uploads/<?= htmlspecialchars($row['image']) ?>" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 pt-5">
                                <h1 class="display-4 text-white mb-3 animated slideInDown">
                                    <?= htmlspecialchars($row['title']) ?>
                                </h1>
                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">
                                    <?= htmlspecialchars($row['description']) ?>
                                </p>
                               
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php
            $isFirst = false; // पहली स्लाइड के बाद सभी को active नहीं बनाना
         } ?>
            
            <!-- 
            <div class="carousel-item">
                <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 pt-5">
                                <h1 class="display-4 text-white mb-3 animated slideInDown">
                                    Let's Save More Lifes With Our Helping Hand
                                </h1>
                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">
                                    Aliqu diam amet diam et eos. Clita erat ipsum et lorem sed stet lorem sit clita duo justo erat amet
                                </p>
                                <a class="btn btn-primary py-2 px-3 animated slideInDown" href="">
                                    Learn More
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            -->
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
