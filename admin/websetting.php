<?php
include 'db.php';
include 'header.php';

// --------------------------------------
// Fetch existing settings (id = 1)
// --------------------------------------
$id = 1;
$stmt = $conn->prepare("SELECT * FROM websetting WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

// --------------------------------------
// Handle form submission
// --------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- Sanitize text inputs ---
    $about_title       = trim($_POST['about_title']);
    $about_subtitle    = trim($_POST['about_subtitle']);
    $our_mission       = trim($_POST['our_mission']);
    $our_commitment    = trim($_POST['our_commitment']);
    $about_description = trim($_POST['about_description']);
    $logo_text         = trim($_POST['logo_text']);

    $facebook  = trim($_POST['facebook_link']);
    $instagram = trim($_POST['instagram_link']);
    $twitter   = trim($_POST['twitter_link']);
    $youtube   = trim($_POST['youtube_link']);

    $email1 = trim($_POST['email1']);
    $email2 = trim($_POST['email2']);
    $phone1 = trim($_POST['phone1']);
    $phone2 = trim($_POST['phone2']);

    $address1 = trim($_POST['address1']);
    $address2 = trim($_POST['address2']);
    $url      = trim($_POST['url']);

    $meta_title       = trim($_POST['meta_title']);
    $meta_description = trim($_POST['meta_description']);
    $meta_keywords    = trim($_POST['meta_keywords']);

    // --- Handle file uploads ---
    // About Image
    $about_image = $data['about_image'];
    if (!empty($_FILES['about_image']['name'])) {
        $about_image = time() . "_" . basename($_FILES['about_image']['name']);
        move_uploaded_file($_FILES['about_image']['tmp_name'], "uploads/$about_image");
    }

    // Logo Image
    $logo_image = $data['logo_image'];
    if (!empty($_FILES['logo_image']['name'])) {
        $logo_image = time() . "_" . basename($_FILES['logo_image']['name']);
        move_uploaded_file($_FILES['logo_image']['tmp_name'], "uploads/$logo_image");
    }

    // --- Update query ---
    $sql = "
        UPDATE websetting SET 
            about_title = ?, 
            about_subtitle = ?, 
            our_mission = ?, 
            our_commitment = ?, 
            about_description = ?, 
            about_image = ?,
            logo_text = ?,
            facebook_link = ?, 
            instagram_link = ?, 
            twitter_link = ?, 
            youtube_link = ?,
            email1 = ?, 
            email2 = ?, 
            phone1 = ?, 
            phone2 = ?, 
            address1 = ?, 
            address2 = ?,
            url = ?,
            logo_image = ?, 
            meta_title = ?, 
            meta_description = ?, 
            meta_keywords = ?
        WHERE id = ?
    ";

    $stmt = $conn->prepare($sql);

    // 22 string values + 1 integer id = 23 placeholders
    $stmt->bind_param(
        "ssssssssssssssssssssssi",
        $about_title, $about_subtitle, $our_mission, $our_commitment,
        $about_description, $about_image, $logo_text,
        $facebook, $instagram, $twitter, $youtube,
        $email1, $email2, $phone1, $phone2,
        $address1, $address2,
        $url,
        $logo_image, $meta_title, $meta_description, $meta_keywords,
        $id
    );

    // --- Execute and show result ---
    if ($stmt->execute()) {
        echo "<script>
                alert('Web settings updated successfully!');
                window.location.href='websetting.php';
              </script>";
    } else {
        echo "<script>alert('Update failed: {$stmt->error}');</script>";
    }

    $stmt->close();
}
?>



<style>
body {
  font-family: 'Segoe UI', sans-serif;
  background: #f3f4f6;
  margin: 0;
  padding: 20px;
}
.container {
  max-width: 1100px;
  margin: auto;
  background: #fff;
  padding: 35px;
  border-radius: 12px;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}
h2 {
  text-align: center;
  margin-bottom: 30px;
  color: #2c3e50;
}
.row {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}
.form-group {
  flex: 1 1 48%;
  display: flex;
  flex-direction: column;
}
.form-group.full-width {
  flex: 1 1 100%;
}
.form-group label {
  font-weight: 600;
  margin-bottom: 6px;
  color: #333;
}
input[type="text"], input[type="file"], textarea {
  padding: 10px 12px;
  border: 1px solid #ccc;
  border-radius: 8px;
  background: #f9f9f9;     
  width: 100%;
}
textarea {
  min-height: 150px;
}
.preview-img {
  max-width: 100px;
  margin-top: 8px;
  border-radius: 6px;
  border: 1px solid #ddd;
}
button[type="submit"] {
  background: #2d89ef;
  color: white;
  padding: 14px;
  width: 100%;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  margin-top: 20px;
  cursor: pointer;
  transition: 0.3s ease;
}
button[type="submit"]:hover {
  background: #1b5fa0;
}
@media(max-width: 768px){
  .form-group {
    flex: 1 1 100%;
  }
}
</style>

