<?php
include 'db.php';


// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM enquiry WHERE id=$id");
    header("Location: enquiry-list.php");
    exit();
}
?>
<?php include 'header.php'; ?>

<h2>Enquiry List</h2>
<br>

<table class="styled-table">
    <thead>
        <tr>
            <th>Number</th> <!-- ID की जगह Serial Number -->
           
            <th>Name</th>
            <th>Email</th>
            
            <th>subject</th>
            <th>Message</th>
            <!-- <th>Service</th> -->
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM enquiry ORDER BY id DESC");
    $serial = 1;
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?= $serial++ ?></td> <!-- Serial Number -->
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['phone'])) ?></td>
            <td><?= htmlspecialchars($row['subject']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <a href="enquiry-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Delete this enquiry?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- close main-content from header.php -->
</body>
</html>
