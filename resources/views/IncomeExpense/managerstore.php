<?php
//1. เชื่อมต่อ database: 

    header("Content-Type: text/html; charset=UTF-8");
      
    $host="localhost";
    $user="root"; // MySql Username
    $pass=""; // MySql Password
    $dbname="dbshop"; // Database Name
  
    $conn=mysql_connect($host,$user,$pass) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้"); // เชื่อมต่อ ฐานข้อมูล
    mysql_select_db($dbname,$conn); // เลือกฐานข้อมูล
    mysql_query("SET NAMES utf8"); // กำหนด charset ให้ฐานข้อมูล เพื่ออ่านภาษาไทย
  


//2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT * FROM orders  "; 
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
  $result = mysqli_query($con, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

  echo "<table border='1' align='center' width='500'>";
//หัวข้อตาราง
  echo "<tr align='center' bgcolor='#CCCCCC'><td>แบนรด์</td><td>วันและเวลา</td><td>ชื่อ</td><td>ปี</td><td>รายการ</td><td>รายรับ</td><td>แก้ไข</td><td>ลบ</td></tr>";
  while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td>" .$row["total"] .  "</td> ";


  //แก้ไขข้อมูล
  echo "<td><a href='edit_reven.php?reven_brand=$row[0]'>edit</a></td> ";
  
  //ลบข้อมูล
  echo "<td><a href='delete_reven.php?reven_brand=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\">del</a></td> ";
  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($con);
?>