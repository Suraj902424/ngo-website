<?php
include 'db.php';
include 'header.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM team WHERE id=$id");
    header("Location: team-list.php");
    exit();
}
?>

<h2>Team List</h2>
<a href="team.php" class="add-btn">Add New Team Member</a>
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
        $result = $conn->query("SELECT * FROM team ORDER BY id DESC");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><img src="uploads/<?= htmlspecialchars($row['image']) ?>" width="100"></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['meta_title']) ?></td>
            <td>
                <a href="team.php?edit=<?= $row['id'] ?>" class="edit-btn">Edit</a> | 
                <a href="team-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this team member?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- Optional: closing wrapper div -->
</body>
</html>
