<?php 
session_start();
$id = $_GET['bid'];
print_r($id);
// $bookname = $_GET['bname'];
// print_r($bookname);
require "connection.php";
		mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]', '$id', '', '', '','');");
		 if ($db->affected_rows == 1 ) {   
		 header("location:request.php");
		}
    	 else
    	 { 
    	 	echo "Insert failed";
    	 } 
?>
