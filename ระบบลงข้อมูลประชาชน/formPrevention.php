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

// กำหนดโซนเวลาเป็นเวลาไทย
date_default_timezone_set('Asia/Bangkok');

if (isset($_POST["submit"])) {
   $Date= date('Y-m-d H:i:s');
   $Disaster = $_POST['Disaster'];
   $Gender = $_POST['Gender'];
   $Age = $_POST['Age'];
   $Career = $_POST['Career'];
   $Evaluate_1 = $_POST['Evaluate_1'];
   $Evaluate_2 = $_POST['Evaluate_2'];
   $Evaluate_3 = $_POST['Evaluate_3'];
   $Evaluate_4 = $_POST['Evaluate_4'];
   $Evaluate_5 = $_POST['Evaluate_5'];
   $Suggestion = $_POST['Suggestion'];

   

   $sql = "INSERT INTO `disaster_prevention_and_relief_form`(`id`, `Date`, `Disaster`, `Gender`, `Age`, `Career`, `Evaluate_1`, `Evaluate_2`, `Evaluate_3`, `Evaluate_4`, `Evaluate_5`, `Suggestion`) VALUES (NULL,'$Date','$Disaster','$Gender','$Age','$Career','$Evaluate_1','$Evaluate_2','$Evaluate_3','$Evaluate_4','$Evaluate_5','$Suggestion')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location:userformlist.php?msg=เพิ่มข้อมูลสำเร็จ");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>งานป้องกันและบรรเทาสาธารณภัย</title>
