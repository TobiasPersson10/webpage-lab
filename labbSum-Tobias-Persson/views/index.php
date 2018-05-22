<?php
session_start();
include_once('dbdata.php');

?>

<html>
<head>
<script src="assets\js\javas.js"></script>
</head>
<body>
<h1> Hemsida </h1>

<?php
//Om ingen är inloggad, visa formuläret för att logga in och registrera sig. Annars visa bara "logga ut" och "Gå till kommentarssidan"
if(!isset($_SESSION['user'])){
echo '<form name="loginform" method="POST" action="login.php" onsubmit="return validateLoginForm()">
            
            <input class="personalinfo" type="text" name="email" placeholder="Email">
            <input class="personalinfo" type="password" name="password" placeholder="Lösenord">

            <button type="submit" name="submitlogin">Logga in</button><br><br>
            
            <a href="register.php">Registrera dig</a><br><br>
</form>';
}
else{
    echo '<a href="commentpage.php">Gå till kommentarssidan</a><br><br>
          <a href="logout-process.php">Logga ut</a>';
}
?>

</body>
</html>