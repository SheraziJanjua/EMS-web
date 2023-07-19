<?php include 'header.php'; 
if(isset($_POST['deletebtn']))
{

   $con = mysqli_connect("localhost","root","","login db",) or die("connection failed");
   $emp_id = $_POST['empid'];
   $sql = "DELETE FROM employee WHERE EMPID = {$emp_id}  ";
   $result = mysqli_query($con , $sql) or die("query unsuccessful");
   header("Location:http://localhost/ems/admin/index.php");
   mysqli_close($conn);
} ?> 
<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="empid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
