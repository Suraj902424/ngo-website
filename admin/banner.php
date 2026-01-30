<?php
include 'db.php';
// include 'header.php';

$id = "";
$title = "";
$description = "";
$image = "";
$meta_title = "";
$meta_description = "";
$meta_keywords = "";

if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $result = $conn->query("SELECT * FROM banner WHERE id=$id");
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
        $sql = "INSERT INTO banner (title, description, image, meta_title, meta_description, meta_keywords) 
                VALUES ('$title', '$description', '$img_name', '$meta_title', '$meta_description', '$meta_keywords')";
    } else {
        $sql = "UPDATE banner SET 
                    title='$title', 
                    description='$description', 
                    image='$img_name',
                    meta_title='$meta_title',
                    meta_description='$meta_description',
                    meta_keywords='$meta_keywords'
                WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header("Location: banner-list.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<?php include 'header.php'; ?>

<h2><?= $id ? 'Edit' : 'Add' ?> Banner</h2>

<form method="post" enctype="multipart/form-data" class="form-container">
    <label>Title</label>
    <input type="text" name="title" value="<?= htmlspecialchars($title) ?>" required>

    <label>Description</label>
    <textarea name="description" rows="4"><?= htmlspecialchars($description) ?></textarea>

    <label>Upload Image</label>
    <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
    <br>
    <img id="preview" src="<?= $image ? 'uploads/' . htmlspecialchars($image) : '' ?>" width="120" style="margin-top: 10px; <?= $image ? '' : 'display:none;' ?>">

    <label>Meta Title</label>
    <input type="text" name="meta_title" value="<?= htmlspecialchars($meta_title) ?>">

    <label>Meta Description</label>
    <textarea name="meta_description" rows="2"><?= htmlspecialchars($meta_description) ?></textarea>

    <label>Meta Keywords</label>
    <textarea name="meta_keywords" rows="2"><?= htmlspecialchars($meta_keywords) ?></textarea>

    <button type="submit" name="save"><?= $id ? 'Update' : 'Save' ?></button>
</form>

<script>
function previewImage(event) {
    const output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';
}
</script>
