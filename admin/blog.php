<?php
ob_start(); // Fixes "headers already sent" warning
include 'db.php';
include 'header.php';

$id = "";
$title = "";
$name = "";
$date = date('Y-m-d H:i:s');
$description = "";
$image = "";
$meta_title = "";
$meta_description = "";
$meta_keywords = "";

// Edit mode: fetch data
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $result = $conn->query("SELECT * FROM blog WHERE id=$id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $name = $row['name'];
        $date = $row['date'];
        $description = $row['description'];
        $image = $row['image'];
        $meta_title = $row['meta_title'];
        $meta_description = $row['meta_description'];
        $meta_keywords = $row['meta_keywords'];
    }
}

// Handle save or update
if (isset($_POST['save'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $name = $conn->real_escape_string($_POST['name']);
    $date = date('Y-m-d H:i:s');
$description = $conn->real_escape_string(strip_tags($_POST['description']));
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
        $sql = "INSERT INTO blog (title, name, date, description, image, meta_title, meta_description, meta_keywords)
                VALUES ('$title', 'name', 'date', '$description', '$img_name', '$meta_title', '$meta_description', '$meta_keywords')";
    } else {
        $sql = "UPDATE blog SET 
                    title='$title', 
                    name='$name',
                    date='$date',
                    description='$description', 
                    image='$img_name',
                    meta_title='$meta_title',
                    meta_description='$meta_description',
                    meta_keywords='$meta_keywords'
                WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header("Location: blog-list.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2><?= $id ? 'Edit' : 'Add' ?> Blog</h2>

<form method="post" enctype="multipart/form-data">
    <label>Title</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($title) ?>" required><br><br>
      <label>Name</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" ><br><br>
    <label>Date</label><br>
    <input type="datetime-local" name="date" value="<?= date('Y-m-d\TH:i', strtotime($date)) ?>" required><br><br>

    <label>Description</label><br>
    <textarea name="description" id="editor"><?= htmlspecialchars($description) ?></textarea><br><br>

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

<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    function previewImage(event) {
        const output = document.getElementById('preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = 'block';
    }
</script>

<?php ob_end_flush(); ?>

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
