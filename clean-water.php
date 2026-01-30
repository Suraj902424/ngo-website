<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php'; ?>
</head>
<body>
      <!-- Spinner Start -->
   <?php include 'include/loader.php'; ?>
    <!-- Spinner End -->


    <!-- Navbar Start -->
     <?php include 'include/navbar.php'; ?>
    <!-- Header -->
    <div class="container-fluid bg-primary py-5 text-white text-center">
        <h1 class="display-5 fw-bold">Safe Drinking Water for Every Family</h1>
        <p class="lead mb-0">Clean water is a right, not a privilege.</p>
    </div>

    <!-- Content -->
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <img src="img/courses-2.jpg" class="img-fluid rounded shadow" alt="Clean water initiative">
            </div>
            <div class="col-lg-6">
                <h2 class="text-primary mb-4">Our Initiative</h2>
                <p>
                    Our Clean Water project installs hand pumps, water filters, and purification systems in
                    water-scarce villages. We educate communities on water conservation and hygiene.
                </p>
                <p>
                    With your help, we are ensuring families in remote areas have access to safe drinking water.
                </p>
                <a href="causes.php" class="btn btn-primary mt-3">← Back to Causes</a>
            </div>
        </div>
    </div>
        <!-- Footer Start -->
    <?php include 'include/footer.php'; ?>


    <!-- JavaScript Libraries -->
    <?php include 'include/script.php'; ?>
    <!-- Template Javascript -->
    <style>
         /*
 * 1. ग्लोबल वेरिएबल और बेस स्टाइलिंग
 * ----------------------------------------------------
 */
:root {
    /* कस्टम रंग: आपने दिया गया भूरा-पीला रंग प्राइमरी कलर */
    --primary-color: #957158;     
    --primary-hover: #7b5b46;     /* हॉवर के लिए गहरा शेड */
    --heading-color: #343a40;     /* हेडिंग्स के लिए गहरा ग्रे */
    --text-color: #5a6268;        /* बॉडी टेक्स्ट के लिए मीडियम ग्रे */
    --white: #ffffff;
}

body {
    /* फ़ॉन्ट: Open Sans और Montserrat */
    font-family: 'Open Sans', sans-serif;
    color: var(--text-color);
    line-height: 1.75;
    background-color: var(--white);
}

/*
 * 2. टाइपोग्राफी और हेडिंग्स
 * ----------------------------------------------------
 */
h1, h2, h3, h4 {
    font-family: 'Montserrat', sans-serif;
    color: var(--heading-color);
    font-weight: 700;
}

/* सेक्शन हेडिंग्स (e.g., 'OUR MISSION', 'Our Initiative') */
.col-lg-6 h2 {
    color: var(--primary-color) !important; /* प्राइमरी रंग */
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: 800;
    margin-bottom: 1.5rem;
}

/*
 * 3. हेडर सेक्शन (बैनर) - बैकग्राउंड और पैडिंग
 * ----------------------------------------------------
 */
.container-fluid.bg-primary {
    /* बैकग्राउंड: डार्क ओवरले के साथ इमेज (Path: ../img/carousel-1.jpg) */
    background: linear-gradient(rgba(0, 29, 35, 0.8), rgb(24 59 67)), url('../img/carousel-1.jpg') center center no-repeat;
    background-size: cover;
    background-attachment: fixed; 
    
    /* बढ़ी हुई पैडिंग (7rem) */
    padding-top: 7rem !important;
    padding-bottom: 7rem !important; 
}

/* बैनर के अंदर की हेडिंग और टेक्स्ट को सफ़ेद करें */
.container-fluid.bg-primary h1,
.container-fluid.bg-primary p {
    color: var(--white);
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); 
}

.container-fluid.bg-primary h1 {
    font-size: 3rem;
    font-weight: 800;
}

/*
 * 4. कंटेंट सेक्शन और इमेज
 * ----------------------------------------------------
 */
.container.py-5 {
    padding-top: 5rem !important;
    padding-bottom: 5rem !important;
}

.row.g-4 {
    align-items: center; 
}

/* इमेज स्टाइलिंग (दोनों pages के लिए) */
.img-fluid.rounded.shadow {
    border-radius: 15px !important; 
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); 
    transition: transform 0.3s ease-in-out, box-shadow 0.3s;
}

.img-fluid.rounded.shadow:hover {
    transform: translateY(-5px); 
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15); 
}


/*
 * 5. बटन स्टाइलिंग
 * ----------------------------------------------------
 */
.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    padding: 12px 35px;
    font-size: 1.05rem;
    font-weight: 600;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: var(--primary-hover);
    border-color: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(149, 113, 88, 0.4);
}
    </style>
</body>
</html>
