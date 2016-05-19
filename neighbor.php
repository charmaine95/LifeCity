
<?php
 require_once('init.php');

    $user = new User(new PDOdb("mysql:host=localhost;dbname=life_city","root",""));

    $results = $user->show('lname');


?>
<!DOCTYPE html>
<html>
<head>
<title>Neighbor</title>
<style type="text/css">
  
             
</style>


</head>
<body id="body"><br><br>
<center>
<!-- Second Search -->
  <form action="search.php" method="POST">

  <input type="text" value="" name="username" placeholder="username">
  <button type="submit" value="" name="submit" >Search </button>

  </form>
  
</center>
<h1>Added Neighbor</h1>

<div class="box">
        <?php
        if($results){ 
     ?>
           <table name="#" class="#">
             <tr>
                <td>Username</td>
                <td>Level</td>
              

                
                
             </tr>
          <?php
             foreach($results as $result){
          ?>         
             <tr class="listdetails">
                <td><?php echo $result['username'] ?></td>
                <td><?php echo $result['level'] ?></td>
             </tr> 
          <?php
             }
          ?>
             <tr>
                <td colspan="4">
                  <?php
                      echo "Total Count: ".count($results);
                  ?> 
                </td>
             </tr> 
             
          </table>
           <?php
       } else { 
     ?>     
         <div>
            No Records on file...
         </div>
         <div class="listdiv">
                  
         <div>
     <?php
       }
     ?>

</body>
</html>