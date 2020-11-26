<?php include "db.php" ?>

<?php 

if (isset($_POST['submit'])) {

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

}

header("Location:index.php");

?>