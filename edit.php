<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    $con = mysqli_connect("localhost","root","","login db",) or die("connection failed");
    $emp_id = $_GET['id'];
    $sql = "SELECT * FROM employee where empid = {$emp_id}";
    $result = mysqli_query($con , $sql) or die("query unsuccessful");
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result)){
     ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="empid" value="<?php echo $row['empid'];?>"/>
          <input type="text" name="empname" value="<?php echo $row['empname'];?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="empaddress" value="<?php echo $row['empaddress'];?>"/>
      </div>
      <div class="form-group">
          <label>Class</label>
          <?php
          $sql1 = "SELECT * FROM department";
          $result1 = mysqli_query($con , $sql1) or die("query unsuccessful");
          if (mysqli_num_rows($result1) > 0)
          {
            echo '<select name="empdept">';
              while($row1 = mysqli_fetch_assoc($result1)){
                if($row['empdept'] == $row1['deptid'])
                {
                    $select = "selected";
                }else{
                    $select = "";
                }
             echo "<option {$select} value='{$row1['deptid']}'> {$row1['deptname']} </option>";
              }
          echo '</select>';
            }
          ?>
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="empph" value="<?php echo $row['empph'];?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>
    <?php }
    
    }?>
</div>
</div>
</body>
</html>
