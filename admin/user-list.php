<?php
include 'db.php';
include 'header.php';

// Delete record
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: user-list.php");
    exit();
}
?>

<h2>User List</h2>
<br>

<table class="styled-table">
    <thead>
        <tr>
            <th>Number</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Status</th>
            <th>last_login</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = $conn->query("SELECT * FROM users ORDER BY id DESC");
    $serial = 1;
    while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?= $serial++ ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['mobile']) ?></td>
            <td>
                <?php if ($row['status'] === 'online'): ?>
                    <span style="color: green; font-weight: bold;">Online</span>
                <?php else: ?>
                    <span style="color: red; font-weight: bold;">Offline</span>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($row['last_login']) ?></td>
            <td>
                <a href="user-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Delete this user?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div> <!-- close main-content from header.php -->
</body>
</html>
