<?php
session_start();
include('include/dbdata.php');

if(!isset($_SESSION['user'])){
//Generera random string till saltet
function randString($length){
	$char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$string = substr(str_shuffle($char), 0, $length);
	return $string;
}
$randSalt = randString(10);


//Ta in user input
$email = mysqli_real_escape_string($connection, $_POST["email"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);

//Kolla ifall email redan är registrerad.
//Går in i DB, kollar om det finns någon email med samma namn.
//Isåfall, starta en session och redirecta till register-sidan
$checkUser = "SELECT * FROM Users WHERE email='$email'";
$res = mysqli_query($connection, $checkUser);
if(mysqli_num_rows($res) > 0){
    $_SESSION["EmailTaken"] = "Email already taken";
    header("Location: register.php");
		exit();
}

//Konkatenera salt och password.
$salt_pass = $randSalt.$password;

//Hasha
$hashedpass = md5($salt_pass);

//Validate på server side.
$error = false;
// 1. trimma email och kolla så den inte är tom
if(empty(trim($email))){
    echo "Vänligen fyll i din email";
    $error = true;
}
// 2. trimma kommentaren och kolla så den inte är tom
if(empty(trim($password))){
    echo "Vänligen skriv in ett lösenord";
    $error = true;
}
// 3. Validera emailen så den har @ och .
$regex = "/^\S+\@+\S+\.+\S+$/";

if(!preg_match($regex,$email)){
    echo "Vänligen ange en giltig epostadress";
    $error = true;
}

// 4. Spara input i databasen om inga errors finns.
if(!$error) {
$queryOne = "INSERT INTO Users (email, password, salt) VALUES ('$email', '$hashedpass','$randSalt')";
$resultOne = $connection->query($queryOne);
}
$connection->close();


header("Location: index.php");
}

//Om det finns någon inloggad, gå till index
else{
    header("Location: index.php");
}



?>
