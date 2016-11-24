<?php
include_once 'dbconfig.php';
if(isset($_GET['edit_id']))
{
$sql_query="SELECT * FROM sample WHERE user_id=".$_GET['edit_id'];
 $result_set=mysqli_query($con, $sql_query);
 $fetched_row=mysqli_fetch_array($result_set);
}

if(isset($_POST['btn-update']))
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
 

 // sql query for update data into database
 $sql_query = "UPDATE users SET name='$name',nickname='$nickname',email='$email',address='$address',gender='$gender',comment='comment',cellphone='cellphone' WHERE user_id=".$_GET['edit_id'];
 // sql query for update data into database
 
 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Data Are Updated Successfully');
  window.location.href='index.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while updating data');
  </script>
  <?php
 }
 // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
 header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD Operations With PHP and MySql - By Cleartuts</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>EDITING & UPDATING DATABASE</label>
    </div>
</div>

<body>  
<center>
 <div id="content"><td align="center"><a href="index.php">back to main page</a></td>
   
	<div class = "phpform"><center>
 <h2>Visitor of Alyssa Anne's Page Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Full Name: <input type="text" name="name">
  </br>
   Nickname: <input type="text" name="nickname" >
  </br>
  E-mail Adress: <input type="text" name="email" >
  </br>
  Home Address: <textarea name="address" rows="5" cols="40"></textarea>
  </br>
   Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="male">Male
  </br>
  
  Cellphone Number: <input type="text" name="cellphone">
  </br>
 
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  </br>
 
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
    <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    </td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>