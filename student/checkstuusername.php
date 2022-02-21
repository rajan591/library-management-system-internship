<?php 
$username = $_POST['uname'];
require_once "lib_connection.php";
$sql = "select username from student where username='$username'";
$result = $connect->query($sql);
if ($result->num_rows == 1) {
	echo "Username already taken";
}
if (preg_match("#[\\~\\`\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\{\\}\\[\\]\\|\\:\\;\\&lt;\\&gt;\\.\\?\\/\\\\\\\\]+#", $username)){
				echo "Username doesn't contains special characters!!";
		}
?>