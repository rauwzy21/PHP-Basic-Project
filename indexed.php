<?php 


include 'config/db_connect.php';

//write query for all pizzas
$sql = 'SELECT id,email,title,ingredients FROM pizzas ORDER BY created_at';

//make query & get result
$result = mysqli_query($conn, $sql);

//fetch resulting rows as an array 
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
// msqli_free_result($result);

//close connection
mysqli_close($conn);

//print in array
// print_r($pizzas);


explode(',', $pizzas[0]['ingredients']);

?>

<!DOCTYPE html>
<html>

<?php include 'templates/header.php'; ?>

<h4 class="center black-text">Pizzas!</h4>

<div class="container">
	<div class="row">
		
		<?php foreach ($pizzas as $pizza): ?>

			<div class="col s6 md3">
				<div class="card z-depth-0">
				<img src="img/pizza.svg" class="pizza">
					<div class="card-content center">
						<h6 class="castro"><?php echo htmlspecialchars($pizza['title']); ?></h6>
						<ul>
							<?php foreach (explode(',', $pizza['ingredients']) as $ing) { ?>
								<li type="block">
									<?php echo htmlspecialchars($ing); ?>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div class="card-action right-align">
						<a class="center brand-text" href="details.php?id=<?php echo($pizza['id']); ?>">more info!</a>
					</div>
				</div>
			</div>

		<?php  endforeach; ?>

<!-- contol flow syntax
<?php if (count($pizzas) >= 3) { ?>
		<p>hello</p>
	<?php } else{ ?>
		<p>world</p>
<?php } ?>
another syntax
<?php if (count($pizzas) >= 3) : ?>
		<p>hello</p>
	<?php else: ?>
		<p>world</p>
<?php endif; ?>
 -->
	</div>
</div>

<?php include('templates/footer.php'); ?>

</html>
