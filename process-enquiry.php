<?php
include 'admin/db.php'; // $conn = new mysqli(...)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $phone  = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO enquiry (name, email, phone, subject, message)
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    if ($conn->query($sql)) {
        echo "<script>alert('Thank you! We have received your enquiry.');window.location.href='contact.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
