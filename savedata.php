<?php
$emp_name = $_POST['empname'];
$emp_address = $_POST['empaddress'];
$emp_dept = $_POST['empdept'];
$emp_ph = $_POST['empph'];

$conn = mysqli_connect("localhost","root","","login db") or die("connections unsuccessfull");
$sql = "INSERT INTO employee (empname,empaddress,empdept,empph) VALUES ('{$emp_name}','{$emp_address }','{$emp_dept}','{$emp_ph}') ";
$result = mysqli_query($conn,$sql) or die("query unsuccessfull");
header("Location:http://localhost/ems/admin/index.php");

mysqli_close($conn);
?>