<html>
<title>Hello Visitor</title>
<body>
<style>
h2{
	color:pink;
	text-align: center;
}
.phpform{
width:440px;
border:1px solid blue;
padding:10px 30px 40px;
background-color:#f0f8ff;
font-family:'Droid Serif',serif
float: right;
}
.error{
	color:red;
}
</style>

<?php
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
<div class = "phpform">
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
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  </br>
  
  Cellphone Number: <input type="text" name="cellphone" value="<?php echo $cellphone;?>">
  <span class="error">*<?php echo $cellphoneErr;?></span>
  </br>
 
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  </br>
 
   <input type="submit" name="submit" value="Submit">  
</form>
</div>

<?php
echo "<h2>Thank you for taking time filling the form:</h2>";
echo "Hello!" . $nickname;
echo "<br>";
echo "A bit information about you dear vistor:";
echo "<br>";
echo $name;
echo "<br>";
echo $nickname;
echo "<br>";
echo $email;
echo "<br>";
echo $address;
echo "<br>";
echo $gender;
echo "<br>";
echo $cellphone;
echo "<br>";
echo $comment;
?>

</body>
</html>	