<?php
include 'db.php';
include 'header.php';

$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$course = null;

if ($course_id > 0) {
    $res = $conn->query("SELECT title FROM courses WHERE id = $course_id");
    $course = $res->fetch_assoc();
}

$courses = $conn->query("SELECT id, title FROM courses ORDER BY title ASC");
$subjects = $conn->query("SELECT id, name FROM subjects ORDER BY name ASC");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id   = (int)$_POST['course_id'];
    $title       = $conn->real_escape_string($_POST['title']);
    $subject_id  = (int)$_POST['subject'];
    $chapter_id  = (int)$_POST['chapter'];
    $video_url   = $conn->real_escape_string($_POST['video_url']);

    $video_file  = '';
    $thumbnail   = '';
    $pdf_file    = '';

    if (!empty($_FILES['video_file']['name'])) {
        $videoDir = "uploads/videos/";
        if (!is_dir($videoDir)) mkdir($videoDir, 0777, true);
        $video_file = time() . '_' . basename($_FILES['video_file']['name']);
        move_uploaded_file($_FILES['video_file']['tmp_name'], $videoDir . $video_file);
    }

    if (!empty($_FILES['thumbnail']['name'])) {
        $thumbDir = "uploads/thumbnails/";
        if (!is_dir($thumbDir)) mkdir($thumbDir, 0777, true);
        $thumbnail = time() . '_' . basename($_FILES['thumbnail']['name']);
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbDir . $thumbnail);
    }

    if (!empty($_FILES['pdf_file']['name'])) {
        $pdfDir = "uploads/pdfs/";
        if (!is_dir($pdfDir)) mkdir($pdfDir, 0777, true);
        $pdf_file = time() . '_' . basename($_FILES['pdf_file']['name']);
        move_uploaded_file($_FILES['pdf_file']['tmp_name'], $pdfDir . $pdf_file);
    }

    $stmt = $conn->prepare("INSERT INTO course_videos 
        (course_id, title, subject_id, chapter_id, video_url, video_file, thumbnail, pdf_file) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisssss", $course_id, $title, $subject_id, $chapter_id, $video_url, $video_file, $thumbnail, $pdf_file);
    $stmt->execute();
    $stmt->close();

    echo 'success';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Course Video</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
            padding: 30px;
        }
        .form-box {
            background: #fff;
            padding: 30px;
            max-width: 700px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        h2 { color: #2c3e50; margin-bottom: 20px; }
        label {
            font-weight: 600;
            margin-top: 15px;
            display: block;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            margin-top: 25px;
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover { background: #2980b9; }
        #progressContainer {
            margin-top: 15px;
            display: none;
        }
        #progressBar {
            width: 100%;
            height: 20px;
            background: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
        }
        #progressFill {
            height: 100%;
            width: 0%;
            background: #3498db;
            text-align: center;
            color: white;
            line-height: 20px;
            font-size: 12px;
        }
        #timeLeft {
            margin-top: 5px;
            font-size: 13px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Add Video <?= $course ? "to <em>{$course['title']}</em>" : '' ?></h2>

    <form id="uploadForm" enctype="multipart/form-data">
        <label>Select Course</label>
        <select name="course_id" required>
            <option value="">-- Select Course --</option>
            <?php while ($c = $courses->fetch_assoc()): ?>
                <option value="<?= $c['id'] ?>" <?= ($c['id'] == $course_id ? 'selected' : '') ?>>
                    <?= htmlspecialchars($c['title']) ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Video Title</label>
        <input type="text" name="title" required>

        <label>Select Subject</label>
        <select name="subject" id="subject" required>
            <option value="">-- Select Subject --</option>
            <?php while ($s = $subjects->fetch_assoc()): ?>
                <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['name']) ?></option>
            <?php endwhile; ?>
        </select>

        <label>Select Chapter</label>
        <select name="chapter" id="chapter" required>
            <option value="">-- Select Chapter --</option>
        </select>

        <label>YouTube Video URL (Optional)</label>
        <input type="text" name="video_url" placeholder="https://youtube.com/...">

        <label>Or Upload Local Video</label>
        <input type="file" name="video_file" accept="video/*">

        <label>Upload Thumbnail</label>
        <input type="file" name="thumbnail" accept="image/*">

        <label>Upload PDF (Optional)</label>
        <input type="file" name="pdf_file" accept="application/pdf">

        <button type="submit">Add Video</button>

        <div id="progressContainer">
            <div id="progressBar"><div id="progressFill">0%</div></div>
            <div id="timeLeft">Estimating time...</div>
        </div>
    </form>
</div>

<script>
document.getElementById('subject').addEventListener('change', function () {
    const subjectId = this.value;
    const chapterDropdown = document.getElementById('chapter');
    chapterDropdown.innerHTML = '<option value="">Loading...</option>';

    fetch('get-chapters.php?subject_id=' + subjectId)
        .then(response => response.json())
        .then(data => {
            chapterDropdown.innerHTML = '<option value="">-- Select Chapter --</option>';
            data.forEach(ch => {
                const opt = document.createElement('option');
                opt.value = ch.id;
                opt.textContent = ch.name;
                chapterDropdown.appendChild(opt);
            });
        })
        .catch(() => {
            chapterDropdown.innerHTML = '<option value="">Error loading chapters</option>';
        });
});

document.getElementById('uploadForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const form = this;
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();

    const progressContainer = document.getElementById('progressContainer');
    const progressFill = document.getElementById('progressFill');
    const timeLeft = document.getElementById('timeLeft');
    let startTime;

    xhr.open('POST', '', true);

    xhr.upload.onloadstart = function () {
        startTime = new Date().getTime();
        progressContainer.style.display = 'block';
        progressFill.style.width = '0%';
        progressFill.textContent = '0%';
        timeLeft.textContent = 'Estimating time...';
    };

    xhr.upload.onprogress = function (e) {
        if (e.lengthComputable) {
            const percent = Math.round((e.loaded / e.total) * 100);
            progressFill.style.width = percent + '%';
            progressFill.textContent = percent + '%';

            const elapsedTime = (new Date().getTime() - startTime) / 1000;
            const speed = e.loaded / elapsedTime;
            const remaining = e.total - e.loaded;
            const seconds = remaining / speed;
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);

            timeLeft.textContent = `Estimated time left: ${mins}m ${secs}s`;
        }
    };

    xhr.onload = function () {
        if (xhr.status === 200 && xhr.responseText.trim() === 'success') {
            progressFill.textContent = 'Uploaded!';
            setTimeout(() => { window.location.reload(); }, 1000);
        } else {
            alert('Upload Success.');
        }
    };

    xhr.send(formData);
});
</script>
</body>
</html>
