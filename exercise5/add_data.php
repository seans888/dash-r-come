<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
<!DOCTYPE HTML>  
<html>
<head>
<header>
 <div id="content">
    <label><center>CRUD Operations With PHP and MySql</center></label>
    </div>
<?php

include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
 $name = $_POST['name'];
 $email = $_POST['email'];
 $nickname = $_POST['nickname'];
 $address = $_POST['address'];
 $comment = $_POST['comment'];
 $gender = $_POST['gender'];
 $cellphone= $_POST['cellphone'];
 //-----------------------------
 
 // sql query for inserting data into database
 
        $sql_query = "INSERT INTO sample(name,nickname, email, address, comment, gender, cellphone) VALUES('$name','$nickname','$email','$address','$comment','$gender','$cellphone')";
 mysqli_query($con, $sql_query);
 
}

// define variables and set to empty values
$nameErr = $emailErr = $genderErr  = $nicknameErr = $addressErr = $cellphoneErr = "";
$name = $email = $gender = $comment = $nickname = $address = $cellphone = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and numbers allowed"; 
    }
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nickname"])) {
    $nicknameErr = "Nickname is required";
  } else {
    $nickname = test_input($_POST["nickname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$nickname)) {
      $nicknameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    if (empty($_POST["address"])) {
    $address = "";
  } else {
    $address = test_input($_POST["address"]);
  }
    
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
   
     $cellphone = $_POST['cellphone'];
if(!empty($cellphone))
{
    if(preg_match('/^\d{10}$/',$cellphone))
    {
		$cellphoneErr ="Cellphone number is required";
        $cellphone = '0' . $cellphone;
      
    }
    else 
    {
      echo '';
    }
}
else 
{
  echo ' ';
}
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<style>
body{
	background-color:white;
	border:5px solid red;
}
form{
width:440px;
padding:10px 30px 40px;
font-family:'Droid Serif',serif
}
h2{
	color: black;
	text-align: center;
}
.output{
	text-align: center;
	text-size: 15;
}
.error{
	color:red;
}
</style>
</head>

<body>  
<center>
 <div id="content"><td align="center"><a href="index.php">back to main page</a></td>
   
	<div class = "phpform"><center>
 <h2>Visitor of Alyssa Anne's Page Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Full Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  </br>
   Nickname: <input type="text" name="nickname" value="<?php echo $nickname;?>">
  <span class="error">* <?php echo $nicknameErr;?></span>
  </br>
  E-mail Adress: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  </br>
  Home Address: <textarea name="address" rows="5" cols="40"><?php echo $address;?></textarea>
  </br>
   Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  </br>
  
  Cellphone Number: <input type="text" name="cellphone" value="<?php echo $cellphone;?>">
  <span class="error">*<?php echo $cellphoneErr;?></span>
  </br>
 
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  </br>
 
   <input type="submit" name="btn-save"></button>
   <strong>SAVE</strong></td> 
</form>
</div>
</center>

<div class="output">
<?php
echo "<h2>Thank you for taking time filling the form:</h2>";
echo "Hello!" . $nickname;
echo "<br>";
echo "This is your information our dear vistor:";
echo "<br>";
echo $name;
echo "<br>";
echo $nickname;
echo "<br>";
echo $address;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $cellphone;
echo "<br>";
echo $comment;
?>
</div>

</body>
</html>	

