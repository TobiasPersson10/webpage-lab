<?php
session_start();
include('include/dbdata.php');

//Om ingen är inloggad, visa formuläret för att logga in och registrera sig. Annars visa bara "logga ut" och "Gå till kommentarssidan"
if(!isset($_SESSION['user'])): ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Startsida </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets\css\header.css">
        <script src="assets\js\javas.js"></script>
    </head>
    <body>
<?php
if(isset($_SESSION['InvalidInput'])){
    echo "<p class='errormsg--index'>".$_SESSION['InvalidInput']."</p>";
    session_destroy();
    }
?>
    <div class="loginForm">
        <h1> Kommentatorn </h1>
        <form name="loginform" method="POST" action="login.php" onsubmit="return validateLoginForm()">
            <input class="textbox" type="text" name="email" placeholder="Email">
            <input class="textbox" type="password" name="password" placeholder="Lösenord">
            <button class="buttons" type="submit" name="submitlogin">Logga in</button>
            <div class="registerlink">
            <a href="register.php">Registrera dig</a>
           </div>
        </form>
    </div>
    </body>
</html>

<?php
else:
?>

<html>
<head>
        <title> Startsida </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets\css\header.css">
</head>
<body>
            <div class="links">
            <a href="commentpage.php">Skriv en kommentar</a>
            <a href="include\logout-process.php">Logga ut</a>
            </div>
</body>
</html>
<?php endif;
?>
