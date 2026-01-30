<?php
// DB connection
include 'admin/db.php';

// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// form से data लेना
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donor_name = trim($_POST['donor_name']);
    $donor_email = trim($_POST['donor_email']);
    $donor_phone = trim($_POST['donor_phone']);
    $amount = trim($_POST['amount']);
    $payment_method = trim($_POST['payment_method']);
    $message = trim($_POST['message']);

    // prepared statement
    $stmt = $conn->prepare("INSERT INTO donations 
        (donor_name, donor_email, donor_phone, amount, payment_method, message) 
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", 
        $donor_name, 
        $donor_email, 
        $donor_phone, 
        $amount, 
        $payment_method, 
        $message
    );

    if ($stmt->execute()) {
        // success
        echo "<script>alert('Thank you for your donation!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
