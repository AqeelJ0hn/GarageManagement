<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$pass = $_POST['pass'];


		if(!empty($email) && !empty($pass) )
		{

			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pass'] === $pass)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .one1{
            padding: 20px;
            position: absolute;
            left: 58.5%;
            top: 17%;
            border-left: none;
            margin-top: 16px;  
            padding: 24px; 
            padding-top: 47px;
            padding-bottom: 47px;
            background-color: white;
            text-align: center;
            border-radius: 10px;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            opacity: 1;
        }
        .p1{ 
            font-size: large;
        }
        .p2{
            font-size: large;
        }
        h1  {
            text-decoration: underline;
        text-align: center;
        margin-top: 3px;
        
        }
        .b1{
            font-size: medium;
        }
        .b2{
        font-size: medium;
           
        }
       img{
        position: absolute;
        top: -0.1%;
        left: -200%;
        padding-bottom: 10px;
        border-right: none;
        padding-bottom: 0px;
        border-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
        opacity: 0.9;
    }
    body {
            background-image: url(blur2.jpg);
            background-size: 100%;     
            opacity: 1;       
            
        }
    </style>
</head>
<body>
        <form method="post" class="one1" >
           
            <img src="logo.jpg" alt="" style="width: 470px; height: 370px;">
                <H1>Login Page</h1><br>
              <div class="p1"><input placeholder="Email ID" type="email" name="email" ></div><br>
                <div class="p2"> <input placeholder="Password" type="password" name="pass"></div><br>
                <input type="submit" name="submit" value="Login" class="b1" style="width: 115px;"><br><br><hr>
                <br><br>
                Don't have account? <a href="signup.php">Register</a>
            </form>        
</body>
</html>