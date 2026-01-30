<?php 
include 'db.php';
include 'header.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$editData = [];

if ($id) {
    $editData = $conn->query("SELECT * FROM courses WHERE id = $id")->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title         = $_POST['title'];
    $category_id   = $_POST['category_id'];
    $description   = $_POST['description'];
    $duration      = $_POST['duration'];
    $price         = $_POST['price'];
    $age_group     = $_POST['age_group'];
    $teacher_name  = $_POST['teacher_name'];
    $video_name    = $_POST['video_name'] ?? '';
    $video_url     = $_POST['video_url'] ?? '';

    $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : ($editData['image'] ?? '');
    $teacher_image = $_FILES['teacher_image']['name'] ? $_FILES['teacher_image']['name'] : ($editData['teacher_image'] ?? '');
    $video_file = $_FILES['video_file']['name'] ? $_FILES['video_file']['name'] : ($editData['video_file'] ?? '');

    // Upload images and video
    if ($_FILES['image']['name']) {
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
    }
    if ($_FILES['teacher_image']['name']) {
        move_uploaded_file($_FILES['teacher_image']['tmp_name'], 'uploads/' . $teacher_image);
    }
    if ($_FILES['video_file']['name']) {
        move_uploaded_file($_FILES['video_file']['tmp_name'], 'uploads/' . $video_file);
    }

    if ($id) {
        // Update
        $conn->query("UPDATE courses SET 
            category_id = '$category_id',
            title = '$title',
            description = '$description',
            image = '$image',
            duration = '$duration',
            price = '$price',
            age_group = '$age_group',
            teacher_name = '$teacher_name',
            teacher_image = '$teacher_image',
            video_name = '$video_name',
            video_url = '$video_url',
            video_file = '$video_file'
            WHERE id = $id");
    } else {
        // Insert
        $conn->query("INSERT INTO courses 
            (category_id, title, description, image, duration, price, age_group, teacher_name, teacher_image, video_name, video_url, video_file) 
            VALUES 
            ('$category_id', '$title', '$description', '$image', '$duration', '$price', '$age_group', '$teacher_name', '$teacher_image', '$video_name', '$video_url', '$video_file')");
    }

    // header("Location: course-list.php");
}
?>

<div class="form-container">
    <h2><?= $id ? 'Edit' : 'Add' ?> Course</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Category</label>
        <select name="category_id" required>
            <option value="">--Select--</option>
            <?php 
            $cat = $conn->query("SELECT * FROM categories");
            while($row = $cat->fetch_assoc()) {
                $selected = ($editData && $editData['category_id'] == $row['id']) ? "selected" : "";
                echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
            }
            ?>
        </select>

        <label>Title</label>
        <input type="text" name="title" value="<?= $editData['title'] ?? '' ?>" required>

        <label>Description</label>
        <textarea name="description" rows="5"><?= $editData['description'] ?? '' ?></textarea>

        <label>Course Image</label>
        <?php if (!empty($editData['image'])): ?>
            <img src="uploads/<?= $editData['image'] ?>" width="100" height="100"><br>
        <?php endif; ?>
        <input type="file" name="image" accept="image/*">

        <label>Teacher Image</label>
        <?php if (!empty($editData['teacher_image'])): ?>
            <img src="uploads/<?= $editData['teacher_image'] ?>" width="100" height="100"><br>
        <?php endif; ?>
        <input type="file" name="teacher_image" accept="image/*">

        <label>Duration</label>
        <input type="text" name="duration" value="<?= $editData['duration'] ?? '' ?>">

        <label>Age Group</label>
        <input type="text" name="age_group" value="<?= $editData['age_group'] ?? '' ?>">

        <label>Teacher Name</label>
        <input type="text" name="teacher_name" value="<?= $editData['teacher_name'] ?? '' ?>">

        <label>Price (₹)</label>
        <input type="number" name="price" value="<?= $editData['price'] ?? '' ?>" step="0.01">

        <label>Video Name</label>
        <input type="text" name="video_name" value="<?= $editData['video_name'] ?? '' ?>">

        <label>Video URL (YouTube etc.)</label>
        <input type="text" name="video_url" value="<?= $editData['video_url'] ?? '' ?>">

        <label>Upload Video</label>
        <?php if (!empty($editData['video_file'])): ?>
            <p>Old Video: <?= $editData['video_file'] ?></p>
        <?php endif; ?>
        <input type="file" name="video_file" accept="video/*">

        <button type="submit"><?= $id ? 'Update' : 'Add' ?> Course</button>
    </form>
</div>
