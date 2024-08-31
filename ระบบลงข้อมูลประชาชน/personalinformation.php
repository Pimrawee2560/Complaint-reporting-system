<?php
include 'Problem_db_conn.php'; // เชื่อมต่อกับฐานข้อมูล
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:../se/login_form.php');
    exit;
}

// ตรวจสอบว่ามีการส่งฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // ตรวจสอบว่ามีการอัปโหลดไฟล์ภาพหรือไม่
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_image']['tmp_name'];
        $fileName = $_FILES['profile_image']['name'];
        $fileSize = $_FILES['profile_image']['size'];
        $fileType = $_FILES['profile_image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // ตรวจสอบนามสกุลของไฟล์ภาพ
        $allowedExtensions = ["jpg", "jpeg", "png"];
        if (in_array($fileExtension, $allowedExtensions)) {
            // ทำการอัปโหลดไฟล์ภาพไปยังโฟลเดอร์ที่กำหนด
            $uploadPath = 'img/' . basename($fileName);
            move_uploaded_file($fileTmpPath, $uploadPath);
        } else {
            echo "ไม่สามารถอัปโหลดไฟล์ภาพที่ไม่รองรับได้";
            exit;
        }
    } else {
        // ถ้าไม่มีการอัปโหลดไฟล์ใหม่ให้ใช้ข้อมูลเดิม
        $uploadPath = 'img/' . basename($_FILES['profile_image']['name']);
    }


// ต่อไปคือการใช้ $uploadPath ในการแสดงผลใน HTML

// ตรวจสอบและทำการกรองข้อมูลที่ผู้ใช้ป้อน
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

// ตรวจสอบว่ามีการอัพโหลดไฟล์ภาพหรือไม่ และทำการกำหนดค่าตามไฟล์ภาพที่อัปโหลด
$userImage = isset($uploadPath) ? $uploadPath : '';

// การอัพเดทข้อมูลผู้ใช้ในฐานข้อมูล
$update_query = "UPDATE user_form SET email='$email', phone='$phone',name='$name', user_image='$userImage' WHERE username='$username'";
$update_result = mysqli_query($conn, $update_query);

// ตรวจสอบว่าการอัปเดตข้อมูลสำเร็จหรือไม่ และดำเนินการต่อไป
// ...


    if ($update_result) {
        // หลังจากอัปเดตข้อมูลเสร็จสิ้น สามารถทำการ redirect หรือแสดงข้อความสำเร็จได้ตามต้องการ
        // ตัวอย่างเช่น:
        header('Location: personalinformation.php');
        exit;
    } else {
        echo "เกิดข้อผิดพลาดในการอัพเดตข้อมูล: " . mysqli_error($conn);
    }
}

$user_name = $_SESSION['user_name'];
$sql = "SELECT name, email, phone, user_image FROM user_form WHERE username = '$user_name'";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    echo "Error: " . mysqli_error($conn);
}

// Fetch the row
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลส่วนตัว</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #F77676;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            text-align: center;
            max-width: 800px;
            width: 100%;
            border: 1px solid #F77676;
            background-color: #F77676;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            margin: 20px;
        }

        .form-container img {
            width: 200px;
            height: 200px;
            border: 3px solid white;
            border-radius: 50%;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        .profile-heading {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
        }

        .btn {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="topnav">
        <a href="index.php"><img src="..\img\left.png" alt="ข้อมูลส่วนตัว" style="width: 30px; height: 30px;"></a>
    </div>
    <div class="form-container">
        <!-- Profile Heading -->
        <h2 class="profile-heading">My Profile</h2>

        <!-- Profile Image -->
        <img src="<?php echo $row['user_image']; ?>" alt="รูปโปรไฟล์">

        <!-- Profile Update Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?php echo $_SESSION['user_name']; ?>">
            <div class="form-group mb-3">
                <label class="form-label mt-3">อัปโหลดรูปภาพโปรไฟล์ใหม่</label>
                <input type="file" class="form-control" name="profile_image">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">เบอร์โทรศัพท์</label>
                <input type="tel" class="form-control" name="phone" value="<?php echo $row['phone'] ?>">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" name="submit">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
</body>

</html>
