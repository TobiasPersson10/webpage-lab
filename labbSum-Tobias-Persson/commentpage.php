<?php
session_start();
include('include/dbdata.php');



// Om ingen session finns, återgå till index (för att inte kunna söka på sidan via URL om man ej är inloggad)
if(isset($_SESSION['user'])):  ?>

<!DOCTYPE html>
<html>
  <head>
    <title> Kommentatorsforumuläret </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\header.css">

  <script src="assets\js\javas.js"></script>
  </head>
  <body>
        <a href="index.php">Startsida</a>
        <a href="include\logout-process.php">Logga ut</a>
      <div class="loginForm">
      <h1>Kommentatorn</h1>
      <p>Här kan du kommentera dina tankar.</p>
      <div class="commentform">
      <form name="form" method="POST" action="save.php" onsubmit="return validateCommentForm()">

            <textarea class="textbox" name="comment" placeholder="Vänligen skriv en kommentar här..."></textarea>

            <input class="buttons" type="submit" name="submitbtn" value="Kommentera">
            <input class="buttons" type="reset" value="Töm fälten">
       </form>
       </div>
       </div>

  </body>
  </html>



<?php

else:
    header("Location: index.php");
endif; ?>
