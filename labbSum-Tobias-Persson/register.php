<?php
session_start();
include('include/dbdata.php');


//Om ej inloggad, visa formulär för att registrera sig. Annars, redirecta till startsidan (index.php)
if(!isset($_SESSION['user'])){  ?>
<!DOCTYPE html>
<html>
  <head>
    <title> Registrering </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\header.css">
    <script src="assets\js\javas.js"></script>
  </head>
  <body>
      <a href="index.php">Startsida</a>


      <?php
      //Om email redan finns aktiveras denna session och skriver ut ett felmeddelande.
      //Sessionen skapas i register-process
      //Sedan avslutas sessionen för att undvika felmeddelandet.
      if(isset($_SESSION['EmailTaken'])){
      echo "<p class='errormsg--register'>".$_SESSION['EmailTaken']."</p>";
      session_destroy();
      }
      ?>

      <div class="loginForm">
      <h1> Registrering </h1>
      <p> Fyll i fälten för att registrera dig</p>

      <form name="regform" method="POST" action="register-process.php" onsubmit="return validateRegForm()">
            <input class="textbox" type="text" name="email" placeholder="Vänligen skriv din email-adress här...">
            <input class="textbox" type="password" name="password" placeholder="Vänligen välj ett lösenord här...">
            <input class="buttons" name="submitregister" type="submit" value="Registrera">
            <input class="buttons" type="reset" value="Töm fälten">
       </form>
       <!-- En knapp för att gå logga in (Redirectar till index) -->

       <form method="POST" action="index.php">
       <p>Redan registrerad?</p>
       <button class="buttons" type="submit" name="submitlogin">Logga in</button>
       </form>


  </body>
</html>
<?php }
else{
  header("Location: index.php");
}
?>
