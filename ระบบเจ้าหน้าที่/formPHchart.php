<?php
include 'config.php'; // Connect to the database
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:../login/login_form.php');
    exit;
}


?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Highcharts Example</title>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- CSS -->
    <style type="text/css">
        /* CSS styles สำหรับกราฟ */
    </style>
</head>
<body>

<!-- ตำแหน่งที่จะแสดงกราฟ -->
<figure class="highcharts-figure">
    <div id="container"></div>
</figure>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "se";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

// สร้าง query สำหรับดึงข้อมูล
$sql = "SELECT Evaluate_1, Evaluate_2, Evaluate_3, Evaluate_4, Evaluate_5 FROM public_health_form";
$result = mysqli_query($conn, $sql);

// สร้าง array เพื่อเก็บข้อมูล Evaluate แยกตามชื่อ
$evaluates = array(
    'Evaluate_1' => array('มากที่สุด' => 0, 'มาก' => 0, 'ปานกลาง' => 0, 'น้อย' => 0, 'ควรปรับปรุง' => 0),
    'Evaluate_2' => array('มากที่สุด' => 0, 'มาก' => 0, 'ปานกลาง' => 0, 'น้อย' => 0, 'ควรปรับปรุง' => 0),
    'Evaluate_3' => array('มากที่สุด' => 0, 'มาก' => 0, 'ปานกลาง' => 0, 'น้อย' => 0, 'ควรปรับปรุง' => 0),
    'Evaluate_4' => array('มากที่สุด' => 0, 'มาก' => 0, 'ปานกลาง' => 0, 'น้อย' => 0, 'ควรปรับปรุง' => 0),
    'Evaluate_5' => array('มากที่สุด' => 0, 'มาก' => 0, 'ปานกลาง' => 0, 'น้อย' => 0, 'ควรปรับปรุง' => 0)
);

// นับจำนวนของแต่ละค่าในฟิลด์ Evaluate_1, Evaluate_2, Evaluate_3, Evaluate_4, และ Evaluate_5
while($row = mysqli_fetch_assoc($result)) {
    foreach ($evaluates as $key => $value) {
        switch ($row[$key]) {
            case 'มากที่สุด':
                $evaluates[$key]['มากที่สุด']++;
                break;
            case 'มาก':
                $evaluates[$key]['มาก']++;
                break;
            case 'ปานกลาง':
                $evaluates[$key]['ปานกลาง']++;
                break;
            case 'น้อย':
                $evaluates[$key]['น้อย']++;
                break;
            case 'ควรปรับปรุง':
                $evaluates[$key]['ควรปรับปรุง']++;
                break;
        }
    }
}

// แปลงข้อมูลเป็นรูปแบบ JSON โดยใช้ json_encode()
$json_data = json_encode($evaluates);
?>

<script type="text/javascript">
    // ใช้ข้อมูลที่ได้จากการนับในการสร้างกราฟ
    var data = <?php echo $json_data; ?>;
    
    // สร้างกราฟโดยใช้ Highcharts
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'คะแนนความพึงพอใจแบบฟอร์มงานสาธารณสุข'
        },
        xAxis: {
            categories: ['มากที่สุด', 'มาก', 'ปานกลาง', 'น้อย', 'ควรปรับปรุง'],
            title: {
                text: 'ระดับความประเมิน'
            }
        },
        yAxis: {
            title: {
                text: 'จำนวนการประเมิน'
            }
        },
        series: [{
            name: '1. พูดจาสุภาพ การแต่งกายสุภาพ ตอบข้อชักถามชัดเจน แก้ไขปัญหาได้ ',
            data: Object.values(data['Evaluate_1'])
        }, {
            name: '2. เป็นระบบไม่ยุ่งยาก สะดวก ติดต่อง่าย',
            data: Object.values(data['Evaluate_2'])
        }, {
            name: '3. จุดบริการสถานที่ ที่จอดรถ ห้องน้ำ สะดวก สะอาด',
            data: Object.values(data['Evaluate_3'])
        }, {
            name: '4. เจ้าหน้าที่มีความรวดเร็วในการให้บริการและไม่ซับซ้อน ',
            data: Object.values(data['Evaluate_4'])
        }, {
            name: '5. เจ้าหน้าที่สามารถตอบคำถาม ชี้แจงข้อสงสัยและให้คำแนะนำ ได้ถูกต้อง ',
            data: Object.values(data['Evaluate_5'])
        }]
    });
</script>

</body>
</html>