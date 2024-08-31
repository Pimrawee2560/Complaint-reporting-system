<?php
include 'config.php'; // Connect to the database
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:../login/login_form.php');
    exit;
}


?>
<?php
include "Problem_db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
   $Problems = $_POST['Problems'];
   $Name_user = $_POST['Name_user'];
   $Problem_type = $_POST['Problem_type'];
   $Problem_details = $_POST['Problem_details'];
   $Image_file = $_POST['Image_file'];
   $Problem_location = $_POST['Problem_location'];
   $Problem_Date = $_POST['Problem_Date'];
   $formattedDate = date("Y-m-d", strtotime($Problem_Date)); // แปลงรูปแบบวันที่ใหม่

  $sql = "UPDATE `crud` SET `Problems`='$Problems',`Name_user`='$Name_user',`Problem_type`='$Problem_type',`Problem_details`='$Problem_details',`Image_file`='$Image_file ',`Problem_location`='$Problem_location',`Problem_Date`='$Problem_Date' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: Problemhome.php?msg=แก้ไขข้อมูลสำเร็จ");
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

  <title>แก้ไข</title>
  <style>
    body {
      background-color: #F77676;
    }
  </style>

</head>

<body>
<br>
<a href="Problemhome.php" class="btn"><img src="../img/left.png" alt="ไอคอน" style="width: 40px; height: 40px;"></a>

      <div class="container">
      <div class="text-center mb-4">
         <h3>แจ้งเรื่องร้องทุกข์</h3>
      </div>

    <?php
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

<div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
            <div class="form-group mb-3">
                  <label class="form-label">ชื่อผู้ร้องเรียน</label>
                  <input type="text" class="form-control" name="Name_user" value="<?php echo $row['Name_user'] ?>"required >
               </div>
               <div class="form-group mb-3">
                  <label class="form-label">ปัญหาที่พบ*</label>
                  <input type="text" class="form-control" name="Problems" value="<?php echo $row['Problems'] ?>" required >
               </div>
               <div class="form-group mb-3">
                  <label class="form-label">ประเภทปัญหา*</label>
                  <select class="form-select" name="Problem_type" value="<?php echo $row['Problem_type'] ?>" required  >
                     <option value="" disabled selected>เลือกประเภทปัญหา</option>
                     <option value="ปัญหาถนนคับแคบชำรุดเสียหาย" <?php if($row['Problem_type'] == 'option1') echo 'selected'; ?>>ปัญหาถนนคับแคบชำรุดเสียหาย</option>
                     <option value="ปัญหาทางเท้ามีจำนวนไม่เพียงพอและไม่ได้มาตรฐาน" <?php if($row['Problem_type'] == 'option2') echo 'selected'; ?>>ปัญหาทางเท้ามีจำนวนไม่เพียงพอและไม่ได้มาตรฐาน</option>
                     <option value="ปัญหาการติดตั้งไฟฟ้าสาธารณะให้แสงสว่างยังไม่ทั่วถึง" <?php if($row['Problem_type'] == 'option3') echo 'selected'; ?>>ปัญหาการติดตั้งไฟฟ้าสาธารณะให้แสงสว่างยังไม่ทั่วถึง</option>
                     <option value="ปัญหาการจราจรและอุบัติภัย" <?php if($row['Problem_type'] == 'option4') echo 'selected'; ?>>ปัญหาการจราจรและอุบัติภัย</option>
                     <option value="ปัญหาการระบายน้ำและน้ำท่วมขัง" <?php if($row['Problem_type'] == 'option5') echo 'selected'; ?>>ปัญหาการระบายน้ำและน้ำท่วมขัง</option>
                     <option value="ปัญหาความปลอดภัยในชีวิตและทรัพย์สินของประชาชน" <?php if($row['Problem_type'] == 'option6') echo 'selected'; ?>>ปัญหาความปลอดภัยในชีวิตและทรัพย์สินของประชาชน</option>
                     <option value="ปัญหาชุมชนแออัดและแหล่งเสื่อมโทรม" <?php if($row['Problem_type'] == 'option7') echo 'selected'; ?>>ปัญหาชุมชนแออัดและแหล่งเสื่อมโทรม</option>
                     <option value="ปัญหาแคลนสถานศึกษาในระดับประถมศึกษาและอนุบาล" <?php if($row['Problem_type'] == 'option8') echo 'selected'; ?>>ปัญหาแคลนสถานศึกษาในระดับประถมศึกษาและอนุบาล</option>
                     <option value="ปัญหาการให้บริการทางด้านสาธารณสุข" <?php if($row['Problem_type'] == 'option9') echo 'selected'; ?>>ปัญหาการให้บริการทางด้านสาธารณสุข</option>
                  </select>
               </div>
            </div>
            <div class="form-group mb-3">
               <label class="form-label">รายละเอียด *</label>
               <textarea class="form-control" name="Problem_details" style="height: 200px;" value="<?php echo $row['Problem_details'] ?>" required ></textarea>
            </div>
            <div class="form-group mb-3">
               <label class="form-label">วัน/เดือน/ปี ที่แจ้งเรื่องร้องทุกข์</label>
               <input type="datetime-local" class="form-control" name="Problem_Date" value="<?php echo $row['Problem_Date'] ?>" required >
            </div>
            <div class="form-group mb-3">
    <label class="form-label">ไฟล์รูปภาพ *</label>
    <input type="file" class="form-control" name="Image_file" id="imageFile" accept="image/jpeg, image/png" multiple onchange="previewImages()" value="<?php echo $row['Image_file'] ?>" required>
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
                img.style.maxWidth = '100px';
                img.style.maxHeight = '100px';
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
               <input type="hidden" class="form-control" name="Problem_location" id="problemLocation" value="<?php echo $row['Problem_location'] ?>" >
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
               <a href="Problemhome.php" class="btn btn-danger btn-outline-dark  text-white me-3">ยกเลิก</a>
               <button type="submit" class="btn btn-success btn-outline-dark text-white  " name="submit">ส่งข้อมูล</button>
            </div>
         </form>
      </div>
   </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>