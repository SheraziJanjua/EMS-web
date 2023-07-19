<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="empname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="empaddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="empdept">
                <option value="" selected disabled>Select Class</option>
                <?php
              $conn = mysqli_connect("localhost","root","","login db") or die("connections unsuccessfull");
              $sql = "SELECT * FROM department";
              $result = mysqli_query($conn,$sql) or die("query unsuccessfull");
              while($row = mysqli_fetch_assoc($result))
              {
              ?>
                <option value="<?php echo $row['deptid']; ?>"><?php echo $row['deptname'];?></option>
                <?php } ?>
            </select>
            
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="empph" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
