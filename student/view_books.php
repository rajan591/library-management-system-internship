<?php 
$title = 'View Books';
require "navbar.php";
		$date = date('Y-m-d H:i:s');
?>
 	
<?php 
print_r($_GET);	
	if (!isset($_GET['bid'])) {
	 	header('location:books.php');
	 }else {
		$id = $_GET['bid'];
		$bname = $_GET['bname'];
	 print_r($id);
	 $bname = $_GET['bname'];
	  print_r($bname);
	  }
	require "connection.php";
	$sql = "select * from books join department on books.DepartmentID = department.DepartmentID where bid = $id;";
	$result = $db->query($sql);
	$book = $result->fetch_assoc();
 ?>

 <?php 
 		if(isset($_POST['btnrequest'])){
			if(isset($_SESSION['login_user']))
			{
				echo $sql ="INSERT INTO issue_book Values('$_SESSION[login_user]', '$id', '$bname', '$date', '','','');" ;
				$db ->query($sql);
			if ($db->affected_rows == 1) {
			$success =  "Insert Success";
		} else {
			$failed  =  "Insert Failed";
		}
			?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
				
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		}
		

 	?>
 <div class="container">
 	
 		<div class="card mt-5">
 		<div class="card-header">
 			<?php echo "<h2>BOOKS DETAILS</h2>" ?>
 					<?php require_once "alertmessage.php"; ?>
 		</div>
 		<div class="card-body">
 			<form action="<?php echo $_SERVER['PHP_SELF']?>?bid=<?php echo $id ?>&&bname=<?php echo $bname?>" 
					method="post">
 			<div class="row">
 			<div class="col-md-12">
 			<div class="table-responsive">
 			<table class="table table-bordered table-hover table-striped ">
 				<tr>
 					<th>Name</th>
 					<td><?php echo $book['name'] ?></td>
 				</tr>
 				<tr>
 					<th>Author</th>
 					<td><?php echo $book['authors'] ?></td>
 				</tr>
 				<tr>
 					<th>Edition</th>
 					<td><?php echo $book['edition'] ?></td>
 				</tr>
 				<tr>
 					<th>Status</th>
 					<td>
 						<?php if ($book['status'] == 1) { ?>
 							<span class="text-success">Available</span>
 						<?php } else { ?>
 							<span class="text-danger">Unavailable</span>
 						<?php } ?></td>
 				</tr>
 				<tr>
 					<th>Quantity</th>
 					<td><?php echo $book['quantity'] ?></td>
 				</tr>
 				<tr>
 					<th>Department</th>
 					<td><?php echo $book['DepartmentName'] ?></td>
 				</tr>
 				<br> <br>
 			</table>
 			<input type="submit" name="btnrequest" class="btn btn-success" value="Request Book">
 			</div>
 		</div>	 		
 		</div>
 	</form>
 		</div>
 		</div>
 		<div class="card-footer"></div>
 	</div>