<?php
session_start();
include 'db.php'; // database connection
include 'header.php'; // this includes sidebar + topbar layout

// Get dynamic counts
$total_users     = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$total_blog    = $conn->query("SELECT COUNT(*) AS total FROM blog")->fetch_assoc()['total'];
$total_course_payments	  = $conn->query("SELECT COUNT(*) AS total FROM course_payments")->fetch_assoc()['total'];
$total_courses   = $conn->query("SELECT COUNT(*) AS total FROM courses")->fetch_assoc()['total'];
$total_videos    = $conn->query("SELECT COUNT(*) AS total FROM course_videos")->fetch_assoc()['total'];
$total_subjects  = $conn->query("SELECT COUNT(*) AS total FROM subjects")->fetch_assoc()['total'];
$total_chapters  = $conn->query("SELECT COUNT(*) AS total FROM chapters")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .main-content {
            margin-right: 100px; /* Adjust based on sidebar width */
            padding: 30px;
        }

        .dashboard-title {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.07);
            text-align: center;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            font-size: 36px;
            color: #007bff;
            margin: 0;
        }

        .card p {
            font-size: 16px;
            font-weight: 600;
            color: #555;
            margin-top: 10px;
        }

        @media(max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="main-content">
    <div class="dashboard-title">📊 Dashboard Overview</div>
    <div class="dashboard-cards">
        <div class="card">
            <h2><?= $total_users; ?></h2>
            <p>Registered Users</p>
        </div>
        <div class="card">
            <h2><?= $total_courses; ?></h2>
            <p>Total Courses</p>
        </div>
        <div class="card">
            <h2><?= $total_videos; ?></h2>
            <p>Total Videos</p>
        </div>
        <div class="card">
            <h2><?= $total_course_payments;?></h2>
            <p>Total Course Payments</p>
        </div>
        <div class="card">
            <h2><?= $total_blog; ?></h2>
            <p>Total Blogs</p>
        </div>
        <div class="card">
            <h2><?= $total_subjects; ?></h2>
            <p>Total Subjects</p>
        </div>
        <div class="card">
            <h2><?= $total_chapters; ?></h2>
            <p>Total Chapters</p>
        </div>
    </div>
</div>

</body>
</html>
