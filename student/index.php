
<!DOCTYPE html>
<html>
<head>
<title>myproject</title>
<link rel="stylesheet" href="index.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Bad+Script|Gloria+Hallelujah|Handlee|Marck+Script|Niconne|Red+Hat+Display&display=swap" rel="stylesheet">





<style type="text/css">  

.lefty{
	height: 400px;
	width: 300px;
	color: white;
	float: left;
	margin-top: 20px;
	font-family:cursive;
	text-align: center;
	color: blue;
	position: relative;
	margin-left: 10px;

}

.lefty mark{
background-color: #1c1a1a;
color: #2eeb28;

}
.i mark{
	background-color: #1c1a1a;
color: #2eeb28;



}
.lefty img{
	height: 90px;
	width: 90px;
	border-radius: 50%;
	margin-left: 20px;
	 transition: 0.70s;

}
.lefty img:hover{
	  transition:0.90s;
    -webkit-transform: rotate(-180deg);


}

.i{

	height: 500px;
	width: 400px;
	float: left;
	margin-left: 200px;
	font-family:  cursive;
	color: yellow;
	margin-top: 100px;
	
	text-align: center;

}

.i img{
	height: 250px;
	width: 250px;
	border-radius: 50%;
	opacity: 1;
	padding-left: 0px;
	float: center;
	margin-left: 30px;
	margin-top: 60px;
	 transition: 6s;

	/*border:2px solid #d73b31;*/
	



}

.i img:hover {
  transition: 1.5s;
  opacity: 0.0;
 
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  transform: rotate(360deg);
} 

.board{
	float: right;
	height: 600px;
	width: 400px;
	margin-top: 390px;
	margin-left:50x;
	margin-right: 0px;
	font-family: cursive;
	text-align: center;
	/*border:2px solid yellow;*/

}
.board img{
	height: 300px;
	width: 300px;


	border-radius: 50%;
	 transition: 2s;
	/*border:2px solid blue;*/



}
.board img:hover {
  transition: 2s;
  
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  transform: rotate(360deg);

} 

.board mark{
	background-color: #1c1a1a;
color: #2eeb28;



}





</style>
</head>

<body>


<div class="title">
<h1>Library Management System</h1><br>


<h3>PATAN MULTIPLE CAMPUS</h3>

</div>



		<?php
		if(isset($_SESSION['login_user']))
		{
			?>
				
					<ul>
						<li><a href="index.php" >HOME</a></li>
						<li><a href="view_books.php">BOOKS</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
					</ul>
				
			<?php
		}
		else
		{
			?>
						
							<ul>
								<li><a class="active" href="index.php">HOME &nbsp&nbsp&nbsp&nbsp</a></li>
								
								<li><a href="student_login.php">LOGIN &nbsp</a></li>
								<li><a href="registration.php">SIGN-UP &nbsp</a></li>
								<li><a href="feedback.php">FEEDBACK &nbsp</a></li>
							</ul>
						</nav>
		<?php
		}
			
		?>



</head>
<body>







</div>
<div class="box">




	<div class="lefty">
		<img src="images/sir.jpg">
		<div class="txt">
		<br>
		<mark >
	Welcome Warriors! I invite you to visit the University Library often, either via the Library website or by visiting in person.  The Library has a wealth of resources, print and electronic, and we strive to help you succeed academically.  Remember . . . start your assignments early and see the librarians for research assistance at your earliest convenience.  All of the Library faculty and staff are eager to help you make this semester the best ever academically! If you have any questions or concerns about library service.</mark>
	</div>
	</div>

<div class="i">

<img src="images/libaa.jpg">

<h3><mark>Patan Multiple Campus was established on 2011 B.S.(1954) before birth of Tribhuvan University. 'Patan Multiple College' in 1973 it is entered as constituent campus of Tribhuvan University in named Patan Multiple Campus.

Patan Multiple Campus is one of the most popular constitutent campus of Tribhuvan University. It occupied about 27,296 sq m area. The campus is situated at Patan Dhoka, Lalitpur of Nepal which is also known as city of Newar community.

Patan Multiple campus is a constituent campus of Tribhuvan University, it offers both Bachelors and Masters program in the faculties of Humanities and social sciences, Faculty of Management and Faculty of Science.</mark></h3>

</div>

<div class="board">
	<img src="images/notice.jpg">
	<h3><mark>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit.</mark></h3>
	
</div>


</div>







	<?php  

		include "footer.php";
	?>



</body>




</html>

