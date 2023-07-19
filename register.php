<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $sql = "SELECT user_name FROM users WHERE user_name = '{$user_name}'";

    $result = mysqli_query($con, $sql) or die("Query Failed.");

    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
    } else {
        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            // Save to database
            $user_id = random_num(20);
            $query = "INSERT INTO users (user_id,user_name,password) VALUES ('$user_id','$user_name','$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        } else {
            echo "Please enter valid information in all fields!";
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
</head>

<body>

    <style type="text/css">
      

        body {
            font-family: Arial, sans-serif;
            background-image: url("3.jpg");
        }

        #frm1 {
            max-width: 500px;
            margin: 25px auto;
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

        <form id="frm1" method="post" onsubmit="return validateForm()">
            <label for="nm">Enter Name:</label>
            <br>
            <input type="text" id="nm" name="nm" required>
            <br>
            <p>
                <label for="email">E-Mail</label>
                <br>
                <input type="email" id="email" name="email" required>
            </p>

            <p>
                <label for="user">USER NAME</label>
                <input type="text" id="cnic" name="user_name" required>
                <br>
                <div id="res"></div>
            </p>

            <label>Select your gender:</label>
            <br>
            <input type="radio" name="rd" value="Male" required> Male
            <input type="radio" name="rd" value="Female" required> Female
            <input type="radio" name="rd" value="other" required> Other
            <br>
            <br>
            <label>Enter your Age:</label>
            <br>
            <input type="number" name="age" required>
            <br>
            <br>
            <label>Choose your type of Organization:</label>
            <br>
            <input type="checkbox" name="ch1"> Tech
            <br>
            <input type="checkbox" name="ch2"> Textile
            <br>
            <input type="checkbox" name="ch3"> Manufacturing
            <br>
            <input type="checkbox" name="ch4"> College/University
            <br>
            <input type="checkbox" name="ch5"> Multi-purpose Store
            <br>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" id="password"  onkeyup="checkPasswordStrength(this.value)" required> 
				
            </p>
            <p>
                <label class="pass_check">8 Characters</label><br>
                <label class="pass_check">1 lowercase letter</label><br>
                <label class="pass_check">1 uppercase letter</label><br>
                <label class="pass_check">1 Special character</label><br>
            </p>
            <br>
            <input id="button" type="submit" value="SUBMIT"><br><br>
            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>


    <p id="demo"></p>

    <script>
        function validateForm() {
            var name = document.forms["frm1"]["nm"].value;
            var email = document.forms["frm1"]["email"].value;
            var cnic = document.forms["frm1"]["cnic"].value;
            var gender = document.querySelector('input[name="rd"]:checked');
            var age = document.forms["frm1"]["age"].value;
            var password = document.forms["frm1"]["password"].value;
			var passCheck = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
			if (!passCheck.test(password)) {
                alert("Password must contain at least 8 characters, including 1 uppercase letter, 1 lowercase letter, 1 special character, and 1 digit");
                return false;
            }
           if (name == "") {
                alert("Name must be filled out");
                return false;
            }
            if (email == "") {
                alert("Email must be filled out");
                return false;
            }
            if (cnic == "") {
                alert("CNIC must be filled out");
                return false;
            }
            if (!gender) {
                alert("Gender must be selected");
                return false;
            }
            if (age == "") {
                alert("Age must be filled out");
                return false;
            }
            if (password == "") {
                alert("Password must be filled out");
                return false;
            }
            
            return true;
        }

        function checkPasswordStrength(password) {
            var x = document.getElementsByClassName("pass_check");
            const lower = new RegExp("(?=.*[a-z])");
            const upper = new RegExp("(?=.*[A-Z])");
            const special = new RegExp("(?=.*[!@#$%^&*()_+])");
            const eight = new RegExp("(?=.{8,})");

            if (eight.test(password)) {
                x[0].style.color = "green";
            } else {
                x[0].style.color = "darkgray";
            }
            if (lower.test(password)) {
                x[1].style.color = "green";
            } else {
                x[1].style.color = "darkgray";
            }
            if (upper.test(password)) {
                x[2].style.color = "green";
            } else {
                x[2].style.color = "darkgray";
            }
            if (special.test(password)) {
                x[3].style.color = "green";
            } else {
                x[3].style.color = "darkgray";
            }
        }
    </script>
</body>

</html>
