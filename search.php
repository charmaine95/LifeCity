<?php 
require_once ('init.php');

  $user = new User(new PDOdb("mysql:host=localhost;dbname=life_city","root",""));

$username=$_POST['username'];


  $results = $user->search_name(array('username' => $username) );


?>

<!DOCTYPE html>
<html lang="en">
<title>Search</title>

<body>  
   <center>
    <header>
        <div class="container">
            <div class="row">
                <!--<div class="col-sm-offset-3 col-sm-6 contact-form">  -->   
           <?php
        if($results){ 
     ?>
     <form action="#" method="post">
            
        <table name="studlisting" class="table table-striped table-bordered">
           <tr>
            <td style="font-family:century; font-size:20px; text-align:center; font-style:bold">username</td>
            <td style="font-family:century; font-size:20px; text-align:center; font-style:bold">First Name</td>
            <td style="font-family:century; font-size:20px; text-align:center; font-style:bold">Last Name</td>
            <td style="font-family:century; font-size:20px; text-align:center; font-style:bold">Email Address</td>
           
           </tr>
        <?php
           foreach($results as $result){
        ?>         
           <tr class="listdetails">
              <td><?php echo $result['username'] ?></td>
              <td><?php echo $result['fname'] ?></td>
              <td><?php echo $result['lname'] ?></td>
               <td><?php echo $result['eadd'] ?></td>
              
           </tr> 
        <?php
           }
        ?>


       
           
          
        </table>
       
        <a class="form-control" href="neighbor_view.php?mode=1&username=<?php echo $result['username'] ?>">View Neighbor</a>
        </form>
   <?php
     } else { 
   ?>     
         <div>
            No Records on file...
         </div>
     <div class="listdiv">
            <a href="">
             
            </a>      
     <div>
   <?php
       }
   ?>


           
            </div>
            </div>
        </div>
    </header>

    
   
   
   
</center>
</body>

</html>
