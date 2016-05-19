<?php
    error_reporting(0);
    if($_POST){
        $conn = mysql_connect('localhost', 'root','') or die(mysql_error());
        mysql_select_db('life_city') or die('cannot select db');

        $username = $_POST['username'];
        $psd = $_POST['psd'];

        $query = mysql_query("SELECT * FROM user WHERE username='".$username."' and psd='".$psd."'");

        $no_rows = mysql_num_rows($query);

        if($no_rows>0){
            
            while($info = mysql_fetch_array( $query )){
                session_start();
                $_SESSION['id'] = $info['id'];
                $_SESSION['fname'] = $info['fname'];
                $_SESSION['lname'] = $info['lname'];
                $_SESSION['eadd'] = $info['eadd'];
                
                    header('Location: user_home.php');
                
               
                   
                
            }
        }else{
            $invalid = 'Invalid username and password';
        }
        mysql_close($conn);
    }

?>
<!DOCTYPE html>
<html lang="en">
  <title>Login</title>
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
      <h1>Login here..</h1>
        <br><br><br><br><br><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
            
                    
                   
                        <?php echo $invalid; ?>
                        <br>
                        
                                <input type="text" class="form-control" placeholder="Username" name="username" id="search-query-3">
                                <br><br>
                            
                      
                                <input type="password" class="form-control" placeholder="Password" name="psd" id="search-query-3">
                               
                            
                        <br><br>
                       

                    
            <button type="submit" name="login" class="myButton">
                    <i class=""></i> &nbsp; Log In
            </button>

            <br />
           
     
                
           
        </form>
        </div>
        </center>
  </body>
</html>
