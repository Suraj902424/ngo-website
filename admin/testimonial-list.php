<?php
include 'db.php';
include 'header.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM testimonials WHERE id=$id");
    header("Location: testimonial-list.php");
    exit();
}
?>

<h2>Testimonial List</h2>
<a href="testimonial.php" class="add-btn">+ Add New Testimonial</a>
<br><br>

<table class="styled-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM testimonials ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><img src="uploads/<?= $row['image'] ?>" width="100"></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['city']) ?></td>
            <td>
                <a href="testimonial.php?edit=<?= $row['id'] ?>" class="edit-btn">Edit</a> | 
                <a href="testimonial-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- main-content from header.php -->
</body>
</html>
