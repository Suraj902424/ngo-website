<?php
include 'db.php';

// Delete record
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete']; // Typecast to prevent injection
    $conn->query("DELETE FROM blog WHERE id = $id");
    header("Location: blog-list.php");
    exit();
}
?>
<?php include 'header.php';
?>

<h2>Blog List</h2>
<a href="blog.php" class="add-btn">+ Add New Blog</a>
<br><br>

<table class="styled-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Name</th>
            <th>Meta Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM blog ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><img src="uploads/<?= $row['image'] ?>" width="100"></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['meta_title']) ?></td>
            <td>
                <a href="blog.php?edit=<?= $row['id'] ?>" class="edit-btn">Edit</a> | 
                <a href="blog-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- main-content from header.php -->
</body>
</html>
