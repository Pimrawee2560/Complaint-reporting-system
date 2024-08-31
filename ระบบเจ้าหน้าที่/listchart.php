<?php
include 'Problem_db_conn.php'; // เชื่อมต่อกับฐานข้อมูล
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:../login/login_form.php');
    exit;
}


// การดึงข้อมูลผู้ใช้
$sql = "SELECT name, email, phone, office_image FROM officer_form";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "ไม่พบผู้ใช้!";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>หน้าหลักเจ้าหน้าที่</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i><img src="img/Logo.png" alt="logo" style="width: 80px; height: 20px"></a>
  <a href="https://www.nakhonchum-kpp.go.th/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>

  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell" aria-hidden="true" id="noti_number"></i>
    <script type="text/javascript">
    function loadDoc() {
      setInterval(function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("noti_number").innerHTML = '<span class="w3-badge w3-right w3-small w3-green">' + this.responseText + '</span>';
      }
    };
    xhttp.open("GET", "notification_data.php", true);
    xhttp.send();
  },1000);
}
loadDoc();
</script>  
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="Complaint.php" class="w3-bar-item w3-button">มีคนแจ้งปัญหาร้องทุกข์</a>
    </div>
  </div>
  <a href="../login/logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    <img src="../img/v619_66.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
  </a>
 </div>
</div>



<?php

$user_name = $_SESSION['user_name'];
$sql = "SELECT name, position, phone, officer_image FROM officer_form WHERE name = '$user_name'";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    echo "Error: " . mysqli_error($conn);
}

// Fetch the row
$row = mysqli_fetch_assoc($result);
?>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="<?php echo $row['officer_image']; ?>"  class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo $row['name'] ?></p>
        <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-text-theme"></i> <?php echo $row['position'] ?></p>
        <p><i class="fa fa-phone fa-fw w3-margin-right w3-text-theme"></i> <?php echo $row['phone'] ?></p>

        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> เรื่องร้องทุกข์</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p><a href="Complaint.php">เรื่องร้องทุกข์</p></a>
            <p><a href="Problem_add-new.php">แบบฟอร์มการแจ้งร้องทุกข์</p></a>
          
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> แบบฟอร์มการทำงาน</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p><a href="listchart.php">สรุปข้อมูลการประเมินการทำงานของเจ้าหน้าที่</p></a>
            <p><a href="listform.php">แบบฟอร์มการประเมิน</p>
          </div></a>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
         </div>
          </div>
        </div>      
      </div>
      <br>
    
      
      
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
          </div>
        </div>
      </div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
      <title>Job Satisfaction Assessment Forms</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
</style>
</head>
<body>

<h2>รายการข้อมูลการประเมิน</h2>

<table>
  <tr>
    <th>หน่วยงาน</th>
    <th>ข้อมูลการประเมิน</th>

  </tr>
  <tr>
  <td>สาธารณสุข</td>
    <td><a href="formPHchart.php">ข้อมูลประเมินความพึงพอใจงานสาธารสุข</a></td>
  </tr>
  <tr>
    <td>ไฟฟ้า</td>
    <td><a href="formelectricchart.php">ข้อมูลประเมินความพึงพอใจงานไฟฟ้า</a></td>
  </tr>
  <tr>
    <td>พัสดุ</td>
    <td><a href="formSupplieschart.php">ข้อมูลประเมินความพึงพอใจงานพัสดุ</a></td>
  </tr>
  <tr>
    <td>นิติกร</td>
    <td><a href="formLegalofficerchart.php">ข้อมูลประเมินความพึงพอใจงานนิติกร</a></td>
  </tr>
  <tr>
    <td>พัฒนาชุมชน</td>
    <td><a href="formCommunity_Devchart.php">ข้อมูลประเมินความพึงพอใจงานพัฒนาชุมชน</a></td>
  </tr>
  <tr>
    <td>ป้องกันบรรเทาสาธารภัย</td>
    <td><a href="formPreventionchart.php">ข้อมูลประเมินความพึงพอใจงานป้องกันบรรเทาสาธารภัย</a></td>
  </tr>
  <tr>
    <td>จัดเก็บภาษี</td>
    <td><a href="formTaxchart.php">ข้อมูลประเมินความพึงพอใจงานจัดเก็บภาษี</a></td>
  </tr>
  <tr>
    <td>ธุรการ</td>
    <td><a href="formAdministrativechart.php">ข้อมูลประเมินความพึงพอใจงานธุรการ</a></td>
  </tr>
  <tr>
    <td>ควบคุมอาคาร</td>
    <td><a href="formBuild_controlchart.php">ข้อมูลประเมินความพึงพอใจงานควบคุมอาคาร</a></td>
  </tr>
  <tr>
    <td>การเงินและบัญชี</td>
    <td><a href="formFinancechart.php">ข้อมูลประเมินความพึงพอใจงานการเงินและบัญชี</a></td>
  </tr>
  <tr>
    <td>กองศึกษา ศาสนา และวัฒนธรรม</td>
    <td><a href="formEduchart.php">ข้อมูลประเมินความพึงพอใจกองศึกษา ศาสนา และวัฒนธรรม</a></td>
  </tr>
 
</table>
 
</table>

                  <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
            </div>
            <div class="w3-half">
          </div>
        </div>
      </div>
      
      
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Day and Time</p>
          <img src="img/Logo.png" alt="Forest" style="width:100%;">
          <p id="thaiDateTime">วันที่ 21 กุมภาพันธ์ 2565 เวลา 00.00 น.</p>
          <script>
// Function เพื่อแสดงวันและเวลาตามโซนเวลาของประเทศไทย
function showThaiDateTime() {
  // สร้าง function เพื่อเรียกใช้งานทุกๆ 1 วินาที
  setInterval(function() {
    // สร้างวัตถุ Date จากเวลาปัจจุบัน
    var now = new Date();
    // กำหนดโซนเวลาเป็นไทย (GMT+7)
    var thaiTime = new Date(now.toLocaleString('en-US', { timeZone: 'Asia/Bangkok' }));
    // แสดงผลวันที่และเวลาไทยในรูปแบบที่ถูกต้อง
    var thaiDateTimeString = thaiTime.toLocaleString('th-TH');
    // แสดงผลใน element ที่มี id="thaiDateTime"
    document.getElementById('thaiDateTime').textContent = thaiDateTimeString;
  }, 1000); // ระบุให้ function ทำงานทุกๆ 1 วินาที
}

// เรียกใช้งาน showThaiDateTime เมื่อหน้าเว็บโหลดเสร็จ
showThaiDateTime();
</script>

</p>
        </div>
      </div>
      <br>
      
    
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>
 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html> 
