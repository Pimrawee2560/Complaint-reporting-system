<?php
include 'config.php'; // Connect to the database
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:../login/login_form.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>องค์การบริหารส่วนตำบลนครชุม</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Style the top navigation bar */
    .topnav {
      overflow: hidden;
      background-color: #F77676;
    }
    .topnav a {
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    .topnav a img {
      width: 30px;
      height: 30px;
    }
    .topnav a:nth-child(1) {
      float: left;
    }
    .topnav a:nth-child(2) {
      float: right;
    }
    /* Change color on hover */
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }
    /* Style the content */
    .content {
      background-image: url('../img/1329167.png');
      background-size: cover;
      background-position: center;
      padding: 50px;
      text-align: center;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: flex-start; /* ปรับให้เนื้อหาชิดด้านบน */
    }
    .content h2 {
  color: #fff; /* เปลี่ยนสีข้อความเป็นสีเขียวอ่อน (LightGreen) */
  text-shadow: 2px 2px 4px #F77676, 4px 4px 6px #F77676; /* เพิ่มเลเยอร์สีเขียวอ่อนที่โปร่งแสงหลายชั้น */
}
.content p {
  color: #fff; /* เปลี่ยนสีข้อความเป็นสีเขียวอ่อน (LightGreen) */
  text-shadow: 2px 2px 4px #F77676, 4px 4px 6px #F77676; /* เพิ่มเลเยอร์สีเขียวอ่อนที่โปร่งแสงหลายชั้น */
}


    .content button {
      margin-top: 10px; /* เพิ่มช่องว่างด้านบนของปุ่ม */
    }
    /* Style the frame */
    
    /* Style the footer */
    .footer {
      background-color: #333; 
      padding: 7px;
      display: flex;
      justify-content: center; 
    }
    .footer img {
      width: 27px;
      height: 27px;
      margin-right: 20px;
    }
  </style>
</head>
<body>
  <div class="topnav">
    <a href="personalinformation.php"><img src="../img/v612_22.png" alt="ข้อมูลส่วนตัว"></a>
    <a href="../login/logout.php"><img src="../img/v619_66.png" alt="ข้อมูลส่วนตัว"></a>
  </div>
  <div class="content">
    <div class="frame">
      <h2>องค์การบริหารส่วนตำบลนครชุม</h2>
      <p>สามารถแจ้งร้องทุกข์ได้ที่นีี่</p>
      
    </div>
    <div>
    <a href="Problemhome.php"><button type="button" class="btn btn-outline-light">แจ้งร้องทุกข์</button></a>
    <a href="userformlist.php"><button type="button" class="btn btn-outline-light">ประเมิน</button></a>
  </div>
  </div>
  <div class="footer">
    <img src="../img/telwhite.png" alt="ข้อมูลส่วนตัว">
    <img src="../img/facebookwhite.png" alt="ข้อมูลส่วนตัว">
    <img src="../img/webwhite.png" alt="ข้อมูลส่วนตัว">
    <img src="../img/gpswhite.png" alt="ข้อมูลส่วนตัว">
  </div>
</body>
</html>
