<?php 
//get username passed from ajax
$username = $_POST['uname'];
//conection file
require_once "13.connection.php";
//query to select data with username
echo $sql = "select username from tbl_users where username='$username'";
//execute
$result = $connect->query($sql);
//if username is taken num_rows will be 1
if ($result->num_rows == 1) {
	echo "Username already taken";
}
?>