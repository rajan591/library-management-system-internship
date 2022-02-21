<?php 
if(isset($_COOKIE['remember'])&& $_COOKIE['remember']==1){
  session_start();
  $_SESSION['login_username']=$_COOKIE['login_username'];
  header('location:profile.php');
}
 ?>
<?php
$title='login page';
  include "connection.php";
  include "navbar.php";
function validateUserData($value) {
  //remove space
  $value = trim($value);
  //remove back slash from string
  $value = stripslashes($value);
  //encode special character
  $value = htmlspecialchars($value);
  //escape special character before inserting into database table

  //return value
  return $value;
}
    if(isset($_POST['submit']))
    {
           $err = [];
    if (isset($_POST['username']) && !empty($_POST['username'])) {
      $username =   validateUserData($_POST['username']);

    } else {
      $err['username']  = "Enter Username";
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
      $password =   validateUserData($_POST['password']);
    } else {
      $err['password'] =  "Enter password";
    }

    
    if (count($err) == 0) {
    
      require_once "connection.php";

      //query to select data form database with user provided username and password
      $sql = "select * from student where username='$username' and password='$password'";
      //execute
      $result =$db->query($sql);

      if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        //print_r($user);
        // session_start();
        //store username into session
        $_SESSION['login_user'] = $_POST['username']; 
        $_SESSION['pic']= $user['pic'];
        header("location:profile.php");
      } else {
        $msg =  "Login failed";
      }
    }
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>
<section>
  <div class="log_img">
   <br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
        <form  name="login" action="" method="post">  
        <?php if(isset($_GET['msg']) && $_GET['msg'] == 1){ ?>
      <p class="err_message">please login to access dashboard</p>
    <?php }  ?>

    <?php if(isset($msg)){ ?>
      <p class="alert alert-danger"><?php echo $msg ?></p>
    <?php }  ?>
        <form action = " " method="post">
        <div class="login">
          <input class="form-control" type="text" id = "username" name="username" placeholder="Username" > <br>
          <span class="span_username"></span>
           <?php if (isset($err['username'])) { ?>
             <span class="text-danger"><?php echo $err['username']; ?></span>
           <?php } ?>
          <input class="form-control" type="password" name="password" placeholder="Password" > <br>
          <span class="span_password"></span>
           <?php if (isset($err['password'])) { ?>
             <span class="text-danger"><?php echo $err['password']; ?></span>
           <?php } ?><br>
           <!-- Default unchecked -->
       
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      </form>      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:yellow;text-decoration: none;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp  
        New to this website?<a style="color: yellow; text-decoration: none;" href="registration.html">&nbspSign Up</a>
      </p>
    </form>
    </div>
  </div>
</section>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
    // asynchronus javascript and xml

    $(document).ready(function(){
      $('#username').keyup(function(){
        var username = $('#username').val();
        // var username = $(this).val();
        if (username.length < 5) {
          $('.span_username').text('Username must be 5 character');
          $('.span_username').css({
            'color': '#ff0000'
          })
        }
      })
    });
  </script>
</body>
</html>