# PHP Complete CRUD Application

### ****Creating the Database Table****

Create a table named *crud* inside your MySQL database using the following code.

```sql
CREATE TABLE `crud` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Problems` varchar(255) NOT NULL,
  `Problem_type` varchar(255) NOT NULL,
  `Problem_details` varchar(255) NOT NULL,
  `Image_file` 	blob(255) NOT NULL,
  `Problem_location` point(255) NOT NULL,
  `Problem_Date` date(255) NOT NULL,
  `Problem_update` varchar(255) NOT NULL,
  `Responsible_position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)
```

### ****Copy files to htdocs folder****

Download the above files. Create a folder named *crud* inside *htdocs* folder in *xampp* directory. Finally, copy the *crud* folder inside *htdocs* folder. Now, visit [localhost/crud](http://localhost/crud) in your browser and you should see the application.


-ทำ notification facebook in website
-ระบบแจ้งเตือน Line ​Notify ด้วย PHP + Bootstrap 5
-เชื่อมหน้าแบบประเมิน
-หน้า index ทำให้แบบประเมินขึ้น
-หน้า index รูปโปรไฟล์ และเชื่อมต่อกับฐานข้อมูล login
-ตกแต่ง css ทุกหน้า
-อ่านหน้า complaint เมื่อเชื่อมกับหน้า complaint กับฐานข้อมูล login
- หน้า Complaint_data รูปไม่ขึ้น