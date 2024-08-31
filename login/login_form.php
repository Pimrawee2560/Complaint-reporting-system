<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = ($_POST['password']);
    $user_type = $_POST['user_type'];

    // Check in user_form table
    $select_user = "SELECT * FROM user_form WHERE username = '$username' AND password = '$pass'";
    $result_user = mysqli_query($conn, $select_user);

    // Check in officer_form table
    $select_officer = "SELECT * FROM officer_form WHERE username = '$username' AND password = '$pass'";
    $result_officer = mysqli_query($conn, $select_officer);

    if (mysqli_num_rows($result_user) > 0) {
        $row = mysqli_fetch_array($result_user);
        $_SESSION['user_name'] = $row['username'];
        header('location:../ระบบลงข้อมูลประชาชน/index.php');
    } elseif (mysqli_num_rows($result_officer) > 0) {
        $row = mysqli_fetch_array($result_officer);
        $_SESSION['user_name'] = $row['name'];
        header('location:../ระบบเจ้าหน้าที่/index.php');  
    } else {
        $error[] = 'Username หรือ Password ไม่ถูกต้อง!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
   <!-- Custom CSS -->
   <style>
      *
      {
         font-family: 'Poppins', sans-serif;
         margin: 0; 
         padding: 0;
         box-sizing: border-box;
         outline: none; 
         border: none;
         text-decoration: none;
      }

      body {
         background-color: rgba(247, 117, 117, 1);
      }

      .header {
         text-align: center;
         margin-top: 50px;
      }

      .header h1 {
         font-size: 40px;
         color: #fff;
         margin-bottom: 10px;
      }

      .form-container {
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         padding: 20px;
         padding-bottom: 60px;
      }

      .form-container form {
         padding: 20px;
         border-radius: 5px;
         box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
         background: white;
         text-align: center;
         width: 500px;
      }

      .form-container form h3 {
         font-size: 35px;
         text-transform: uppercase;
         margin-bottom: 25px;
         color: #333;
      }

      .form-container form input,
      .form-container form select {
         width: 100%;
         padding: 15px 15px;
         font-size: 17px;
         margin: 15px 0;
         background: #DCDCDC;
         border: 2px solid rgba(247, 117, 117, 1);
         border-radius: 500px;
         text-align: center;
         display: block;
      }

      .form-container form select option {
         background: #fff;
      }

      .form-container form .form-btn {
         background: #DCDCDC;
         color: black;
         text-transform: capitalize;
         padding: 15px 15px;
         font-size: 20px;
         cursor: pointer;
      }

      .form-container form .form-btn:hover {
         background: #CCFFCC;
         color: black;
      }

      .form-container form p {
         margin-top: 10px;
         font-size: 20px;
         color: #333;
      }

      .form-container form p a {
         color: black;
      }

      .form-container form .error-msg {
         margin: 10px 0;
         display: block;
         background: crimson;
         color: #fff;
         border-radius: 5px;
         font-size: 20px;
         padding: 10px;
      }

      .logo {
         margin-bottom: 20px;
      }
   </style>
</head>
<body>

   <div class="header">
      <h1>การแจ้งร้องทุกข์</h1>
      <img class="logo" src="../img/v612_12.png" alt="">
   </div>
   
<div class="form-container">
   <form action="" method="post">
      <h3>Login</h3>
      <?php
      if (isset($error)) {
         foreach ($error as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
         }
      }
      ?>
      <input type="text" name="username" required placeholder=" username">
      <input type="password" name="password" required placeholder=" password">
      <input type="submit" name="submit" value="เข้าสู่ระบบ" class="form-btn">
      <p><a href="register_form.php">สมัครสมาชิกใหม่</a></p>
   </form>
</div>

</body>
</html>
