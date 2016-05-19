<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('#');
}

if(isset($_POST['signup']))
{
	$username = ($_POST['txt_uname']);
	$psd = ($_POST['txt_psd']);
	$fname= ($_POST['txt_fname']);
	$lname= ($_POST['txt_lname']);
	$eadd = ($_POST['txt_eadd']);
	
	
	if($username=="")	{
		$error[] = "Fill out Username.";	
	}
	else if($eadd=="")	{
		$error[] = "Provide E-mail Address";	
	}
	else if(!filter_var($eadd, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address.';
	}
	else if($fname==""){
		$error[]= "Fill out First Name.";
	}
	else if($lname==""){
		$error[]= "Fill out Last Name.";
	}
	else if($psd=="")	{
		$error[] = "Provide a password!";
	}
	
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT username, psd, fname, lname, eadd FROM user WHERE username=:username OR eadd=:eadd");
			$stmt->execute(array(':username'=>$username, ':eadd'=>$eadd));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['username']==$username) {
				$error[] = "Username already taken.";
			}
			else
			{
				if($user->register($username,$psd,$fname,$lname,$eadd)){	
					$user->redirect('index.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Life City</title>
</head>
<style type="text/css">
body{
	background-image: url("image/bground.jpg");
	background-size: 90%;
}	

div.box{
	background-color: #333300;
	opacity: 0.5;
	filter: Alpha(opacity=50);
	height: 650px;
	width: 50%;
	font-family: Georgia, "serif";
	font-size: 30px
	padding: 20px;

}

input[type="text"] {
  padding: 10px;
  border: solid 5px #c9c9c9;
  transition: border 0.3s;
  opacity: 20;
}
input[type="password"] {
  padding: 10px;
  border: solid 5px #c9c9c9;
  transition: border 0.3s;
}

.myButton {
  -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
  -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
  box-shadow:inset 0px 1px 0px 0px #ffffff;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9));
  background:-moz-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
  background:-webkit-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
  background:-o-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
  background:-ms-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
  background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9',GradientType=0);
  background-color:#f9f9f9;
  -moz-border-radius:6px;
  -webkit-border-radius:6px;
  border-radius:6px;
  border:1px solid #dcdcdc;
  display:inline-block;
  cursor:pointer;
  color:#666666;
  font-family:Arial;
  font-size:15px;
  font-weight:bold;
  padding:6px 24px;
  text-decoration:none;
  text-shadow:0px 1px 0px #ffffff;
}
.myButton:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9));
  background:-moz-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
  background:-webkit-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
  background:-o-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
  background:-ms-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
  background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9',GradientType=0);
  background-color:#e9e9e9;
}
.myButton:active {
  position:relative;
  top:1px;
}
</style>
<body>
<center>

<div class="box">
<form method="post" class="form-signin">
<h1>Register here...</h1>
<?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; You are now registered! <a href='login.php'>login</a> here
                 </div>
                 <?php
			}
			?>
			<form action="" method="POST" name="elegant-aero">
 <input type="text" name="txt_uname" id="username" value="" placeholder="username" />
       <br><br>
      <input type="password" name="txt_psd" id="psd" value="" placeholder="password" />
      <br><br>
    
      <input type="text" name="txt_fname" id="fname" value="" placeholder="First Name"/>
    <br><br>
      <input type="text" name="txt_lname" id="lname" value=""  placeholder="Last Name" />
      <br><br>
 
      <input type="text" name="txt_eadd" id="eadd" value="" placeholder="Emaill Address" />
      <br><br>
   <input type="submit" name="signup" id="submit" value="Submit"  class="myButton"/>
    <input type="reset" name="Reset" id="Reset" value="Reset" class="myButton" />
</div>
</form>
</form>

</center>
</body>
</html>