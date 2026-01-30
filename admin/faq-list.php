<?php
include 'db.php';
include 'header.php';

// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM faq WHERE id=$id");
    header("Location: faq-list.php");
    exit();
}
?>

<h2>FAQ List</h2>
<a href="faq.php" class="add-btn">Add New FAQ</a>
<br><br>

<table class="styled-table">
    <thead>
        <tr>
            <th>Question</th>
            <th>Meta Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM faq ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['meta_title']) ?></td>
            <td>
                <a href="faq.php?edit=<?= $row['id'] ?>" class="edit-btn">Edit</a> | 
                <a href="faq-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- close main-content -->
</body>
</html>
