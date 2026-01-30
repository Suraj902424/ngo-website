<?php
include 'db.php';

$subject_id = isset($_GET['subject_id']) ? (int)$_GET['subject_id'] : 0;

header('Content-Type: application/json');

if ($subject_id > 0) {
    $stmt = $conn->prepare("SELECT id, name FROM chapters WHERE subject_id = ?");
    $stmt->bind_param("i", $subject_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $chapters = [];
    while ($row = $result->fetch_assoc()) {
        $chapters[] = $row;
    }

    echo json_encode($chapters);
} else {
    echo json_encode([]);
}
?>
