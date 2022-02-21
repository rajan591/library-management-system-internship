<?php 
//get username passed from ajax
$password = $_POST['password'];
require_once "lib_connection.php";
//query to select data with username
$sql = "select password from student where password='$password'";
//execute
$result = $connect->query($sql);
//if username is taken num_rows will be 1
if ($result->num_rows == 1) {
	echo "Password already taken";
}
	if (!preg_match("#[\\~\\`\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\{\\}\\[\\]\\|\\:\\;\\&lt;\\&gt;\\.\\?\\/\\\\\\\\]+#", $password)){
				echo 'Password must have at least 1 Special Character.';
		}
?>