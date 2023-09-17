<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		if(!empty($email) && !empty($pass))
		{

			//save to database
			$user_id = random_num(10);
			$query = "insert into users (user_id,username,email,pass) values ('$user_id','$username','$email','$pass')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        .f1{
            background-color: aliceblue;
            margin-right: 400px;
            padding: 30px;
            padding-top: 30px;
            padding-bottom: 113px;
            position: absolute;
            left: 58.5%;
            top: 19%;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        h1{
            text-align: center;
            text-decoration: underline;
        }
        body{
            background-image: url(blur2.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
            opacity: 1;
        }
        img{
            position: absolute;
            top: 19%;
            left: 24%;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        
    </style>
</head>
<body>
    <img src="logo.jpg" alt="" style="width: 470px; height: 370px;">
    <form method="POST" class="f1">
        <h1>Registration</h1>
        <input type="text" name="username" placeholder="Username" id=""><br><br>	
		<input placeholder="Email" type="text" name="email"> <br><br>
        <input placeholder="Password" type="password" name="pass"> <br><br>
        <input type="submit" value="submit" style="font-size: medium;">
    </form>
</body>
</html>