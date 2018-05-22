<?php 
include('include\dbdata.php');
session_start();

$error = "";

//mysqli_real_escape_string används för att användaren inte ska kunna skriva in skadlig kod i inputfälten.
$email = $_SESSION['user'];
$kommentar = mysqli_real_escape_string($connection, $_POST["comment"]);

//Validate på server side.
$error = false;

// 1. trimma kommentaren och kolla så den inte är tom
if(empty(trim($kommentar))){
    echo "Vänligen skriv en kommentar";
    $error = true;
    header("Location: index.php");
}

// 2. Spara input i databasen om inga errors finns.
if(!$error) {

$queryOne = "INSERT INTO AllComments (Email, Kommentar) VALUES ('$email','$kommentar')";
$resultOne = $connection->query($queryOne);

$connection->close();

header('Location: views\displayComments.php');
}
?>


