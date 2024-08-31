<?php
include 'config.php'; // Connect to the database
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:../login/login_form.php');
    exit;
}


include "Problem_db_conn.php";
$id = $_GET["id"];
if (!isset($_SESSION['user_name'])) {
  header('location:../login/login_form.php');
  exit;
}


if (isset($_POST["submit"])) {
   $Problems = $_POST['Problems'];
   $Name_user = $_POST['Name_user'];
   $Problem_type = $_POST['Problem_type'];
   $Problem_details = $_POST['Problem_details'];
   $Image_file = $_POST['Image_file'];
   $Problem_location = $_POST['Problem_location'];
   $Problem_Date = $_POST['Problem_Date'];
   $formattedDate = date("Y-m-d", strtotime($Problem_Date)); // แปลงรูปแบบวันที่ใหม่
   $Problem_update = $_POST['Problem_update'];
   $Responsible_position = $_POST['Responsible_position'];
   $who_Responsible = $_POST['who_Responsible'];

   $sql = "UPDATE `crud` SET `Problem_update`='$Problem_update',`Responsible_position`='$Responsible_position',`who_Responsible`='$who_Responsible' WHERE id = $id";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: Complaint.php?msg=อัพเดทข้อมูลสำเร็จ");
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
    <title>ข้อมูลที่ร้องเรียน</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <style>
        body {
            background-color: rgba(247, 117, 117, 1);
            color: #000000;
            padding-top: 50px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .text-center {
            text-align: center;
        }

        .form-container {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-cancel {
          padding: 10px 20px;
            border-radius: 5px;
            background-color: #dc3545;
            color: #fff;
            border: none;
        }

        .btn-submit {
          padding: 9px 20px;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-cancel:hover,
        .btn-submit:hover {
            opacity: 0.8;
        }
    </style>
</head>
<a href="complaint.php" class="btn"><img src="../img/left.png" alt="ไอคอน" style="width: 40px; height: 40px;"></a>
<body>

    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
            <a href="Complaint.php" class="w3-bar-item w3-button">มีคนแจ้งปัญหาร้องทุกข์</a>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container">
        <div class="content">
<?php
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
      <div class="container">
      <div class="text-center mb-4">
         <h2>เรื่องที่ร้องเรียน:<?php echo $row['Problems']; ?></h2>
      </div>

<div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <h5><strong>ชื่อผู้ร้องเรียน:</strong> <?php echo $row['Name_user'] ?></h5>
                <h5><strong>ปัญหาที่พบ:</strong> <?php echo $row['Problems'] ?></h5>
                <h5><strong>ประเภทของปัญหา:</strong> <?php echo $row['Problem_type'] ?></h5>
                    <h5><strong>รายละเอียด:</strong> <?php echo $row['Problem_details'] ?></h5>
                    <h5><strong>วัน/เดือน/ปี ที่แจ้งเรื่องร้องทุกข์:</strong> <?php echo $row['Problem_Date'] ?><h5>
                    <h5><strong>รูปภาพ:</strong> <img src="<?php echo $row['Image_file'] ?>" alt="รูปภาพ"><h5>
    


                    <h5><strong>ตำแหน่งของปัญหา:</strong></h5>
                    <div id="map" style="height: 400px; width:600px;"></div>
                    <input type="hidden" class="form-control" name="Problem_location" id="problemLocation" value="<?php echo $row['Problem_location'] ?>" ></div>
                    <script>
                    var map;
                    
                    function openMap() {
                      var problemLocation = '<?php echo $row['Problem_location']; ?>';
                      var coordinates = problemLocation.split(','); // แยกละติจูดและลองจิจูดออกมา
                      
                      var mapOptions = {
                        center: { lat: parseFloat(coordinates[0]), lng: parseFloat(coordinates[1]) }, // ใช้ละติจูดและลองจิจูดจากฐานข้อมูลเป็นตำแหน่งเริ่มต้น
                        zoom: 8 // ขนาดการซูมเริ่มต้น
                      };
                      map = new google.maps.Map(document.getElementById('map'), mapOptions);
                      var marker = new google.maps.Marker({
                        position: mapOptions.center,
                        map: map
                      });
                    }
                    openMap(); // เรียกใช้ฟังก์ชันเมื่อโหลดหน้าเว็บ
                    </script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=openMap"></script>
                    <br>
                    <div class="form-group mb-3">
                    <h5><label class="form-label"><strong>การดำเนินการ:</label></h5></strong>
                    <select class="form-select" name="Problem_update" value="<?php echo $row['Problem_update'] ?>" >
                    <option value="option1" <?php if($row['Problem_update'] == 'option1') echo 'selected'; ?>>กำลังตรวจสอบ</option>
                    <option value="option2" <?php if($row['Problem_update'] == 'option2') echo 'selected'; ?>>กำลังแจ้งเจ้าหน้าที่</option>
                    <option value="option3" <?php if($row['Problem_update'] == 'option3') echo 'selected'; ?>>กำลังดำเนินการ</option>
                    <option value="option4" <?php if($row['Problem_update'] == 'option4') echo 'selected'; ?>>เสร็จสิ้น</option> </select></div>
                    <div class="form-group mb-3">
                    <h5><label class="form-label"><strong>ผู้รับผิดชอบ:</label></h5></strong>
                    <select class="form-select" name="who_Responsible" value="<?php echo $row['who_Responsible'] ?>" >
                    <option value="ยังไม่มีผู้รับผิดชอบงานนี้" <?php if($row['who_Responsible'] == '') echo 'selected'; ?>></option>
                    <option value="นายอนุชิต แสนสุข" <?php if($row['who_Responsible'] == 'option1') echo 'selected'; ?>>นายอนุชิต แสนสุข</option>
                    <option value="นางสาววิภาวรรณ เกิดผา" <?php if($row['who_Responsible'] == 'option2') echo 'selected'; ?>>นางสาววิภาวรรณ เกิดผา</option>
                    <option value="นายอนุสรณ์ เจือมณี" <?php if($row['who_Responsible'] == 'option3') echo 'selected'; ?>>นายอนุสรณ์ เจือมณี</option>
                    <option value="นายจิรศักดิ์ อำนาจ" <?php if($row['who_Responsible'] == 'option4') echo 'selected'; ?>>นายจิรศักดิ์ อำนาจ</option>
                    <option value="นายรัฐกุล ยางสวย" <?php if($row['who_Responsible'] == 'option5') echo 'selected'; ?>>นายรัฐกุล ยางสวย</option>
                    <option value="นายพงศกร กันนิกา" <?php if($row['who_Responsible'] == 'option6') echo 'selected'; ?>>นายพงศกร กันนิกา</option>
                    <option value="นางสาวแววตา กระต่ายทอง" <?php if($row['who_Responsible'] == 'option7') echo 'selected'; ?>>นางสาวแววตา กระต่ายทอง</option>
                    <option value="นางสาวภครพร นาคคุ้ม" <?php if($row['who_Responsible'] == 'option8') echo 'selected'; ?>>นางสาวภครพร นาคคุ้ม</option>
                    <option value="นางสาวอรุณลักษณ์ ทำจันทรทา" <?php if($row['who_Responsible'] == 'option9') echo 'selected'; ?>>นางสาวอรุณลักษณ์ ทำจันทรทา</option></select></div>
                    <div class="form-group mb-3">
                    <h5><label class="form-label"><strong>ตำแหน่งผู้รับผิดชอบ:</label></h5></strong>
                    <select class="form-select" name="Responsible_position" value="<?php echo $row['Responsible_position'] ?>" >
                    <option value="ยังไม่มีผู้รับผิดชอบงานนี้" <?php if($row['Responsible_position'] == 'option0') echo 'selected'; ?>></option>
                    <option value="นักวิเคราะห์นโยบายและแผน" <?php if($row['Responsible_position'] == 'option1') echo 'selected'; ?>>นักวิเคราะห์นโยบายและแผน</option>
                    <option value="เจ้าหน้าที่ป้องกันและบรรเทาสาธารณภัย" <?php if($row['Responsible_position'] == 'option2') echo 'selected'; ?>>เจ้าหน้าที่ป้องกันและบรรเทาสาธารณภัย</option>
                    <option value="กองสาธารณสุขและสิ่งแวดล้อม" <?php if($row['Responsible_position'] == 'option3') echo 'selected'; ?>>เจ้าหน้าที่กองช่าง</option>
                    <option value="กองสาธารณสุขและสิ่งแวดล้อม" <?php if($row['Responsible_position'] == 'option4') echo 'selected'; ?>>กองสาธารณสุขและสิ่งแวดล้อม</option></select></div>
                
                 
                  <div class="d-flex justify-content-center ">
               <a href="Complaint.php" class="btn-cancel ">ยกเลิก</a>
               <button type="submit" class="btn-submit  " name="submit">ส่งข้อมูล</button>
            </div>
                </div>
            </div>
            </div>
            <div>
          
            </div>
         </form>
      </div>
   </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>