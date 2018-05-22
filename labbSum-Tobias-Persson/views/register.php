<?php
session_start();
include_once('dbdata.php');

//Om ej inloggad, visa formulär för att registrera sig. Annars, redirecta till startsidan (index.php)
if(!isset($_SESSION['user'])){  ?>
<!DOCTYPE html>
<html>
  <head>
    <title> Registrering </title> 
    <meta charset="utf-8">
    <script src="assets\js\javas.js"></script>
  </head>
  <body>
      <a href="index.php">Startsida</a>
      <h1> Registrering </h1>
      <p> Fyll i fälten för att registrera dig</p>
          
      <form name="regform" method="POST" action="register_process.php" onsubmit="return validateRegForm()">

            <label for="email">Email</label>
            <input class="personalinfo" type="text" name="email" placeholder="Vänligen skriv din email-adress här...">

            <label for="password">Lösenord</label>
            <input class="personalinfo" type="password" name="password" placeholder="Vänligen välj ett lösenord här...">

            <input class="button" name="submitregister" type="submit" value="Registrera">
            <input class="button" type="reset" value="Töm fälten">    
       </form>     
       <!-- En knapp för att gå logga in (Redirectar till index) -->
       <form method="POST" action="index.php">
       <label for ="login">Redan registrerad?</label>
       <input class="button" type="submit" value="Logga in" >
       </form>

  </body>
</html>
<?php }
else{
  header("Location: index.php");
}
?>

