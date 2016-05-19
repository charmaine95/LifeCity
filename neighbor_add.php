<?php

require_once "init.php";

$user = new User(new PDOdb("mysql:host=localhost;dbname=life_city","root",""));

$username = $_POST['username'];
$level  = $_POST['level'];
$fname  = $_POST['fname'];
$lname  = $_POST['lname'];
$eadd = $_POST['eadd'];
$n_id     = $_POST['n_id'];

$result = $user->update(array('username'=>$username,'level'=>$level,
	                 'fname'=>$fname,'lname'=>$lname,
	                 'eadd'=>$eadd, 'n_id'=>$n_id),array('username'=>$username),1);

header('Location:neighbor.php');