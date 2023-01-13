<?php 


//file system - part 1
// $quotes = readfile('read.txt');
// echo($quotes);

// $file = 'read.txt';
// if (file_exists($file)) {
// 	// //read file
// 	// echo readfile($file).'<br>';

// 	// //copy file
// 	// copy($file, 'quotes.txt');

// 	// //absolute patg
// 	// echo realpath($file).'<br>';

// 	// // file siza
// 	// echo filesize($file);

// 	// //rename file
// 	// rename($file, "test.txt");




// } else{
// 	echo "File is not exist.";
// }
// //make directory
// mkdir('Tete');

$file = 'quotes.txt';
//opening a file for reading
$handle = fopen($file, 'a+');//r+ a+ 

//read the file
// echo fread($handle, filesize($file));
// echo fread($handle, 112);

//read a single line
// echo fgets($handle);
// echo fgets($handle);

//read a single character
// echo fgetc($handle);
// echo fgetc($handle);

//writing to a file
fwrite($handle, "\n Everything popular is wrong.")

//close
fclose($handle);

//delete
// unlink($file);

 ?>