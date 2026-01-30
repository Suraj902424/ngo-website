<?php
// Is file me koi bhi PHP logic (session_start, header redirects) na likhein.
// Yeh file sirf HTML aur CSS ke liye hai.
// Session check (jaise user login hai ya nahi) is file ko include karne se PEHLE karna chahiye.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: #2c3e50;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }

        .sidebar h2 {
            color: #fff;
            text-align: center;
            padding: 20px;
            background: #1a252f;
            margin: 0;
        }

        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 12px 20px;
            text-decoration: none;
            border-bottom: 1px solid #34495e;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .sidebar a.logout {
            background: #c0392b;
            color: white;
            font-weight: bold;
        }

        .main-content {
            margin-left: 220px;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
        }

        .dropdown a {
            cursor: pointer;
        }
        
        .dropdown .submenu {
            display: none;
            background-color: #34495e;
        }

        .dropdown .submenu a {
            padding-left: 40px;
            font-size: 14px;
        }

        .dropdown .submenu a:hover {
            background-color: #3d5a73;
        }

        /* Common UI Styles */
        .add-btn {
            display: inline-block;
            background: #27ae60;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .styled-table th, .styled-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        
        .styled-table td:last-child {
             text-align: center;
        }

        .styled-table th {
            background-color: #2c3e50;
            color: white;
        }

        .edit-btn { color: #2980b9; text-decoration: none; margin-right: 10px; }
        .delete-btn { color: #c0392b; text-decoration: none; }

        .edit-btn:hover,
        .delete-btn:hover,
        .add-btn:hover {
            opacity: 0.8;
            text-decoration: none;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container select,
        .form-container textarea,
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #1f6391;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="dashboard.php">Dashboard</a>

    <div class="dropdown">
        <a onclick="toggleDropdown('contentSubmenu')">Content ▼</a>
        <div class="submenu" id="contentSubmenu">
            <a href="banner-list.php">Banner</a>
            <a href="blog-list.php">Blog</a>
            
            <a href="faq-list.php">FAQ</a>
            <a href="team-list.php">Team</a>
            <a href="partner-list.php">Partner</a>
            <a href="event-list.php">Event</a>
            <a href="testimonial-list.php">Testimonial</a>
        </div>
    </div>

    <!-- <div class="dropdown">
        <a onclick="toggleDropdown('courseSubmenu')">Course Services ▼</a>
        <div class="submenu" id="courseSubmenu">
            <a href="video-list.php">Add Videos</a>
            <a href="course-list.php">Course List</a>
            <a href="add-chapter.php">Add Chapter</a>
            <a href="add-subject.php">Subject</a>
            <a href="category-list.php">Course Category Add</a>
        </div>
    </div> -->

    <a href="enquiry-list.php">Enquiry</a>
    <a href="donate-list.php">Donate list</a>
     <!-- <a href="user-list.php">User List</a> -->
     <!-- <a href="payment-list.php">Payment-List</a> -->
    <a href="gallery-list.php">Gallery</a>
    <a href="websetting.php">Web Settings</a>
    <a href="logout.php" class="logout">Logout</a>
</div>

<div class="main-content">
<!-- Main content starts in other files after this div -->

<script>
    function toggleDropdown(id) {
        const menu = document.getElementById(id);
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    }
</script>