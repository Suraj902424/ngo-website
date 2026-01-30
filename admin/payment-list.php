<?php
include 'db.php';

// ⚠️ Delete record BEFORE output
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $conn->query("DELETE FROM course_payments WHERE id = $id");
    header("Location: payment-list.php");
    exit();
}

include 'header.php';

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$searchSql = '';
if ($search != '') {
    $safeSearch = $conn->real_escape_string($search);
    $searchSql = " AND (
        u.name LIKE '%$safeSearch%' OR 
        u.mobile LIKE '%$safeSearch%' OR 
        c.title LIKE '%$safeSearch%'
    )";
}
?>

<h2>Enquiry List</h2>
<form method="get" style="margin-bottom: 15px;">
    <input type="text" name="search" placeholder="Search by name, mobile, course" value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
</form>

<table class="styled-table">
    <thead>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Mobile</th>
            <th>Course Title</th>
            <th>Payment Status</th>
            <th>Payment Date</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // Get total records for pagination
    $countSql = "SELECT COUNT(*) as total FROM course_payments cp 
                 LEFT JOIN users u ON cp.user_id = u.id 
                 LEFT JOIN courses c ON cp.course_id = c.id 
                 WHERE 1=1 $searchSql";
    $totalResult = $conn->query($countSql)->fetch_assoc();
    $totalRecords = $totalResult['total'];
    $totalPages = ceil($totalRecords / $limit);

    // Get paginated data
    $sql = "SELECT cp.*, u.name AS user_name, u.mobile, c.title AS course_title
            FROM course_payments cp
            LEFT JOIN users u ON cp.user_id = u.id
            LEFT JOIN courses c ON cp.course_id = c.id
            WHERE 1=1 $searchSql
            ORDER BY cp.id DESC
            LIMIT $start, $limit";
    $result = $conn->query($sql);
    $serial = $start + 1;

    if ($result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?= $serial++ ?></td>
            <td><?= htmlspecialchars($row['user_name']) ?></td>
            <td><?= htmlspecialchars($row['mobile']) ?></td>
            <td><?= htmlspecialchars($row['course_title']) ?></td>
            <td><?= htmlspecialchars($row['payment_status']) ?></td>
            <td><?= date('d M Y, h:i A', strtotime($row['payment_date'])) ?></td>
            <td><?= date('d M Y, h:i A', strtotime($row['created_at'])) ?></td>
            <td>
                <a href="payment-list.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Delete this enquiry?')">Delete</a>
            </td>
        </tr>
    <?php endwhile;
    else: ?>
        <tr><td colspan="8">No records found.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

<!-- Pagination Links -->
<div style="margin-top: 20px;">
    <?php if ($totalPages > 1): ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>" style="margin: 0 5px; <?= $i == $page ? 'font-weight: bold;' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    <?php endif; ?>
</div>

</div> <!-- close main-content -->
</body>
</html>
