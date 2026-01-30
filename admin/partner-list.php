<?php
include 'db.php';
include 'header.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM partner WHERE id=$id");
    header("Location: partner-list.php");
    exit();
}
?>

<h2>Partner List</h2>
<a href="partner.php" class="add-btn">Add New Partner</a>
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
    $result = $conn->query("SELECT * FROM partner ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><img src="uploads/<?= htmlspecialchars($row['image']) ?>" width="100"></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['meta_title']) ?></td>
            <td>
                <a href="partner.php?edit=<?= $row['id'] ?>" class="edit-btn">Edit</a> | 
                <a href="partner-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- End of main content div if any -->
</body>
</html>
