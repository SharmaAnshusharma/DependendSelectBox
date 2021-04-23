<?php
include('dbconnection.php');
$authors_id = $_POST['author_id'];
if(isset($authors_id))
{

	$query1 = mysqli_query($con,"SELECT * FROM `books` WHERE `Author_ID` ='$authors_id' ");	
	while($row1 = mysqli_fetch_array($query1))
	{
			?>
			<option value="<?php echo $row1['ID'];?>"><?php echo $row1['Book'];?></option>
			<?php
	}
}

?>