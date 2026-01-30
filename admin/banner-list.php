<?php
// include 'header.php';
include 'db.php';

// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM banner WHERE id=$id");
    header("Location: banner-list.php");
    exit();
}
?>
<?php include 'header.php'; ?>

<h2>Banner List</h2>
<a href="banner.php" class="add-btn">+ Add New Banner</a>
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
    $result = $conn->query("SELECT * FROM banner ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><img src="uploads/<?= $row['image'] ?>" width="100"></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['meta_title']) ?></td>
            <td>
                <a href="banner.php?edit=<?= $row['id'] ?>" class="edit-btn">Edit</a> | 
                <a href="banner-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- main-content from header.php -->
</body>
</html>
