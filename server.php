<?php 
	session_start();
	//initialize variables
	
	$name = "";
	$address =  "";
	$email = "";
	$id = 0;
	$edit_state = false;

	//connect to database

	$db = mysqli_connect('localhost', 'root', '', 'curd');

	//if save button is clicked
	if (isset($_POST['save'])){
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$query = "INSERT INTO info (name, address, email) VALUES ('$name','$address','$email')";
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Address saved";
		header('location: index.php');
	}

	//update records
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];

		mysqli_query($db, "UPDATE info SET name='$name',address='$address',email='$email' WHERE id=$id");
		$_SESSION['msg'] = "Address updated";
		header('location: index.php');
	}

	//delete records
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['msg'] = "Address Deleted";
		header('location: index.php');
	}

	//retrive records
	$results = mysqli_query($db, "SELECT * FROM info")


 ?>