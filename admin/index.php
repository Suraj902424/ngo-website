<?php
session_start();
include 'db.php';

$message = "";

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $website = trim($_POST['website']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $_SESSION['admin'] = $username;
        $_SESSION['website'] = $website;
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(120deg, #4e54c8, #8f94fb);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    /* fade + slide in animation */
    @keyframes slideFade {
      0% {
        opacity: 0;
        transform: translateY(-30px) scale(0.95);
      }
      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    .login-container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
      animation: slideFade 0.8s ease-out forwards;
    }

    .login-container img.logo {
      width: 80px;
      margin-bottom: 20px;
      animation: fadeLogo 1s ease-in;
    }

    @keyframes fadeLogo {
      from { opacity: 0; transform: scale(0.5);}
      to { opacity: 1; transform: scale(1);}
    }

    .login-container h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .login-container input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      transition: 0.3s ease;
    }

    /* focus glow */
    .login-container input:focus {
      border-color: #4e54c8;
      box-shadow: 0 0 8px rgba(78,84,200,0.3);
      outline: none;
      transform: scale(1.02);
    }

    .login-container button {
      width: 100%;
      padding: 12px;
      background-color: #4e54c8;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .login-container button:hover {
      background-color: #363cc9;
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    .error {
      color: red;
      margin-bottom: 15px;
      animation: shake 0.3s;
    }

    /* error shake */
    @keyframes shake {
      0%,100%{transform:translateX(0)}
      20%,60%{transform:translateX(-5px)}
      40%,80%{transform:translateX(5px)}
    }

    .website-input {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <img src="../images/logo1.jpg" alt="Logo" class="logo">
    <h2>Admin Login</h2>

    <?php if ($message != "") echo "<p class='error'>$message</p>"; ?>

    <form method="post">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <!-- <input type="text" name="website" placeholder="Website Name" class="website-input" required /> -->
      <button type="submit" name="submit">Login</button>
    </form>
  </div>
</body>
</html>
