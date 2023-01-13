<?php 

//ternary operator
// $score =50;
// if ($score > 40) {
// 	echo "High score";
// }else{
// 	echo "Low score";
// }
// $val = $score > 40 ? "High score" : "Low score";
// echo "Score : {$val}";


//superglobals
// $_GET['name'],$_POST['name']
// echo $_SERVER['SERVER_NAME'] . '<br>';
// echo $_SERVER['REQUEST_METHOD'] . '<br>';
// echo $_SERVER['SCRIPT_FILENAME'] . '<br>';
// echo $_SERVER['PHP_SELF'] . '<br>';

//sessions
// if(isset($_POST['submit'])){

// 	//cookies for gender
// 	setcookie('gender',$_POST['gender'],  time() + 86400); //86400sec in a day
// 	session_start();
// 	$_SESSION['name'] = $_POST['name'];
// 	// echo($_SESSION['name']);
// 	header('Location: indexed.php');
// }

//cookies

//classes
class User {

	private $email;
	private $name;


	//constructor
	public function __construct($name, $email){
		// $this->email = 'mario@comm.in';
		// $this->name = 'mario';

		$this->email = $email;
		$this->name = $name;
	}

	public function login(){
		// echo "user logged in ";
		echo $this->name . " user logged in ";
	}

	//getter
	public function getName(){
		return $this->name;

	}

	//setter
	public function setName($name){
		if(is_string($name) && strlen($name) > 1){
			$this->name = $name;
			return "name is updated to $name ";
		}else{
			return "not a valid name";
		}
	}

}
//object
// $userone = new User();

// $userone->login();
// echo $userone->name;
$usertwo = new User('Yoshi', 'Yoshi@1.com');
// echo $usertwo->name;
// echo $usertwo->email;
//  
// echo $usertwo->getName();
echo $usertwo->setName(50);


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>PHP TUTS</title>
 </head>
 <body>
 
 	<!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
 		<input type="text" name="name" >
 		<select name="gender">
 			<option value="male">Male</option>
 			<option value="female">Female</option>
 			<option value="other">Others</option>
 		</select>
 		<input type="submit" name="submit" value="submit">
 	</form> -->

 </body>
 </html>