<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location:http://localhost/ems/admin/");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	  body {
		  font-family: Arial, sans-serif;
		  background-image: url("3.jpg");
	  }

	  #frm1 {
		  max-width: 500px;
		  margin: 200px auto;
		  padding: 20px;
		  background-color: #fff;
		  border: 1px solid #ccc;
		  border-radius: 5px;
		  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	  }

	  label {
		  font-weight: bold;
	  }

	  input[type="text"],
	  input[type="number"],
	  input[type="password"],
	  input[type="email"],
	  select {
		  width: 100%;
		  padding: 8px;
		  margin-bottom: 10px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
	  }

	  input[type="radio"],
	  input[type="checkbox"],
	  input[type="number"] {
		  margin-bottom: 10px;
	  }

	  input[type="submit"] {
		  background-color: #4caf50;
		  color: #fff;
		  padding: 10px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
	  }

	  #demo {
		  color: red;
		  font-weight: bold;
		  text-align: center;
		  margin-bottom: 30px;
	  }

	  a {
		  text-decoration: none;
		  align: center;
		  color: Black;
	  }
  </style>


	<div id="box">
		
		<form method="post" id="frm1">
			<!-- <div style="font-size: 20px;margin: 10px;color: white; align:center">Login</div> -->
			<p>
                <label for="user">USER NAME</label>
                <input type="text" id="cnic" name="user_name" required>
                <br>
                <div id="res"></div>
            </p>


			<!-- <input id="text" type="text" name="user_name"><br><br> -->
			<label for="user">PASSWORD</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="register.php">Click to register</a><br><br>
		</form>
	</div>
</body>
</html>