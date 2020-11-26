<?php ob_start(); 

$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="phonebook";

foreach ($db as $key => $value) {
	
define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$query = "SET NAMES utf8";
mysqli_query($connection, $query);

?>

<?php

$id=0;
$update = false;
$firstname='';
$lastname='';
$phonenumber='';

?>

<?php 

if (isset($_POST['save'])) {

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];

$query = "INSERT INTO users (firstname, lastname, phonenumber) VALUES ('{$firstname}','{$lastname}','{$phonenumber}')";
$create_record = mysqli_query($connection,$query) or die (mysqli_error($connection));

if($create_record) {

	if(!empty($_POST['firstname'] && !empty($_POST['lastname'] && !empty($_POST['phonenumber'])))) {

		echo "Sucssesfuly added to contacts";

	} else {

		echo "Required field";
} 

}

header("Location:index.php");

}

if (isset($_GET['delete'])) {

$id = $_GET['delete'];

$query = "DELETE FROM users WHERE id='$id' ";
$delete_record = mysqli_query($connection,$query) or die (mysqli_error($connection));

header("Location:index.php");

} 

if (isset($_GET['edit'])) {

$id = $_GET['edit'];
$update = true;
$query = "SELECT * FROM users WHERE id='$id' ";
$select_user = mysqli_query($connection,$query) or die (mysqli_error($connection));

while ($row = mysqli_fetch_assoc($select_user))	{

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$phonenumber = $row['phonenumber'];

}

}

if(isset($_POST['update'])){
	$id = $_POST['id'];

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phonenumber = $_POST['phonenumber'];

$query = "UPDATE users SET firstname='$firstname', lastname='$lastname', phonenumber='$phonenumber' WHERE id='$id' ";
$update_user = mysqli_query($connection,$query) or die (mysqli_error($connection));


header("Location:index.php");

}

?>