<?php
include 'db.php';
// include 'header.php';

$id = "";
$title = "";
$post = "";
$description = "";
$facebook = "";
$twitter = "";
$instagram = "";
$image = "";
$meta_title = "";
$meta_description = "";
$meta_keywords = "";

// edit mode – existing record fetch
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $result = $conn->query("SELECT * FROM team WHERE id = $id");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $post = $row['post'];
        $description = $row['description'];
        $facebook = $row['facebook_url'];
        $twitter = $row['twitter_url'];
        $instagram = $row['instagram_url'];
        $image = $row['image'];
        $meta_title = $row['meta_title'];
        $meta_description = $row['meta_description'];
        $meta_keywords = $row['meta_keywords'];
    }
}

// save (insert / update)
if (isset($_POST['save'])) {
    $title           = $conn->real_escape_string($_POST['title']);
    $post            = $conn->real_escape_string($_POST['post']);
    $description     = $conn->real_escape_string($_POST['description']);
    $facebook        = $conn->real_escape_string($_POST['facebook_url'] ?? '');
    $twitter         = $conn->real_escape_string($_POST['twitter_url'] ?? '');
    $instagram       = $conn->real_escape_string($_POST['instagram_url'] ?? '');
    $meta_title      = $conn->real_escape_string($_POST['meta_title']);
    $meta_description= $conn->real_escape_string($_POST['meta_description']);
    $meta_keywords   = $conn->real_escape_string($_POST['meta_keywords']);

    // handle image upload
    if (!empty($_FILES['image']['name'])) {
        $img_name = time() . "_" . basename($_FILES['image']['name']);
        $img_path = "uploads/" . $img_name;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $img_path)) {
            // file moved successfully
        } else {
            echo "Image upload failed!";
            exit;
        }
    } else {
        $img_name = $image; // existing image (edit mode)
    }

    if (empty($id)) {
        // insert
        $sql = "INSERT INTO team 
                (title, post, description, facebook_url, twitter_url, instagram_url, image, meta_title, meta_description, meta_keywords)
                VALUES 
                ('$title', '$post', '$description', 'facebook_url', 'twitter_url', 'instagram_url', '$img_name', '$meta_title', '$meta_description', '$meta_keywords')";
    } else {
        // update
        $sql = "UPDATE team SET 
                    title='$title', 
                    post='$post',
                    description='$description',
                    facebook_url='$facebook',
                    twitter_url='$twitter',
                    instagram_url='$instagram', 
                    image='$img_name',
                    meta_title='$meta_title',
                    meta_description='$meta_description',
                    meta_keywords='$meta_keywords'
                WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header("Location: team-list.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<?php include 'header.php'; ?>

<!-- ✅ Style Starts -->
<style>
    .form-container {
        max-width: 750px;
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
    input[type="file"],
    textarea {
        width: 100%;
        padding: 10px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        resize: vertical;
    }

    img.preview {
        margin-top: 10px;
        width: 120px;
        border-radius: 6px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
    }

    button {
        padding: 10px 25px;
        background-color: #28a745;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

    @media (max-width: 600px) {
        .form-container {
            padding: 15px;
        }
    }
</style>

<!-- ✅ Form Starts -->
<div class="form-container">
    <h2><?= $id ? 'Edit' : 'Add' ?> Team Member</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name / Designation</label>
            <input type="text" name="title" value="<?= htmlspecialchars($title) ?>">
        </div>
        <div class="form-group">
            <label>Post</label>
            <input type="text" name="post" value="<?= htmlspecialchars($post) ?>">
        </div>

        <div class="form-group">
            <label>Short Bio</label>
            <textarea name="description" rows="4"><?= htmlspecialchars($description) ?></textarea>
        </div>
        <div class="form-group">
            <label>Facebook URL</label>
            <input type="text" name="facebook_url" value="<?= htmlspecialchars($facebook) ?>">
        </div>
        <div class="form-group">
            <label>Twitter URL</label>
            <input type="text" name="twitter_url" value="<?= htmlspecialchars($twitter) ?>">
        </div>
        <div class="form-group">
            <label>Instagram URL</label>
            <input type="text" name="instagram_url" value="<?= htmlspecialchars($instagram) ?>">
            </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
            <?php if ($image != ""): ?>
                <img src="uploads/<?= $image ?>" class="preview">
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
