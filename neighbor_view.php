<?php

require_once "init.php";

$user = new User(new PDOdb("mysql:host=localhost;dbname=life_city","root",""));

$username = $_GET['username'];
$mode = $_GET['mode'];

$result = $user->search(array('username'=>$username));

// Add
if(isset($_POST['insert']))
{
    try {

        // connect to mysql

        $pdoConnect = new PDO("mysql:host=localhost;dbname=life_city","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }

    // get values form input text and number
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $eadd = $_POST['eadd'];
    

    
    // mysql query to insert data

    $pdoQuery = "INSERT INTO `neighbor`(`username`,`fname`, `lname`, `eadd`) VALUES (:username,:fname,:lname,:eadd)";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":username"=>$username,":fname"=>$fname,":lname"=>$lname,":eadd"=>$eadd));
    
        // check if mysql insert query successful
    if($pdoExec)
    {
        echo 'Data Inserted';
    }else{
        echo 'Data Not Inserted';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Neighbor View</title>
</head>
<body>

	<?php if($mode === "1"){ ?> 
  <form action="neighbor_view.php" method="post">
      <form action="neighbor_add.php" method="post">
     <?php } elseif($mode === "2") { ?>
      <form action="teacherDelete.php" method="post"> 
     <?php } ?> 
           <input type="text" value="<?php echo $result['username'] ?>" name="username" placeholder="Last Name" class="form-control" <?php echo ($mode === "2") ? "readonly" : "" ?>><br>
          <input type="text" value="<?php echo $result['fname'] ?>" name="fname" placeholder="First Name" class="form-control" <?php echo ($mode === "2") ? "readonly" : "" ?>><br>
          <input type="text" value="<?php echo $result['lname'] ?>" name="lname" placeholder="Middle Name" class="form-control" <?php echo ($mode === "2") ? "readonly" : "" ?>><br>
          <input type="text" value="<?php echo $result['eadd'] ?>" name="eadd" placeholder="Title Earned" class="form-control" <?php echo ($mode === "2") ? "readonly" : "" ?>><br>
          <?php if($mode === "1") { ?>
             
             
            
         
        <?php if($mode === "1"){ ?>  
         <input class="btn btn-primary btn-lg" type="submit" name="insert" value="Add Neighbor">
        <?php 
              } elseif($mode === "2"){  
        ?>  
          <input class="form-control" type="submit" name="entry" value="Delete">
        <?php } ?>  
           
          
      </form> 
            

            
           
    
<?php } ?>
    </form>
</form>
</body>
</html>