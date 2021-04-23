<?php
include('dbconnection.php');
$query = mysqli_query($con,"SELECT * FROM `authors`");
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Dependent Select Box</title>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$("#authors").change(function(){
			var author_id = $("#authors").val();
			
			dataString = {author_id:author_id},
			$.ajax({
				url:'data.php',
				method: 'POST',
				data:dataString,
				success:function(books){
					console.log(books);
					$("#books").html(books);
				}
			})
			});
		});


</script>
<body>
	<div class="container">
		<h1 class="text-center"> Dependent Dropdown with php and Ajax </h1>
		<br><br>
		<hr>
		<form method="post">
		<select name="authors" id="authors" selected="" class="form-control">
			<option>Select Authors</option>
			<?php
			while($row = mysqli_fetch_array($query))
			{	$id = $row['ID'];

				?>
				<option id="<?php echo $id; ?>" value="<?php echo $row['ID'];?>"><?php echo$row['author'];?></option>
				<?php
			}

			?>

		</select>
		<br><br>
			<select name="books" id="books" class="form-control">
			<option></option>
			
		</select>	
	</form>
	</div>
	

</body>
</html>