<div class="container">
  <h2>Web Settings</h2>
 <form method="post" enctype="multipart/form-data">
  <div class="row">
    
    <div class="form-group">
      <label>About Title</label>
      <input type="text" name="about_title" value="<?= htmlspecialchars($data['about_title']) ?>">
    </div>

    <div class="form-group">
      <label>About Subtitle</label>
      <input type="text" name="about_subtitle" value="<?= htmlspecialchars($data['about_subtitle']) ?>">
    </div>

    <div class="form-group">
      <label>Our Mission</label>
      <input type="text" name="our_mission" value="<?= htmlspecialchars($data['our_mission']) ?>">
    </div>

    <div class="form-group">
      <label>Our Commitment</label>
      <input type="text" name="our_commitment" value="<?= htmlspecialchars($data['our_commitment']) ?>">
    </div>

    <div class="form-group full-width">
      <label>About Description</label>
      <textarea name="about_description" id="about_description"><?= htmlspecialchars($data['about_description']) ?></textarea>
    </div>

    <div class="form-group">
      <label>About Image</label>
      <input type="file" name="about_image">
      <?php if ($data['about_image']) echo "<img src='uploads/{$data['about_image']}' class='preview-img'>"; ?>
    </div>

    <div class="form-group">
      <label>Logo Image</label>
      <input type="file" name="logo_image">
      <?php if ($data['logo_image']) echo "<img src='uploads/{$data['logo_image']}' class='preview-img'>"; ?>
    </div>

    <div class="form-group">
      <label>Logo Text</label>
      <input type="text" name="logo_text" value="<?= htmlspecialchars($data['logo_text']) ?>">
    </div>

    <!-- Contact -->
    <div class="form-group"><label>Email 1</label><input type="text" name="email1" value="<?= htmlspecialchars($data['email1']) ?>"></div>
    <div class="form-group"><label>Email 2</label><input type="text" name="email2" value="<?= htmlspecialchars($data['email2']) ?>"></div>
    <div class="form-group"><label>Phone 1</label><input type="text" name="phone1" value="<?= htmlspecialchars($data['phone1']) ?>"></div>
    <div class="form-group"><label>Phone 2</label><input type="text" name="phone2" value="<?= htmlspecialchars($data['phone2']) ?>"></div>
    <div class="form-group"><label>Address 1</label><input type="text" name="address1" value="<?= htmlspecialchars($data['address1']) ?>"></div>
    <div class="form-group"><label>Address 2</label><input type="text" name="address2" value="<?= htmlspecialchars($data['address2']) ?>"></div>

    <!-- Social -->
    <div class="form-group"><label>Facebook</label><input type="text" name="facebook_link" value="<?= htmlspecialchars($data['facebook_link']) ?>"></div>
    <div class="form-group"><label>Instagram</label><input type="text" name="instagram_link" value="<?= htmlspecialchars($data['instagram_link']) ?>"></div>
    <div class="form-group"><label>Twitter</label><input type="text" name="twitter_link" value="<?= htmlspecialchars($data['twitter_link']) ?>"></div>
    <div class="form-group"><label>YouTube</label><input type="text" name="youtube_link" value="<?= htmlspecialchars($data['youtube_link']) ?>"></div>

    <!-- Website URL -->
    <div class="form-group full-width">
      <label>Website URL</label>
      <input type="text" name="url" value="<?= htmlspecialchars($data['url']) ?>">
    </div>

    <!-- Meta -->
    <div class="form-group full-width">
      <label>Meta Title</label>
      <input type="text" name="meta_title" value="<?= htmlspecialchars($data['meta_title']) ?>">
    </div>
    <div class="form-group full-width">
      <label>Meta Description</label>
      <textarea name="meta_description" id="meta_description"><?= htmlspecialchars($data['meta_description']) ?></textarea>
    </div>
    <div class="form-group full-width">
      <label>Meta Keywords</label>
      <textarea name="meta_keywords" id="meta_keywords"><?= htmlspecialchars($data['meta_keywords']) ?></textarea>
    </div>

  </div> <!-- /.row -->

  <button type="submit">Save Settings</button>
</form>

</div>
<script>
  CKEDITOR.replace('about_description');
  CKEDITOR.replace('meta_description');
  CKEDITOR.replace('meta_keywords');
</script>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
