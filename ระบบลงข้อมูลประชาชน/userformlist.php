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
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลส่วนตัว</title>
    <style>
        body {
            background-color: #F77676;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .form-container {
            text-align: center;
            max-width: 800px;
            width: 100%;
            border: 1px solid #ffffff;
            background-color: #ffffff;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            margin: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #F77676;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: #0366d6;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="topnav">
        <a href="index.php"><img src="../img/left.png" alt="ข้อมูลส่วนตัว" style="width: 30px; height: 30px;"></a>
    </div>
    <div class="form-container">
        <!-- ข้อความ "My Profile" -->
        <h2>รายการแบบฟอร์มการประเมิน</h2>
        <table>
            <thead>
                <tr>
                    <th>หน่วยงาน</th>
                    <th>แบบฟอร์มประเมิน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>สาธารณสุข</td>
    <td><a href="formPH.php">แบบฟอร์มประเมินความพึงพอใจงานสาธารสุข</a></td>
  </tr>
  <tr>
    <td>ไฟฟ้า</td>
    <td><a href="formelectric.php">แบบฟอร์มประเมินความพึงพอใจงานไฟฟ้า</a></td>
  </tr>
  <tr>
    <td>พัสดุ</td>
    <td><a href="formSupplies.php">แบบฟอร์มประเมินความพึงพอใจงานพัสดุ</a></td>
  </tr>
  <tr>
    <td>นิติกร</td>
    <td><a href="formLegalofficer.php">แบบฟอร์มประเมินความพึงพอใจงานนิติกร</a></td>
  </tr>
  <tr>
    <td>พัฒนาชุมชน</td>
    <td><a href="formCommunity_Dev.php">แบบฟอร์มประเมินความพึงพอใจงานพัฒนาชุมชน</a></td>
  </tr>
  <tr>
    <td>ป้องกันบรรเทาสาธารภัย</td>
    <td><a href="formPrevention.php">แบบฟอร์มประเมินความพึงพอใจงานป้องกันบรรเทาสาธารภัย</a></td>
  </tr>
  <tr>
    <td>จัดเก็บภาษี</td>
    <td><a href="formTax.php">แบบฟอร์มประเมินความพึงพอใจงานจัดเก็บภาษี</a></td>
  </tr>
  <tr>
    <td>ธุรการ</td>
    <td><a href="formAdministrative1.php">แบบฟอร์มประเมินความพึงพอใจงานธุรการ</a></td>
  </tr>
  <tr>
    <td>ควบคุมอาคาร</td>
    <td><a href="formBuild_control1.php">แบบฟอร์มประเมินความพึงพอใจงานควบคุมอาคาร</a></td>
  </tr>
  <tr>
    <td>การเงินและบัญชี</td>
    <td><a href="formFinance.php">แบบฟอร์มประเมินความพึงพอใจงานการเงินและบัญชี</a></td>
  </tr>
  <tr>
    <td>กองศึกษา ศาสนา และวัฒนธรรม</td>
    <td><a href="formEdu1.php">แบบฟอร์มประเมินความพึงพอใจกองศึกษา ศาสนา และวัฒนธรรม</a></td>
  </tr>
 
</table>
                
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</body>
</html>
