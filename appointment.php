<?php
include("connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$contactnum = $_POST['contactnum'];
		$email = $_POST['email'];
		$cnic = $_POST['cnic'];
		$carname = $_POST['carname'];
		$year = $_POST['year'];
		$day = $_POST['day'];
		$deal = $_POST['deal'];
		$services = $_POST['services'];
		$problem = $_POST['problem'];
		if(!empty($name) && !empty($contactnum) && !empty($email)&& !empty($cnic)&& !empty($carname)&& !empty($year)&& !empty($day)&& !empty($deal)&& !empty($services)&& !empty($problem))
		{
			//save to database
			$query = "INSERT into appointment (name,contactnum,email,cnic,carname,year,day,deal,services,problem) values ('$name','$contactnum','$email','$cnic','$carname','$year','$day','$deal','$services','$problem')";
            mysqli_query($con, $query);
        }
    else
    {
        echo "Please enter some valid information!";
    }
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF30-">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        
        .one{
            position: absolute;
            left: 41%;
            top: 2%;
            padding:20px;
            background-color: aliceblue;
            border-radius: 10px;
        }
        h1{
            font-size: 150%;
            text-align: center;
        }
        #s1{
            width: 70px;
        }
        #d1{
            width: 250px;
            height: 80px;
        }
        img{
            width: 100%;
            position: absolute;
            top: 0%;
            left: 0%;
            opacity: 0.6;
        }
        body{
            background-image: url(blur2.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>
<body >
  <form method="POST"  action="">
  <div class="t1">
<div class="one" style="border: 0px solid black;">
    <h1> Online Appointment</h1>
    <input placeholder="Name"  type="text" name="name"> <br><br>
    <input placeholder="Contact Number" type="text" name="contactnum"><br><br>
    <input placeholder="Email ID" type="text" name="email" ><br><br>
    <input placeholder="Cnic" type="text" name="cnic"><br><br>
    <input type="text" placeholder="Car Name" name="carname" id=""><br><br>
    <input type="text" name="year" placeholder="Model Year" id=""><br><br>
     <input type="text" name="day" placeholder="Day For Appointment" id=""><br><br>
    <input type="text" name="deal" placeholder="Select Deal" id=""><br><br>
    <input type="text" name="services" placeholder="Services" id=""><br><br>
    Describe Your Problem:<br><input type="text"  id="d1" name="problem">
<br><br><input type="submit" name="submit" value="Submit" id="s1"> 
</div>        
  </div>
  </form>
</body>
</html>