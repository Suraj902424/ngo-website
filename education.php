<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education - Empowering Children Through Education</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <?php include 'include/head.php'; ?>

</head>
<body>
    
        <!-- Spinner Start -->
   <?php include 'include/loader.php'; ?>
    <!-- Spinner End -->


    <!-- Navbar Start -->
     <?php include 'include/navbar.php'; ?>
    <!-- Navbar End -->
    <!-- Header -->
    <div class="container-fluid bg-primary py-5 text-white text-center">
        <h1 class="display-5 fw-bold">Empowering Children Through Education</h1>
        <p class="lead mb-0">Education is the most powerful weapon to change the world.</p>
    </div>

    <!-- Content -->
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <img src="img/courses-1.jpg" class="img-fluid rounded shadow" alt="Education for children">
            </div>
            <div class="col-lg-6">
                <h2 class="text-primary mb-4">Our Mission</h2>
                <p>
                    We believe every child deserves a chance to learn. Our Education Program provides
                    free schooling, digital tools, uniforms, and mentorship to underprivileged children across rural India.
                </p>
                <p>
                    With your support, we aim to build smart classrooms and enhance digital learning access in villages.
                </p>
                <a href="causes.php" class="btn btn-primary mt-3">← Back to Causes</a>
            </div>
        </div>
    </div>
</body>

    <!-- Footer Start -->
    <?php include 'include/footer.php'; ?>


    <!-- JavaScript Libraries -->
    <?php include 'include/script.php'; ?>
    <!-- Template Javascript -->
</html>
<style>
नमस्ते! आपके सभी स्टाइलिंग अनुरोधों (कस्टम कलर #957158, बैकग्राउंड इमेज, और बढ़ी हुई पैडिंग) को मिलाकर मैं आपको अंतिम और सम्पूर्ण CSS कोड दे रहा हूँ। यह कोड आपके पेज को एक सुसंगत (consistent) और पेशेवर (professional) लुक देगा।

इस कोड को सीधे अपनी css/style.css फ़ाइल में कॉपी-पेस्ट करें।

🏆 फाइनल और सम्पूर्ण CSS कोड (css/style.css)
CSS

/*
 * 1. ग्लोबल वेरिएबल और बेस स्टाइलिंग
 * ----------------------------------------------------
 */
:root {
    /* कस्टम रंग: आपने दिया गया रंग प्राइमरी कलर होगा */
    --primary-color: #957158;     /* भूरा-पीला/अर्थ टोन */
    --primary-hover: #7b5b46;     /* हॉवर के लिए गहरा शेड */
    --heading-color: #343a40;     /* हेडिंग्स के लिए गहरा ग्रे */
    --text-color: #5a6268;        /* बॉडी टेक्स्ट के लिए मीडियम ग्रे */
    --white: #ffffff;
}

body {
    /* फ़ॉन्ट: आधुनिक 'Montserrat' और 'Open Sans' (इन्हें Google Fonts से लिंक करना ज़रूरी है) */
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

/* OUR MISSION हेडिंग को प्राइमरी रंग दें */
.col-lg-6 h2 {
    color: var(--primary-color) !important;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: 800;
    margin-bottom: 1.5rem;
}

/*
 * 3. हेडर सेक्शन (बैनर) - इमेज, ग्रेडिएंट और बढ़ी हुई पैडिंग
 * ----------------------------------------------------
 */
.container-fluid.bg-primary {
    /* बैकग्राउंड: डार्क ओवरले के साथ इमेज (आपका पाथ इस्तेमाल किया गया है) */
    background: linear-gradient(rgba(0, 29, 35, 0.8), rgb(24 59 67)), url('../img/carousel-1.jpg') center center no-repeat;
    background-size: cover;
    background-attachment: fixed; /* (Optional) इमेज को स्क्रॉल करने पर स्थिर रखने के लिए */
    
    /* अनुरोध के अनुसार ज़्यादा पैडिंग */
    padding-top: 7rem !important;
    padding-bottom: 7rem !important; 
    color: var(--white); 
}

/* बैनर के अंदर की हेडिंग और टेक्स्ट को सफ़ेद करें */
.container-fluid.bg-primary h1,
.container-fluid.bg-primary p {
    color: var(--white);
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* पढ़ने में आसानी के लिए हल्का शैडो */
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
    /* नीचे और ऊपर समान पैडिंग */
    padding-top: 5rem !important;
    padding-bottom: 5rem !important;
}

.row.g-4 {
    align-items: center; 
}

/* इमेज स्टाइलिंग */
.img-fluid.rounded.shadow {
    border-radius: 15px !important; 
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); 
    transition: transform 0.3s ease-in-out, box-shadow 0.3s;
}

.img-fluid.rounded.shadow:hover {
    transform: translateY(-5px); 
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15); /* हॉवर पर गहरा शैडो */
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
