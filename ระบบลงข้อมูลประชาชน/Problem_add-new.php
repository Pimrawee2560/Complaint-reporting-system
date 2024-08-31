<?php
include "Problem_db_conn.php";
      session_start(); 
      // Redirect to login if the user is not logged in
if (!isset($_SESSION['user_name'])) {
   header('location:../login/login_form.php');
   exit;
}
$user_name = $_SESSION['user_name'];
$sql = "SELECT name,id, email, phone, user_image FROM user_form WHERE username = '$user_name'";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    echo "Error: " . mysqli_error($conn);
}

// Fetch the row
$row = mysqli_fetch_assoc($result);
      if (isset($_POST["submit"])) {
         $Problems = $_POST['Problems'];
         $Name_user = $_POST['Name_user'];
         $id_user = $_POST['id_user'];
         $Problem_type = $_POST['Problem_type'];
         $Problem_details = $_POST['Problem_details'];
         $Image_file = $_POST['Image_file'];
         $Problem_Date = $_POST['Problem_Date'];
         $formattedDate = date("Y-m-d", strtotime($Problem_Date)); // แปลงรูปแบบวันที่ใหม่
         
         // เติมค่า "กำลังตรวจสอบ" ในฟิลด์ Problem_update
         $Problem_update = "กำลังตรวจสอบ"; 
         $sToken = "0Q9qM1LR77jXCB7uzVqydDdbna0rRTmArBQinOj6cAO";
         $sMessage = "รายละเอียดปัญหา\n";
         $sMessage .= "Problems: " . $Problems . "\n";
         $sMessage .= "Problem Type: " . $Problem_type . "\n";
         $sMessage .= "Problem Details: " . $Problem_details . "\n";
         $sMessage .= "Problem Date: " . $Problem_Date . "\n";

         $chOne = curl_init(); 
         curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
         curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
         curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
         curl_setopt( $chOne, CURLOPT_POST, 1); 
         curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
         $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
         curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
         curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
         $result = curl_exec( $chOne ); 

         if ($result) {
               $_SESSION['success'] = "ส่งข้อมูลแจ้งเตือน Line Notify เรียบร้อยแล้ว!";
               header("location: index.php");
         } else {
               $SESSION['error'] = "ส่งข้อมูลแจ้งเตือนผิดพลาด!";
               header("location: index.php");
         }
         $sql = "INSERT INTO `crud`(`id`, `Problems`,`Name_user`,`id_user`, `Problem_type`, `Problem_details`, `Image_file`, `Problem_location`, `Problem_Date`, `Problem_update`) VALUES (NULL,'$Problems','$Name_user','$id_user','$Problem_type','$Problem_details','$Image_file','$Problem_location','$Problem_Date','$Problem_update')";

         $result = mysqli_query($conn, $sql);

         if ($result) {
            header("Location: Problemhome.php?msg=เพิ่มข้อมูลสำเร็จ");
         } else {
            echo "Failed: " . mysqli_error($conn);
         }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>แจ้งร้องทุกข์</title>
   <style>
 
  </style>

</head>

<body>
<br>
<a href="Problemhome.php" class="btn"><img src="../img/left.png" alt="ไอคอน" style="width: 40px; height: 40px;"></a>

   <div class="container">
      <div class="text-center mb-4">
         <h3>แจ้งเรื่องร้องทุกข์</h3>
      </div>
      <style>
    body {
      background-color: #F77676;
    }
  </style>


      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
            <div class="form-group mb-3">
                  <label class="form-label"></label>
                  <input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id'] ?>"required >
               </div>
            <div class="form-group mb-3">
                  <label class="form-label">ชื่อผู้ร้องเรียน</label>
                  <input type="text" class="form-control" name="Name_user" value="<?php echo $row['name'] ?>"required >
               </div>
               <div class="form-group mb-3">
                  <label class="form-label">ปัญหาที่พบ*</label>
                  <input type="text" class="form-control" name="Problems" required >
               </div>
               <div class="form-group mb-3">
                  <label class="form-label">ประเภทปัญหา*</label>
                  <select class="form-select" name="Problem_type" required  >
                     <option value="" disabled selected>เลือกประเภทปัญหา</option>
                     <option value="ปัญหาถนนคับแคบชำรุดเสียหาย">ปัญหาถนนคับแคบชำรุดเสียหาย</option>
                     <option value="ปัญหาทางเท้ามีจำนวนไม่เพียงพอและไม่ได้มาตรฐาน">ปัญหาทางเท้ามีจำนวนไม่เพียงพอและไม่ได้มาตรฐาน</option>
                     <option value="ปัญหาการติดตั้งไฟฟ้าสาธารณะให้แสงสว่างยังไม่ทั่วถึง">ปัญหาการติดตั้งไฟฟ้าสาธารณะให้แสงสว่างยังไม่ทั่วถึง</option>
                     <option value="ปัญหาการจราจรและอุบัติภัย">ปัญหาการจราจรและอุบัติภัย</option>
                     <option value="ปัญหาการระบายน้ำและน้ำท่วมขัง">ปัญหาการระบายน้ำและน้ำท่วมขัง</option>
                     <option value="ปัญหาความปลอดภัยในชีวิตและทรัพย์สินของประชาชน">ปัญหาความปลอดภัยในชีวิตและทรัพย์สินของประชาชน</option>
                     <option value="ปัญหาชุมชนแออัดและแหล่งเสื่อมโทรม">ปัญหาชุมชนแออัดและแหล่งเสื่อมโทรม</option>
                     <option value="ปัญหาแคลนสถานศึกษาในระดับประถมศึกษาและอนุบาล">ปัญหาแคลนสถานศึกษาในระดับประถมศึกษาและอนุบาล</option>
                     <option value="ปัญหาการให้บริการทางด้านสาธารณสุข">ปัญหาการให้บริการทางด้านสาธารณสุข</option>
                  </select>
               </div>
            </div>
            <div class="form-group mb-3">
               <label class="form-label">รายละเอียด *</label>
               <textarea class="form-control" name="Problem_details" style="height: 200px;" required ></textarea>
            </div>
            <div class="form-group mb-3">
               <label class="form-label">วัน/เดือน/ปี ที่แจ้งเรื่องร้องทุกข์</label>
               <input type="datetime-local" class="form-control" name="Problem_Date" required >
            </div>
            <div class="form-group mb-3">
    <label class="form-label">ไฟล์รูปภาพ *</label>
    <input type="file" class="form-control" name="Image_file" id="imageFile" accept="image/jpeg, image/png" multiple onchange="previewImages()" required>
    <small id="fileTypeWarning" class="form-text text-muted">*ใส่ได้เฉพาะไฟล์รูปภาพประเภท .jpeg,.png เท่านั้น</small>
</div>
<div id="imagePreview"></div>

<script>
    function previewImages() {
        var preview = document.getElementById('imagePreview');
        preview.innerHTML = '';
        var files = document.getElementById('imageFile').files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '300px';
                img.style.maxHeight = '300px';
                img.style.marginRight = '10px';
                preview.appendChild(img);
            }

            reader.readAsDataURL(file);
        }
    }
