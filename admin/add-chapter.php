<?php
include 'db.php';

$chapter_id = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;
$chapter_name = '';
$selected_subject = '';

// Fetch all subjects
$subjects = $conn->query("SELECT * FROM subjects ORDER BY name");

// Fetch chapter details if editing
if ($chapter_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM chapters WHERE id = ?");
    $stmt->bind_param("i", $chapter_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $chapter_name = $row['name'];
        $selected_subject = $row['subject_id'];
    }
    $stmt->close();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject_id = (int)$_POST['subject_id'];
    $name = trim($_POST['name']);
    $id = isset($_POST['chapter_id']) ? (int)$_POST['chapter_id'] : 0;

    if ($id > 0) {
        $stmt = $conn->prepare("UPDATE chapters SET name = ?, subject_id = ? WHERE id = ?");
        $stmt->bind_param("sii", $name, $subject_id, $id);
        $stmt->execute();
        $stmt->close();
    } else {
        $stmt = $conn->prepare("INSERT INTO chapters (subject_id, name) VALUES (?, ?)");
        $stmt->bind_param("is", $subject_id, $name);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: add-chapter.php");
    exit;
}

// Handle deletion
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    // Optional: Delete dependent videos
    // $conn->query("DELETE FROM course_videos WHERE chapter_id = $id");

    $stmt = $conn->prepare("DELETE FROM chapters WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: add-chapter.php");
    exit;
}

include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $chapter_id ? "Edit Chapter" : "Add Chapter" ?></title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            padding: 40px;
        }
        .container {
            max-width: 750px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.06);
        }
        h2, h3 {
            margin-bottom: 25px;
            color: #2c3e50;
        }
        label {
            font-weight: 600;
            display: block;
            margin-top: 20px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            margin-top: 25px;
            padding: 12px 20px;
            background-color: #3498db;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        table {
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #e1e1e1;
        }
        .actions a {
            text-decoration: none;
            margin-right: 10px;
            font-weight: bold;
        }
        .edit { color: #27ae60; }
        .delete { color: #c0392b; }
    </style>
</head>
<body>

<div class="container">
    <h2><?= $chapter_id ? "✏️ Edit Chapter" : "➕ Add Chapter" ?></h2>

    <form method="POST">
        <label for="subject_id">Select Subject</label>
        <select name="subject_id" id="subject_id" required>
            <option value="">-- Choose Subject --</option>
            <?php if ($subjects->num_rows > 0):
                while ($s = $subjects->fetch_assoc()):
                    $sel = $selected_subject == $s['id'] ? 'selected' : '';
                    echo "<option value='{$s['id']}' $sel>" . htmlspecialchars($s['name']) . "</option>";
                endwhile;
            endif; ?>
        </select>

        <label for="name">Chapter Name</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($chapter_name) ?>" required>

        <input type="hidden" name="chapter_id" value="<?= $chapter_id ?>">
        <button type="submit"><?= $chapter_id ? "Update" : "Add" ?> Chapter</button>
    </form>

    <h3>📘 All Chapters</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Chapter</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        $res = $conn->query("
            SELECT chapters.id, chapters.name AS chapter, subjects.name AS subject
            FROM chapters
            JOIN subjects ON chapters.subject_id = subjects.id
            ORDER BY subjects.name, chapters.name
        ");
        while ($row = $res->fetch_assoc()):
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row['subject']) ?></td>
                <td><?= htmlspecialchars($row['chapter']) ?></td>
                <td class="actions">
                    <a class="edit" href="?edit=<?= $row['id'] ?>">Edit</a>
                    <a class="delete" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this chapter?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
