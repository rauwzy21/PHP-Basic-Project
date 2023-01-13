<?php 


include 'config/db_connect.php';

if(isset($_POST['delete'])){

	$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

	$sql = "DELETE FROM pizzas WHERE id=$id_to_delete";

	if(mysqli_query($conn, $sql)){
		//success
		header('Location: indexed.php');
	}else{
		//failure
		echo "query error: ".mysqli_error($conn);
	}
}

//check get request id parameter
if(isset($_GET['id'])){
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	//make a sql query
	$sql = "SELECT * FROM pizzas WHERE id = $id";
	//get query result
	$result = mysqli_query($conn, $sql);
	//fetch result in array format (only one reslut)
	$pizza = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($conn);
	// print_r($pizza); 
}

 ?>
 <!DOCTYPE html>
 <html>

	<?php include 'templates/header.php'; ?>

	<div class="container center">
		<?php if($pizza): ?>
			<h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
			<h5>Ingredients: </h5>
			<p><?php echo htmlspecialchars($pizza['ingredients']) ?></p>
			<p>Created by: <?php echo htmlspecialchars($pizza['email']);?></p>
			<p>Created at: <?php echo date($pizza['created_at']); ?></p>

			<!-- Delete form -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
				<input type="submit" name="delete" class="btn brand z-depth-0" value="delete">
			</form>
			<?php else: ?>
				<h4 style="color: red">No such pizza exist.</h4>
		<?php endif; ?>
	</div>

	<?php include('templates/footer.php'); ?>

 </html>