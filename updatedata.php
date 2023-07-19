<?php
$emp_id = $_POST['empid'];
$emp_name = $_POST['empname'];
$emp_address = $_POST['empaddress'];
$emp_dept = $_POST['empdept'];
$emp_ph = $_POST['empph'];

$conn = mysqli_connect("localhost","root","","login db") or die("connections unsuccessfull");
$sql = "UPDATE employee SET empname = '{$emp_name }',empaddress = '{$emp_address }',empdept = '{$emp_dept }',empph = '{$emp_ph }' where empid={$emp_id}";
$result = mysqli_query($conn,$sql) or die("query unsuccessfull");
header("Location:http://localhost/ems/admin/index.php");

mysqli_close($conn);
?>