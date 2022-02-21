<?php 
//database connection code
$connect = new mysqli('localhost','root','','library');
//check database connection error
if ($connect->connect_errno != 0 ) {
	die('Database connection error');
}
 ?>
 