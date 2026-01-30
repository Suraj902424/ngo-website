<?php
include 'db.php';
include 'header.php';

$message = "";

// Delete subject
if (isset($_GET['delete_id'])) {
    $delete_id = (int) $_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM subjects WHERE id = $delete_id");
    $message = "🗑️ Subject deleted successfully!";
}

// Insert new subject
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['edit_id'])) {
    $course_id = (int) $_POST['course_id'];
    $name = trim($_POST['name']);
    $status = 'Active';
    $image = '';

    if (!empty($_FILES['image']['name'])) {
        $img_name = time() . '_' . basename($_FILES['image']['name']);
        $target_path = 'uploads/' . $img_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $image = $img_name;
        }
    }

    if ($course_id > 0 && $name != '') {
        $sql = "INSERT INTO subjects (course_id, name, image, status) VALUES ('$course_id', '$name', '$image', '$status')";
        if (mysqli_query($conn, $sql)) {
            $message = "✅ Subject added successfully!";
        } else {
            $message = "❌ Error: " . mysqli_error($conn);
        }
    } else {
        $message = "❌ Please fill all required fields.";
    }
}

// Edit subject
if (isset($_GET['edit_id'])) {
    $edit_id = (int) $_GET['edit_id'];
    $edit_data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM subjects WHERE id = $edit_id"));
}

// Update subject
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $edit_id = (int) $_POST['edit_id'];
    $course_id = (int) $_POST['course_id'];
    $name = trim($_POST['name']);
    $status = 'Active';

    $image = $_POST['old_image'];

    if (!empty($_FILES['image']['name'])) {
        $img_name = time() . '_' . basename($_FILES['image']['name']);
        $target_path = 'uploads/' . $img_name;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $image = $img_name;
        }
    }

    $update_sql = "UPDATE subjects SET course_id='$course_id', name='$name', image='$image', status='$status' WHERE id='$edit_id'";
    if (mysqli_query($conn, $update_sql)) {
        $message = "✅ Subject updated successfully!";
    } else {
        $message = "❌ Update failed: " . mysqli_error($conn);
    }
}

// Fetch all courses
$courses = mysqli_query($conn, "SELECT id, title FROM courses ORDER BY title");

// Fetch all subjects
$subjects = mysqli_query($conn, "SELECT s.*, c.title as course_title FROM subjects s LEFT JOIN courses c ON s.course_id = c.id ORDER BY s.id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add/Edit Subject</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 30px; }
        .container { max-width: 800px; background: white; margin: auto; padding: 20px; border-radius: 10px; }
        h2 { text-align: center; }
        label { font-weight: bold; margin-top: 10px; display: block; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; border-radius: 4px; border: 1px solid #ccc; }
        button { margin-top: 15px; padding: 10px; background: #3498db; color: white; border: none; width: 100%; border-radius: 5px; }
        .message { background: #e0f7fa; padding: 10px; margin-top: 15px; border-left: 5px solid #00796b; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background: #eee; }
        .actions a { margin-right: 8px; padding: 5px 8px; border-radius: 4px; color: white; text-decoration: none; }
        .edit { background: #f39c12; }
        .delete { background: #e74c3c; }
    </style>
</head>
<body>
<div class="container">
    <h2><?= isset($edit_data) ? "✏️ Edit Subject" : "➕ Add Subject" ?></h2>

    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <label>Course:</label>
        <select name="course_id" required>
            <option value="">-- Select Course --</option>
            <?php while ($course = mysqli_fetch_assoc($courses)): ?>
                <option value="<?= $course['id'] ?>" <?= isset($edit_data) && $edit_data['course_id'] == $course['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($course['title']) ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Subject Name:</label>
        <input type="text" name="name" value="<?= $edit_data['name'] ?? '' ?>" required>

        <label>Image (optional):</label>
        <input type="file" name="image" accept="image/*">
        <?php if (!empty($edit_data['image'])): ?>
            <br><img src="uploads/<?= $edit_data['image'] ?>" width="60">
        <?php endif; ?>
        <input type="hidden" name="old_image" value="<?= $edit_data['image'] ?? '' ?>">

        <?php if (isset($edit_data)): ?>
            <input type="hidden" name="edit_id" value="<?= $edit_data['id'] ?>">
            <button type="submit">✅ Update Subject</button>
        <?php else: ?>
            <button type="submit">➕ Add Subject</button>
        <?php endif; ?>
    </form>

    <h3>📚 Subjects List</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Course</th>
                <th>Subject</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; while ($sub = mysqli_fetch_assoc($subjects)): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($sub['course_title']) ?></td>
                    <td><?= htmlspecialchars($sub['name']) ?></td>
                    <td>
                        <?php if ($sub['image']): ?>
                            <img src="uploads/<?= $sub['image'] ?>" width="50">
                        <?php else: ?> - <?php endif; ?>
                    </td>
                    <td><?= $sub['status'] ?></td>
                    <td>
                        <a href="?edit_id=<?= $sub['id'] ?>" class="edit">Edit</a>
                        <a href="?delete_id=<?= $sub['id'] ?>" onclick="return confirm('Delete this subject?');" class="delete">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
