<?php
include 'db.php';

// Handle delete BEFORE any output
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM courses WHERE id = $id");
    header("Location: course-list.php");
    exit;
}

include 'header.php';
?>

<h2>Course List</h2>
<a href="course.php" class="add-btn">+ Add New Course</a><br><br>

<table border="1" cellpadding="10" style="width:100%; border-collapse: collapse;">
    <tr style="background:#f0f0f0;">
        <th>Image</th>
        <th>Title</th>
        <th>Category</th>
        <th>Duration</th>
        <th>Age Group</th>
        <th>Teacher</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

    <?php
    $sql = $conn->query("SELECT c.*, cat.name as category_name 
                         FROM courses c 
                         LEFT JOIN categories cat ON c.category_id = cat.id 
                         ORDER BY c.id DESC");
    while($row = $sql->fetch_assoc()):
    ?>
    <tr>
        <td><img src="uploads/<?= $row['image'] ?>" width="100"></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['category_name']) ?></td>
        <td><?= $row['duration'] ?></td>
        <td><?= $row['age_group'] ?></td>
        <td>
            <img src="uploads/<?= $row['teacher_image'] ?>" width="40">
            <?= htmlspecialchars($row['teacher_name']) ?>
        </td>
        <td>$<?= $row['price'] ?></td>
        <td>
            <a href="course.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<style>
    input, select {
        padding: 10px;
        width: 300px;
        margin-bottom: 10px;
    }
    button {
        padding: 10px 20px;
        background: green;
        color: white;
        border: none;
        cursor: pointer;
    }
    .add-btn {
        background: #3498db;
        color: white;
        padding: 8px 12px;
        text-decoration: none;
    }
</style>
