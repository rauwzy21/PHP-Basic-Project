<?php 

include 'config/db_connect.php';

//isset checks whether a certain variable if you like on value has been set . If any data has been sent to us via get method .
//$_GET - global array, associative array 
// if (isset($_GET['submit'])) {
// 	echo $_GET['email'];
// 	echo $_GET['tiltle'];
// 	echo $_GET['ingredients'];
// }
$title=$email=$ingredients='';
$errors = array('email' =>'' ,'title' =>'' ,'ingredients' =>''  );
if (isset($_POST['submit'])) {

	//cross site scripting attacks or foreshore xxs - occur anywhere a website gets data from end user and to get send some JS codes to the server and when comes back to the browser that code it can execute. 

	// echo htmlspecialchars($_POST['email']);
	// echo htmlspecialchars($_POST['tiltle']);
	// echo htmlspecialchars($_POST['ingredients']);\

	//check email
	if (empty($_POST['email'])) {
		$errors['email'] = "An email is required.";
	}
	else{
		// echo htmlspecialchars($_POST['email']);
		$email = $_POST['email'];
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "Email must be valid email address.";
		};
	}
	//check pizza title
	if (empty($_POST['title'])) {
		$errors['title'] = "A title is required.";
	}
	else{
		// echo htmlspecialchars($_POST['title']);
		$title =$_POST['title'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
			$errors['title'] = "Title must be letters and space.";
		};
	}
	//check ingredients
	if (empty($_POST['ingredients'])) {
		$errors['ingredients'] = "An ingredients is required.";
	}
	else{
		// echo htmlspecialchars($_POST['ingredients']);
		$ingredients =$_POST['ingredients'];
		if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
			$errors['ingredients'] = "ingredients must be a comma seperated list.";
		};
	}
	if(array_filter($errors)){
		// echo "There is an error in the form. Please fill up again.";
	}else{
		
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

		//create sql
		$sql = "INSERT INTO pizzas(title,email,ingredients) VALUES ('$title','$email','$ingredients')";

		//save to database and check
		if(mysqli_query($conn, $sql)){
			//success
			// echo "Form is valid.";\
			header('Location: indexed.php');
		}else{
			//error
			echo "query error: ". mysqli_error($conn);
		}
	}
}//end of POST check



?>

<!DOCTYPE html>
<html>

<?php include 'templates/header.php'; ?>

<section class="container black-text">
	<h4 class="center">
		Add Your Pizza
	</h4>
	<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
		<label>Your Email:</label>
		<input type="text" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
		<div class="red-text"><?php echo htmlspecialchars($errors['email']) ?></div>
		<label>Pizza Title:</label>
		<input type="text" name="title" placeholder="Enter your pizza tiltle" value="<?php echo $title; ?>">
		<div class="red-text"><?php echo htmlspecialchars($errors['title']) ?></div>
		<label>Ingredients (comma seperated):</label>
		<input type="text" name="ingredients" placeholder="Enter your ingredients" value="<?php echo $ingredients; ?>">
		<div class="red-text"><?php echo htmlspecialchars($errors['ingredients']); ?></div>
		<div class="center">
			<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
		</div>
	</form>
</section>

<?php include('templates/footer.php'); ?>

</html>