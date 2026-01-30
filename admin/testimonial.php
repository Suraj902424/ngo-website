<?php
include 'db.php';
include 'header.php';

$id = "";
$name = "";
$city = "";
$message = "";
$image = "";
$meta_title = "";
$meta_description = "";
$meta_keywords = "";

if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $result = $conn->query("SELECT * FROM testimonials WHERE id=$id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $city = $row['city'];
        $message = $row['message'];
        $image = $row['image'];
        $meta_title = $row['meta_title'];
        $meta_description = $row['meta_description'];
        $meta_keywords = $row['meta_keywords'];
    }
}

if (isset($_POST['save'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $city = $conn->real_escape_string($_POST['city']);
    $message = $conn->real_escape_string($_POST['message']);
    $meta_title = $conn->real_escape_string($_POST['meta_title']);
    $meta_description = $conn->real_escape_string($_POST['meta_description']);
    $meta_keywords = $conn->real_escape_string($_POST['meta_keywords']);

    if (!empty($_FILES['image']['name'])) {
        $img_name = time() . "_" . basename($_FILES['image']['name']);
        $img_path = "uploads/" . $img_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $img_path);
    } else {
        $img_name = $image;
    }

    if ($id == "") {
        $sql = "INSERT INTO testimonials (name, city, message, image, meta_title, meta_description, meta_keywords)
                VALUES ('$name', '$city', '$message', '$img_name', '$meta_title', '$meta_description', '$meta_keywords')";
    } else {
        $sql = "UPDATE testimonials SET 
                    name='$name',
                    city='$city',
                    message='$message',
                    image='$img_name',
                    meta_title='$meta_title',
                    meta_description='$meta_description',
                    meta_keywords='$meta_keywords'
                WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header("Location: testimonial-list.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2><?= $id ? 'Edit' : 'Add' ?> Testimonial</h2>

<form method="post" enctype="multipart/form-data">
    <label>Name</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required><br><br>

    <label>City/Post</label><br>
    <input type="text" name="city" value="<?= htmlspecialchars($city) ?>" required><br><br>

    <label>Message</label><br>
    <textarea name="message" id="editor"><?= htmlspecialchars($message) ?></textarea><br><br>

    <label>Upload Image</label><br>
    <input type="file" name="image" accept="image/*" onchange="previewImage(event)"><br><br>

    <img id="preview" src="<?= $image ? 'uploads/' . htmlspecialchars($image) : '' ?>" width="120" style="margin-top: 10px; <?= $image ? '' : 'display:none;' ?>"><br><br>

    <label>Meta Title</label><br>
    <input type="text" name="meta_title" value="<?= htmlspecialchars($meta_title) ?>"><br><br>

    <label>Meta Description</label><br>
    <textarea name="meta_description" rows="2"><?= htmlspecialchars($meta_description) ?></textarea><br><br>

    <label>Meta Keywords</label><br>
    <textarea name="meta_keywords" rows="2"><?= htmlspecialchars($meta_keywords) ?></textarea><br><br>

    <button type="submit" name="save"><?= $id ? 'Update' : 'Save' ?></button>
</form>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<!-- <script>
    ClassicEditor.create(document.querySelector('#editor')).catch(error => { console.error(error); });

    function previewImage(event) {
        const output = document.getElementById('preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = 'block';
    }
</script> -->
<style>
    .form-container {
        max-width: 700px;
        margin: 30px auto;
        padding: 25px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        font-family: sans-serif;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #222;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        resize: vertical;
    }

    input[type="file"] {
        margin-top: 5px;
    }

    button {
        padding: 10px 25px;
        background-color: #007bff;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    #preview {
        margin-top: 10px;
        border-radius: 5px;
    }

    @media (max-width: 600px) {
        .form-container {
            padding: 15px;
        }
    }
</style>
