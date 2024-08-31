<?php
include "Problem_db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `crud` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: Problemhome.php?msg=ลบข้อมูลสำเร็จ");
} else {
  echo "Failed: " . mysqli_error($conn);
}
