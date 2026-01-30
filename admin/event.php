<?php
include 'db.php';
include 'header.php';

$id = "";
$title = "";
$description = "";
$image = "";
$meta_title = "";
$meta_description = "";
$meta_keywords = "";

if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $result = $conn->query("SELECT * FROM event WHERE id=$id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['description'];
        $image = $row['image'];
        $meta_title = $row['meta_title'];
        $meta_description = $row['meta_description'];
        $meta_keywords = $row['meta_keywords'];
    }
}

if (isset($_POST['save'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
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
        $sql = "INSERT INTO event (title, description, image, meta_title, meta_description, meta_keywords)
                VALUES ('$title', '$description', '$img_name', '$meta_title', '$meta_description', '$meta_keywords')";
    } else {
        $sql = "UPDATE event SET 
                    title='$title', 
                    description='$description', 
                    image='$img_name',
                    meta_title='$meta_title',
                    meta_description='$meta_description',
                    meta_keywords='$meta_keywords'
                WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header("Location: event-list.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

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

<div class="form-container">
    <h2><?= $id ? 'Edit' : 'Add' ?> Event</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Event Title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($title) ?>" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="editor"><?= htmlspecialchars($description) ?></textarea>
        </div>

        <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
            <?php if ($image): ?>
                <img id="preview" src="uploads/<?= htmlspecialchars($image) ?>" width="120">
            <?php else: ?>
                <img id="preview" src="#" width="120" style="display:none;">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Meta Title</label>
            <input type="text" name="meta_title" value="<?= htmlspecialchars($meta_title) ?>">
        </div>

        <div class="form-group">
            <label>Meta Description</label>
            <textarea name="meta_description" rows="2"><?= htmlspecialchars($meta_description) ?></textarea>
        </div>

        <div class="form-group">
            <label>Meta Keywords</label>
            <textarea name="meta_keywords" rows="2"><?= htmlspecialchars($meta_keywords) ?></textarea>
        </div>

        <div class="form-group">
            <button type="submit" name="save"><?= $id ? 'Update' : 'Save' ?></button>
        </div>
    </form>
</div>

<!-- ✅ CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => console.error(error));

    function previewImage(event) {
        const output = document.getElementById('preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = 'block';
    }
</script>
