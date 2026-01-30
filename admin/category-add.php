<?php
include 'db.php';

$id = 0;
$name = "";

// ✅ Edit mode - Fetch existing category name
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    
    $stmt = $conn->prepare("SELECT name FROM categories WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $name = $row['name'];
    } else {
        echo "<p style='color:red;'>Invalid category ID.</p>";
        $id = 0;
    }
    $stmt->close();
}

// ✅ Handle form submission
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);

    if ($id > 0) {
        $stmt = $conn->prepare("UPDATE categories SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $name, $id);
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        $stmt->execute();
    }

    header("Location: category-list.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<!-- Custom Styling -->
<style>
    .form-container {
        max-width: 500px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    .form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #444;
    }

    .form-container input[type="text"] {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        margin-bottom: 20px;
        transition: border-color 0.3s;
    }

    .form-container input[type="text"]:focus {
        border-color: #007bff;
        outline: none;
    }

    .form-container .submit-btn {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .form-container .submit-btn:hover {
        background-color: #0056b3;
    }
</style>

<!-- Form -->
<div class="form-container">
    <h2><?= $id ? 'Edit' : 'Add' ?> Category</h2>
    <form method="post" action="">
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>

        <input type="submit" name="submit" value="<?= $id ? 'Update' : 'Add' ?>" class="submit-btn">
    </form>
</div>

</div> <!-- main-content from header.php -->
</body>
</html>
