<?php

@include 'config.php';

if(isset($_POST['submit'])){
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   
   // Set user_type directly to "user"
   $user_type = "user";

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   } else {
      if($pass != $cpass){
         $error[] = 'Password not matched!';
      } else {
         // Validate phone number format
         if (!preg_match('/^0\d{9}$/', $phone)) {
            $error[] = 'รูปแบบเบอร์โทรไม่ถูกต้อง!';
         } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type, username, phone, address) VALUES('$name','$email','$pass','$user_type','$username','$phone','$address')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
      }
   }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
   <style>
      * {
         font-family: 'Poppins', sans-serif;
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         outline: none;
         border: none;
         text-decoration: none;
      }

      .container {
         min-height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 20px;
         padding-bottom: 60px;
      }

      .container .content {
         text-align: center;
      }

      .container .content h3 {
         font-size: 30px;
         color: #333;
      }

      .container .content h3 span {
         background: crimson;
         color: #fff;
         border-radius: 5px;
         padding: 0 15px;
      }

      .container .content h1 {
         font-size: 50px;
         color: #fff;
      }

      .container .content h1 span {
         color: crimson;
      }

      .container .content p {
         font-size: 25px;
         margin-bottom: 20px;
      }

      .container .content .btn {
         display: inline-block;
         padding: 10px 30px;
         font-size: 20px;
         background: #333;
         color: #fff;
         margin: 0 5px;
         text-transform: capitalize;
      }

      .container .content .btn:hover {
         background: crimson;
      }

      .form-container {
         min-height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 20px;
         padding-bottom: 60px;
         background: rgba(247, 117, 117, 1);
      }

      .form-container form h1 /*หัวข้อ*/{ 
         font-size: 40px;
         text-transform: uppercase;
         margin-bottom: 25px;
         color: #fff;
      }

      .form-container form {
         padding: 20px;
         border-radius: 20px;
         box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
         border:5px solid #fff;
         background: rgba(240, 38, 61, 0.6);
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
         width: 65%;
         padding: 15px 15px;
         font-size: 17px;
         margin: 15px 0;
         background: #fff;
         border: 1px solid black;
         border-radius: 500px;
         text-align: center;
         display: inline-block;
      }

      .form-container form select option {
         background: #fff;
      }

      .form-container form .form-btn {
         background: #fff;
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
         color: #fff;
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

      /* Adjust label styles */
      .form-container form label {
         float: left;
         text-align: right;
         width: 30%;
         margin-right: 2%;
         margin-top: 5px;
         color: white;
      }
   </style>
</head>
<body>
<div class="form-container">
   <form action="" method="post">
      <h1>Register </h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required placeholder="Username" style="color: black;">

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required placeholder="กำหนดรหัสผ่าน" style="color: black;">

      <label for="cpassword">Confirm Password</label>
      <input type="password" name="cpassword" id="cpassword" required placeholder="ยืนยันรหัสผ่าน" style="color: black;">

      <label for="name">ชื่อ-นามสกุล</label>
      <input type="text" name="name" id="name" required placeholder="กรอกชื่อ-นามสกุล" style="color: black;">

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required placeholder="กรอกอีเมลล์" style="color: black;">

      <label for="phone">เบอร์โทรศัพท์</label>
      <input type="tel" name="phone" id="phone" required placeholder="xxx-xxx-xxxx" style="color: black;">

      <label for="address">ที่อยู่</label>
      <input type="text" name="address" id="address" required placeholder="กรอก บ้านเลขที่,ตรอก-ซอย,หมู่ " style="color: black;">

      <input type="submit" name="submit" value="สมัครสมาชิก" class="form-btn">
      <p>มีบัญชีอยู่แล้วใช่ใหม? <a href="login_form.php">ล็อกอินที่นี่</a></p>
   </form>
</div>

</body>
</html>
