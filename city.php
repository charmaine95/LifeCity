
<!doctype>
<html>
<head>

<title>City</title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



</head>

<style type="text/css">

body
{
	
	background-size: 100% ;
	background-repeat: no-repeat;
	background-image: url("image/City.jpg");
}

.nav
{
	padding: 30px;
	
	background-size: 
}

p
{
	font-family: cursive;
	font-size: 30px;
}


ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
}

li a {
    display: block;
    color: #000;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}

.active 
{
background-color:#4CAF50;
}

.search
{
margin-left: 1000px; 

}

.sidenav
{
	
	width: 200%; 
	 height:10px;
	 margin-left: 30px ;
	 
	
}

.progress
{
	width: 10%;
	margin: 10%;
}

.container
{

	margin-left: 400px;
	width: 900px;
    height: 390px;   
}

th, td {
    padding: 5%;
    text-align: left;


}

.happiness
{

}

.airport{
  background: url("image/airport.png");
  background-size: 100px;
  background-repeat: no-repeat;
  width: 600px;
   height: 100px;
   background-position: 100% 20%; 
}

.airport-link{

/*    top: 8px; 
    left: 10px; 
    width: 10px; 
    height: 10px; */
/*    background-color: transparent; 
    border: 10px solid yellow;*/
}

.gas{
  background: url("image/gas.png");
  background-size: 100px;
  background-repeat: no-repeat;
  width: 50%;
   height: 100px;
   background-position: 60% 20%; 
}

.home{
  background: url("image/home.png");
  background-size: 100px;
  background-repeat: no-repeat;
  width: 50%;
   height: 100px;
   background-position: 73% 20%; 
}
.hospital{
  background: url("image/hospital.png");
  background-size: 100px;
  background-repeat: no-repeat;
  width: 100%;
   height: 100px;
   background-position: 82% 20%; 
}
</style>


<body>

<div class="homepage">
</div>
<div class ="search">
 <form class="navbar-form navbar-left" role="search" >
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>

   <a  href="airport.php">
  <div class="airport">

  </div>
 </a>
<div class="nav">

<ul>
<li><a class="active" href="#home">L.I.F.E</a></li>
  <li><a href="#home">Home</a></li>
   <li><a href="#contact">Shop</a></li>
  <li><a href="#news">Neigbor</a></li>
 	<li><a href="#news">News</a></li>
  <li><a href="#about">About</a></li>
</ul>
</div>  
 	<a href="gas.php">
<div class="gas"></div>
</a>
<a href="home.php">
<div class="home"></div>
</a>
<a href="hospital.php">
<div class="hospital"></div>
</a>
</body>
</html>