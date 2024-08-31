

<?php
include "Problem_db_conn.php";
session_start(); 
// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_name'])) {
  header('location:../login/login_form.php');
  exit;
}
$user_name = $_SESSION['user_name'];
$user_id_query = "SELECT id FROM user_form WHERE username = '$user_name'";
$user_id_result = mysqli_query($conn, $user_id_query);

if (!$user_id_result) {
    die("Query failed: " . mysqli_error($conn));
}

// Extract the user's id
$user_row = mysqli_fetch_assoc($user_id_result);
$user_id = $user_row['id'];

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
  <div class="container">
    <form method="post" action="Problem_add-new.php" enctype="multipart/form-data">
        <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                  <?php 
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
                  ?>
                </div>
        <?php }?>

        <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-success" role="alert">
                  <?php 
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                  ?>
                </div>
        <?php }?>
  <style>
    
  body {
            background-color: #F77676;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40vh;
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
<br>
<a href="index.php" class="btn"><img src="../img/left.png" alt="ไอคอน" style="width: 40px; height: 40px;"></a>
<div class="container">
    <div class="header">
  <h5>ประวัติการร้องเรียน</h5>
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
          <th scope="col">ตรวจสอบการดำเนินการ</th>
          <th scope="col">เจ้าหน้าที่ที่รับผิดชอบ</th>
          <th scope="col">ตำแหน่งที่รับผิดชอบ</th>
          <th scope="col">วันที่</th>
          <th scope="col">แก้ไข</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `crud`WHERE id_user = '$user_id' ";
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
                    <td><?php echo empty($row["who_Responsible"]) ? 'ยังไม่มีผู้รับผิดชอบงานนี้' : $row["who_Responsible"]; ?></td>
<td><?php echo empty($row["Responsible_position"]) ? 'ยังไม่มีผู้รับผิดชอบงานนี้' : $row["Responsible_position"]; ?></td>
            <td><?php echo $row["Problem_Date"] ?></td>
            <td>
              <a href="Problem_edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="Problem_delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

    <!-- Move the "Add New" button here -->
    <div class="d-flex justify-content-center">
    <a href="Problem_add-new.php" class="btn btn-warning btn-outline-dark mb-3">แจ้งเรื่องร้องทุกข์</a>

  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
