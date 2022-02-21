<?php 
$id = $_GET['bid'];
require_once "connection.php";
$sql = "delete from books where bid=$id";
 $db->query($sql); 
 header('location:list_book.php');
 ?>
 