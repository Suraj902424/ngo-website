<?php
include 'db.php';
include 'header.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM gallery WHERE id=$id");
    header("Location: gallery-list.php");
    exit();
}
?>

<h2>Gallery List</h2>
<a href="gallery.php" class="add-btn">Add New Image</a>
<br><br>

<table class="styled-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Meta Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM gallery ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><img src="uploads/<?= htmlspecialchars($row['image']) ?>" width="100"></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['meta_title']) ?></td>
            <td>
                <a href="gallery.php?edit=<?= $row['id'] ?>" class="edit-btn">Edit</a> | 
                <a href="gallery-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- close main-content -->
</body>
</html>
