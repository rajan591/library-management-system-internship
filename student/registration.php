<?php
$title= 'registration';
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

?>

 <?php


      if(isset($_POST['submit']))
      {
        $err = [];
        if (isset($_POST['first']) && !empty($_POST['first'])) {
        $first =   validateUserData($_POST['first']); 
  } else {
    $err['first'] = 'Enter first name';
  }
   if (isset($_POST['last']) && !empty($_POST['last'])) {
    $last =   validateUserData($_POST['last']); 
  } else {
    $err['last'] = 'Enter last name';
  }
 //form validation for username
    if (isset($_POST['username']) && !empty($_POST['username']) && 
      trim($_POST['username']) != '')  {
      //get username and trim username : remove white space from start and end 
      $username =  validateUserData($_POST['username']);
      //check lenght of string
      if (strlen($username) >= 8) {     
      } else {
        $err['username'] =  'Username must be minimum 8 character';
      }
      
    } else {
      $err['username'] =  'Enter Username';
    }


    if (isset($_POST['password']) && !empty($_POST['password']) && 
      trim($_POST['password']) != '')  {
      //get username and trim username : remove white space from start and end 
      $password =  validateUserData($_POST['password']);
      //check lenght of string
      if (strlen($password) >= 8) {
        
      } else {
        $err['password'] =  'username must be minimum 8 character';
      }
      
    } else {
      $err['password'] =  'Enter username';
    }

 

  if (isset($_POST['roll']) && !empty($_POST['roll']) && is_numeric($_POST['roll'])) {
    $roll =  $_POST['roll']; 
  } else {
    $err['roll'] = 'Enter roll';
  }



if (isset($_POST['email']) && !empty($_POST['email']))  {

      $email =  validateUserData($_POST['email']);

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          $err['email'] =  'Enter Valid Email';
        } 
      } else {
        $err['email'] =  'Enter Email';
      }


        if (isset($_POST['phone']) && !empty($_POST['phone']) && is_numeric($_POST['phone']))  {
      $phone =  $_POST['phone'];
      if (strlen($phone) < 10 ) {
        $err['phone'] =  'Phone number must be of 10 digits';
      }
    } else {
      $err['phone'] =  'Enter phone';
    }
  



        if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
    //file size validation
    if ($_FILES['photo']['size'] < 1048576) {
      $types = ['image/jpeg','image/gif','image/png','image/jpg'];
      $image_name = uniqid() . '_' . $_FILES['photo']['name'];
      if (in_array($_FILES['photo']['type'], $types)) {
        //move file to your folder
        if(move_uploaded_file($_FILES['photo']['tmp_name'], 
          'images/' . $image_name)){
        }else {
          $err['photo'] = 'File Upload Failed!!';
        }
      } else {
        $err['photo'] = 'File type not allowed';
      }
    } else {
      $err['photo'] = 'File size exceed, 1 MB allowed';
    }
  }else {
    $err['photo'] = 'File Upload Error';
  }

if (count($err) == 0) {
          

          $sql= "insert into student (first,last,username,password,roll,email,contact,pic)values('$first','$last','$username','$password','$roll','$email','$phone','$image_name')";

          $db->query($sql);

        if ($db->affected_rows == 1 && $db->insert_id >0)         ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("registration failed.");
            </script>
          <?php

        }

      }
      

    ?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp &nbsp &nbsp  Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1>



      
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" 
          method="post" enctype="multipart/form-data">
        <div class="login">
          <input class="form-control" type="text" name="first" placeholder="First Name"> <br>
               <?php 
            if (isset($err['first'])) {
              echo $err['first'];
            }
            ?>
  

          <input class="form-control" type="text" name="last" placeholder="Last Name"> <br>
         
               <?php 
            if (isset($err['last'])) {
              echo $err['last'];
            }
            ?>
          <input class="form-control" type="text" id = "username"name="username" placeholder="Username"> <br>
          <span class="span_username"></span>

               <?php 
            if (isset($err['username'])) {
              echo $err['username'];
            }
            ?>
          <input class="form-control" type="password" id = "password" name="password" placeholder="Password"> <br>
          <span class="span_password"></span>


               <?php 
            if (isset($err['password'])) {
              echo $err['password'];
            }
            ?>
          <input class="form-control" type="text" id ="roll" name="roll" placeholder="Roll No" ><br>
          <span class="span_roll"></span>
          <?php 
            if (isset($err['roll'])) {
              echo $err['roll'];
            }
            ?>
          <input class="form-control" type="text" id = "email" name="email" placeholder="Email" ><br>
           <span class="span_email"></span>
               <?php 
            if (isset($err['email'])) {
              echo $err['email'];
            }
            ?>

          <input class="form-control" type="text" id ="phone" name="phone" placeholder="Phone No"><br>
          <span class="span_phone"></span>
        

               <?php 
            if (isset($err['phone'])) {
              echo $err['phone'];
            }
            ?>
          <input class="btn btn-default" style="display:block;width: 100%;height: 34px;"value="upload image" onclick="document.getElementById('image').click()"></input>
          <input type="file" style="display:none;" name="photo" class="form-control" id="image" placeholder="Enter image" >
      
        <?php 
            if (isset($err['photo'])) {
              echo $err['photo'];
            }
            ?><br>
          <input class="btn btn-danger" style="display:block;width: 100%;height: 34px;" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>

          
      </form>
     
    </div>
  </div>
</section>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#username').keyup(function(){
        var username = $('#username').val();
        // var username = $(this).val();
        if (username.length < 5) {
          $('.span_username').text('Username must be 5 character');
          $('.span_username').css({
            'color': '#ff0000'
          })
        } else {
          $('.span_username').text('');
          $.ajax({
            url:'checkstuusername.php',
            method:'post',
            data:{'uname': username},
            dataType:'text',
            success:function(resp){
              $('.span_username').text(resp);
            }
          });
        }
      })
      $('#password').keyup(function(){
        var password = $('#password').val();
        // var username = $(this).val();
        if (password.length < 5) {
          $('.span_password').text('password must be 5 character');
          $('.span_password').css({
            'color': '#ff0000'
          })
        } else {
          $('.span_password').text('');
          //ajax: if username is greater then equals to 8
          $.ajax({
            url:'checkstupassword.php',
            method:'post',
            data:{'password': password},
            dataType:'text',
            success:function(resp){
              $('.span_password').text(resp);
            }
          });
        }
      })
       $('#email').keyup(function(){
        var email = $('#email').val();
        // var username = $(this).val();
        if (email.length < 5) {
          $('.span_email').text('email must be 5 character');
          $('.span_email').css({
            'color': '#ff0000'
          })
        } else {
          $('.span_email').text('');
          $.ajax({
            url:'checkemail.php',
            method:'post',
            data:{'email': email},
            dataType:'text',
            success:function(resp){
              $('.span_email').text(resp);
            }
          });
        }
      })
      $('#roll').keyup(function(){
        var roll = $('#roll').val();
        if (roll.length < 5) {
          $('.span_roll').text('roll must be 5 character');
          $('.span_roll').css({
            'color': '#ff0000'
          })
        }else {
          $('.span_roll').text('');
        }
      })
        $('#phone').keyup(function(){
        var phone = $('#phone').val();
          if (phone.length < 10) {
          $('.span_phone').text('phone number must be 10 character');
          $('.span_phone').css({
            'color': '#ff0000'
          })
        }else {
          $('.span_phone').text('');
        }
      })
    });
  </script>
   

</body>
</html>