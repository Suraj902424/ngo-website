<?php
session_start();
include 'db.php';

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $id         = (int)$_POST['update_id'];
    $course_id  = (int)$_POST['course_id'];
    $subject_id = (int)$_POST['subject_id'];
    $chapter_id = (int)$_POST['chapter_id'];
    $title      = trim($conn->real_escape_string($_POST['title']));
    $video_url  = trim($conn->real_escape_string($_POST['video_url']));

    // Existing data
    $result = $conn->query("SELECT video_file, thumbnail, pdf_file FROM course_videos WHERE id = $id");
    $row = $result->fetch_assoc();
    $video_file = $row['video_file'];
    $thumbnail  = $row['thumbnail'];
    $pdf_file   = $row['pdf_file'];

    // Uploads
    if (!empty($_FILES['video_file']['name'])) {
        $video_file = time() . '_' . basename($_FILES['video_file']['name']);
        move_uploaded_file($_FILES['video_file']['tmp_name'], "uploads/videos/$video_file");
    }

    if (!empty($_FILES['thumbnail']['name'])) {
        $thumbnail = time() . '_' . basename($_FILES['thumbnail']['name']);
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], "uploads/thumbnails/$thumbnail");
    }

    if (!empty($_FILES['pdf_file']['name'])) {
        $pdf_file = time() . '_' . basename($_FILES['pdf_file']['name']);
        move_uploaded_file($_FILES['pdf_file']['tmp_name'], "uploads/pdfs/$pdf_file");
    }

    // Update query
    $stmt = $conn->prepare("UPDATE course_videos SET course_id=?, subject_id=?, chapter_id=?, title=?, video_url=?, video_file=?, thumbnail=?, pdf_file=? WHERE id=?");
    $stmt->bind_param("iiisssssi", $course_id, $subject_id, $chapter_id, $title, $video_url, $video_file, $thumbnail, $pdf_file, $id);
    $stmt->execute();

    header("Location: video-list.php?status=updated");
    exit;
}

// Handle delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = (int)$_POST['delete_id'];
    $conn->query("DELETE FROM course_videos WHERE id = $id");
    header("Location: video-list.php?status=deleted");
    exit;
}

// Dropdown data
$courses  = $conn->query("SELECT id, title FROM courses ORDER BY title");
$subjects = $conn->query("SELECT id, name FROM subjects ORDER BY name");
$chapters = $conn->query("SELECT id, name FROM chapters ORDER BY name");

// Edit data
$edit_id = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;
$edit_data = [];
if ($edit_id) {
    $res = $conn->query("SELECT * FROM course_videos WHERE id = $edit_id");
    $edit_data = $res->fetch_assoc() ?: [];
}

// Pagination setup
$limit = 10;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$total_videos_res = $conn->query("SELECT COUNT(*) AS total FROM course_videos");
$total_videos = $total_videos_res->fetch_assoc()['total'];
$total_pages = ceil($total_videos / $limit);

$videos = $conn->query("
    SELECT v.*, c.title AS course_title, s.name AS subject_name, ch.name AS chapter_name 
    FROM course_videos v
    LEFT JOIN courses c ON v.course_id = c.id
    LEFT JOIN subjects s ON v.subject_id = s.id
    LEFT JOIN chapters ch ON v.chapter_id = ch.id
    ORDER BY v.id DESC
    LIMIT $offset, $limit
");

include 'header.php';
?>

<!-- Edit Form -->
<?php if ($edit_id && $edit_data): ?>
    <div class="form-container">
        <h2>Edit Video</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="update_id" value="<?= $edit_data['id'] ?>">

            <label>Course:</label>
            <select name="course_id" required>
                <?php $courses->data_seek(0); while ($row = $courses->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>" <?= $row['id'] == $edit_data['course_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['title']) ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Subject:</label>
            <select name="subject_id" required>
                <?php $subjects->data_seek(0); while ($row = $subjects->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>" <?= $row['id'] == $edit_data['subject_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['name']) ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Chapter:</label>
            <select name="chapter_id" required>
                <?php $chapters->data_seek(0); while ($row = $chapters->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>" <?= $row['id'] == $edit_data['chapter_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['name']) ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Title:</label>
            <input type="text" name="title" value="<?= htmlspecialchars($edit_data['title']) ?>" required>

            <label>YouTube URL:</label>
            <input type="text" name="video_url" value="<?= htmlspecialchars($edit_data['video_url']) ?>">

            <label>Upload Video File:</label>
            <input type="file" name="video_file" accept="video/*">

            <?php if (!empty($edit_data['thumbnail'])): ?>
                <p>Current Thumbnail:<br><img src="uploads/thumbnails/<?= $edit_data['thumbnail'] ?>" style="max-width:150px;"></p>
            <?php endif; ?>
            <label>Change Thumbnail:</label>
            <input type="file" name="thumbnail" accept="image/*">

            <label>PDF File:</label>
            <input type="file" name="pdf_file" accept="application/pdf">
            <?php if (!empty($edit_data['pdf_file'])): ?>
                <p>Current PDF: <a href="uploads/pdfs/<?= $edit_data['pdf_file'] ?>" target="_blank">View</a></p>
            <?php endif; ?>

            <button type="submit">Update Video</button>
            <a href="video-list.php" class="cancel-btn">Cancel</a>
        </form>
    </div>
<?php else: ?>

<!-- Video List -->
<h2>Video List</h2>
<a href="add-video.php" class="add-btn">Add New Video</a>
<table class="styled-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Course</th>
            <th>Subject</th>
            <th>Chapter</th>
            <th>Video</th>
            <th>PDF</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($videos->num_rows > 0): $i = $offset + 1; ?>
            <?php while ($row = $videos->fetch_assoc()): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['course_title'] ?? '—') ?></td>
                    <td><?= htmlspecialchars($row['subject_name'] ?? '—') ?></td>
                    <td><?= htmlspecialchars($row['chapter_name'] ?? '—') ?></td>
                    <td>
                        <?php if ($row['video_url']): ?>
                            <a href="<?= $row['video_url'] ?>" target="_blank">YouTube</a>
                        <?php elseif ($row['video_file']): ?>
                            <a href="uploads/videos/<?= $row['video_file'] ?>" target="_blank">Play</a>
                        <?php else: ?> — <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($row['pdf_file']): ?>
                            <a href="uploads/pdfs/<?= $row['pdf_file'] ?>" target="_blank">View</a>
                        <?php else: ?> — <?php endif; ?>
                    </td>
                    <td>
                        <a href="?edit=<?= $row['id'] ?>" class="edit-btn">Edit</a>
                        <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this video?');">
                            <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="8" style="text-align:center;">No videos found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Pagination -->
<div style="margin-top:20px; text-align:center;">
    <?php for ($p = 1; $p <= $total_pages; $p++): ?>
        <a href="?page=<?= $p ?>" style="padding:6px 12px; margin:2px; border:1px solid #ccc; <?= $p == $page ? 'background:#3498db; color:#fff;' : '' ?>">
            <?= $p ?>
        </a>
    <?php endfor; ?>
</div>

<?php endif; ?>
