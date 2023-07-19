<?php
 $emp_id = $_GET['id'];
$con = mysqli_connect("localhost","root","","login db",) or die("connection failed");
$sql = "DELETE FROM employee WHERE EMPID = {$emp_id}  ";
$result = mysqli_query($con , $sql) or die("query unsuccessful");
header("Location:http://localhost/ems/admin/index.php");
mysqli_close($conn);


?>