</script>

            <div class="form-group mb-3">
            <div id="map" style="height: 400px;"></div>
               <label class="form-label">แชร์ตำแหน่งของปัญหา*</label>
               <input type="hidden" class="form-control" name="Problem_location" id="problemLocation">
               <button type="button" class="btn btn-primary mt-2" onclick="openMap()">เลือกตำแหน่งที่ตั้ง</button>
               <script>
    var map;

    function openMap() {
        var mapOptions = {
            center: new google.maps.LatLng(13.7563, 100.5018), // ตำแหน่งที่เริ่มต้น (Bangkok, Thailand)
            zoom: 8 // ขนาดการซูมเริ่มต้น
        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var marker = new google.maps.Marker({
            position: mapOptions.center,
            map: map,
            draggable: true // อนุญาตให้ลากตำแหน่งได้
        });

        // เมื่อตำแหน่งที่ตั้งถูกเลือก
        google.maps.event.addListener(marker, 'dragend', function() {
            var latitude = marker.getPosition().lat();
            var longitude = marker.getPosition().lng();
            document.getElementById('problemLocation').value = 'ละติจูด: ' + latitude + ', ลองจิจูด: ' + longitude;
        });

        // เมื่อคลิกที่แผนที่
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });
    }

    function placeMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true // อนุญาตให้ลากตำแหน่งได้
        });

        // เมื่อตำแหน่งที่ตั้งถูกเลือก
        google.maps.event.addListener(marker, 'dragend', function() {
            var latitude = marker.getPosition().lat();
            var longitude = marker.getPosition().lng();
            document.getElementById('problemLocation').value = 'ละติจูด: ' + latitude + ', ลองจิจูด: ' + longitude;
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=openMap"></script>


            </div>
            </div>
               
            <div>
            <div class="d-flex justify-content-center">
               <a href="Problemhome.php" class="btn btn-danger btn-outline-dark text-white me-3" >ยกเลิก</a>
               <button type="submit" class="btn btn-success btn-outline-dark text-white " name="submit">ส่งข้อมูล</button>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>