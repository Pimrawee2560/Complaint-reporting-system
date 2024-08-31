<?php
include 'config.php'; // Connect to the database
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:../login/login_form.php');
    exit;
}


include "Problem_db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
     body {
      background-color: #F77676; /* Set background color */
    }
    table {
      background-color: #fff; /* สีขาว */
    }
    .header {
      text-align: left; /* จัดข้อความไปทางขวา */
      margin-top: 10px; /* ระยะห่างด้านบน */
      margin-left: 10px; /* ระยะห่างด้านขวา */
    }
    
     /* เพิ่มสไตล์ CSS เพื่อกำหนดสีของข้อความตามสถานะ */
    .status-pending {
      color: red; /* สีแดง */
    }

    .status-complete {
    color: green; /* สีเขียว */
    }
  </style>


  </>

  <title>home</title>
</head>

<body>
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
<br>
<br>
<br>
<div class="container">
    <div class="header">
  <h5>เรื่องร้องเรียน</h5>
  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    

    <table class="table table-hover text-center">
      <thead class="table-secondary">
        <tr>
          <th scope="col">ที่</th>
          <th scope="col">เรื่องที่ร้องเรียน</th>
          <th scope="col">การดำเนินการ</th>
          <th scope="col">วันที่</th>
          <th scope="col">ตำแหน่งที่รับผิดชอบ</th>
          <th scope="col">แก้ไข</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $statusClass = '';
          switch ($row["Problem_update"]) {
            case "option4":
              $statusClass = 'status-complete'; // ถ้าเป็น option4 (เสร็จสิ้น) ให้ใช้คลาส status-complete (สีเขียว)
              break;
              default:
              $statusClass = 'status-pending'; // สำหรับสถานะอื่น ๆ ให้ใช้คลาส status-pending (สีแดง)
              break;
            }
            ?>

          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["Problems"] ?></td>
            <td class="<?php echo $statusClass ?>">
             <?php 
             $status = $row["Problem_update"]; // เก็บค่าสถานะในตัวแปร
             switch($status) {
              case "option1":
                echo "กำลังตรวจสอบ";
                break;
                case "option2":
                  echo "กำลังแจ้งเจ้าหน้าที่";
                  break;
                  case "option3":
                    echo "กำลังดำเนินการ";
                    break;
                    case "option4":
                      echo "เสร็จสิ้น";
                      break;
                      default:
                      echo $status; // ในกรณีที่ไม่ตรงกับ option ที่กำหนด
                      break;
                    }
                    ?>
                    </td>
            <td><?php echo $row["Problem_Date"] ?></td>
            <td><?php echo empty($row["Responsible_position"]) ? 'ยังไม่มีผู้รับผิดชอบงานนี้' : $row["Responsible_position"]; ?></td>
            <td>
              <a href="Complaint_Data.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fas fa-eye fs-5 me-2"></i></a>
              <a href="Complaint_editdata.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-2"></i></a>
              <a href="Problem_delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
