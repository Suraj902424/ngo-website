<?php
include 'db.php';
include 'header.php';

// Error reporting (optional for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Delete category
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: category-list.php");
    exit();
}
?>

<h2>Category List</h2>
<a href="category-add.php" class="add-btn">+ Add New Category</a>
<br><br>

<table class="styled-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM categories ORDER BY id DESC");
    $count = 1;
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?= $count++ ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td>
                <a href="category-add.php?edit=<?= $row['id'] ?>" class="edit-btn">Edit</a> |
                <a href="category-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- Close main-content from header.php -->
</body>
</html>