</head>
<body>
    <form method="POST">
    <h1>งานป้องกันและบรรเทาสาธารณภัย</h1>
    <h4>กรุณากรอกข้อมูลให้ครบถ้วน</h4>
    <div>
        <label for="Disaster">งานป้องกันและบรรเทาสาธารณภัย</label> <span class="required">*</span><br><br>
        <input type="checkbox" name="Disaster" value="ด้านอุทกภัย" > ด้านอุทกภัย<br>
        <input type="checkbox" name="Disaster" value="ด้านอัคคีภัย" > ด้านอัคคีภัย<br>
        <input type="checkbox" name="Disaster" value="ด้านภัยแล้ง"> ด้านภัยแล้ง<br>
        <input type="checkbox" name="Disaster"value="ด้านภัยหนาว" > ด้านภัยหนาว<br>
        <input type="checkbox" name="Disaster" value="ด้านวาตภัย"> ด้านวาตภัย<br>
        <input type="checkbox" name="Disaster" value="ด้านมลพิษทางอากาศ PM 2.5"> ด้านมลพิษทางอากาศ PM 2.5<br>
    </div><br>
    <div>
        <label for="Gender">เพศ</label> <span class="required">*</span><br><br>
        <input type="radio" name="Gender" value="เพศชาย" required> เพศชาย<br>
        <input type="radio" name="Gender" value="เพศหญิง" required> เพศหญิง<br>
    </div><br>
    <div>
        <label for="Age">อายุ</label> <span class="required">*</span><br><br>
        <input type="radio" name="Age" value="ต่ำกว่า 20 ปี" required> ต่ำกว่า 20 ปี<br>
        <input type="radio" name="Age" value="20 - 30 ปี" required> 20 - 30 ปี<br>
        <input type="radio" name="Age" value="31 - 40 ปี" required> 31 - 40 ปี<br>
        <input type="radio" name="Age" value="41 - 50 ปี" required> 41 - 50 ปี<br>
        <input type="radio" name="Age" value="51 - 60 ปี" required> 51 - 60 ปี<br>
        <input type="radio" name="Age" value="60 ปีขึ้นไป" required> 60 ปีขึ้นไป<br>
    </div><br>
    <div>
        <label for="Career">อาชีพ</label> <span class="required">*</span><br><br>
        <input type="radio" ame="Career" value="รับราชการ/รัฐวิสาหกิจ" required> รับราชการ/รัฐวิสาหกิจ<br>
        <input type="radio" name="Career" value="พนักงานเอกชน"  required> พนักงานเอกชน<br>
        <input type="radio" name="Career" value="ค้าขาย" required> ค้าขาย<br>
        <input type="radio" name="Career" value="รับจ้าง" required> รับจ้าง<br>
        <input type="radio" name="Career" value="เกษตรกรรม" required> เกษตรกรรม<br>
        <input type="radio" name="Career" value="นักเรียน/นักศึกษา" required> นักเรียน/นักศึกษา<br>
        <input type="radio" nname="Career" value="ธุรกิจส่วนตัว" required> ธุรกิจส่วนตัว<br>
        <input type="radio" name="Career" value="อื่นๆ" required> อื่นๆ<br>
    </div><br>
    <h4>แบบฟอร์มการประเมินความพึงพอใจที่มีต่อการบริการ</h4><br>

    <div>
        <label for="Evaluate_1">1. พูดจาสุภาพ การแต่งกายสุภาพ ตอบข้อชักถามชัดเจน แก้ไขปัญหาได้</label> <span class="required">*</span><br><br>
        <input type="radio" name="Evaluate_5" value="มากที่สุด"  required> มากที่สุด<br>
        <input type="radio" name="Evaluate_1" value="มาก"required> มาก<br>
        <input type="radio" name="Evaluate_1" value="ปานกลาง" required> ปานกลาง<br>
        <input type="radio" name="Evaluate_1" value="น้อย" required> น้อย<br>
        <input type="radio" name="Evaluate_1" value="ควรปรับปรุง" required> ควรปรับปรุง<br>
    </div><br>
    <div>
        <label for="Evaluate_2">2. เป็นระบบไม่ยุ่งยาก สะดวก ติดต่อง่าย</label> <span class="required">*</span><br><br>
        <input type="radio" name="Evaluate_2" value="มากที่สุด" required> มากที่สุด<br>
        <input type="radio" name="Evaluate_2" value="มาก" required> มาก<br>
        <input type="radio" name="Evaluate_2" value="ปานกลาง" required> ปานกลาง<br>
        <input type="radio" name="Evaluate_2" value="น้อย" required> น้อย<br>
        <input type="radio" name="Evaluate_2" value="ควรปรับปรุง" required> ควรปรับปรุง<br>
    </div><br>
    <div>
        <label for="Evaluate_3">3. จุดบริการสถานที่ ที่จอดรถ ห้องน้ำ สะดวก สะอาด</label> <span class="required">*</span><br><br>
        <input type="radio" name="Evaluate_3" value="มากที่สุด" required> มากที่สุด<br>
        <input type="radio" name="Evaluate_3" value="มาก" required> มาก<br>
        <input type="radio" name="Evaluate_3" value="ปานกลาง" required> ปานกลาง<br>
        <input type="radio" name="Evaluate_3" value="น้อย" required> น้อย<br>
        <input type="radio" name="Evaluate_3" value="ควรปรับปรุง" required> ควรปรับปรุง<br>
    </div><br>
    <div>
        <label for="Evaluate_4">4.เจ้าหน้าที่มีความรู้และความเข้าใจในการให้บริการ</label> <span class="required">*</span><br><br>
        <input type="radio" name="Evaluate_4" value="มากที่สุด" required> มากที่สุด<br>
        <input type="radio" name="Evaluate_4" value="มาก" required> มาก<br>
        <input type="radio" name="Evaluate_4" value="ปานกลาง" required> ปานกลาง<br>
        <input type="radio" name="Evaluate_4" value="น้อย" required> น้อย<br>
        <input type="radio" name="Evaluate_4" value="ควรปรับปรุง" required> ควรปรับปรุง<br>
    </div><br>
    <div>
        <label for="Evaluate_5">5.เจ้าหน้าที่มีความตั้งใจและทุ่มเทในการทำงาน</label> <span class="required">*</span><br><br>
        <input type="radio" name="Evaluate_5" value="มากที่สุด" required> มากที่สุด<br>
        <input type="radio" name="Evaluate_5" value="มาก" required> มาก<br>
        <input type="radio" name="Evaluate_5" value="ปานกลาง" required> ปานกลาง<br>
        <input type="radio" name="Evaluate_5" value="น้อย" required> น้อย<br>
        <input type="radio" name="Evaluate_5" value="ควรปรับปรุง" required> ควรปรับปรุง<br>
    </div><br>
    <div>
        <label for="Suggestion">ข้อเสนอแนะ</label>
        <textarea name="Suggestion" cols="30" rows="3"></textarea>
    </div><br>
    <input type="submit" name="submit" value="Submit">
    <input type="reset" value="Reset">
    </form>


</body>
</html>