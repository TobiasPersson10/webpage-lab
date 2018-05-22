<?php
session_start();
include_once('dbdata.php');

// Om ingen session finns, återgå till index (för att inte kunna söka på sidan via URL om man ej är inloggad)
if(isset($_SESSION['user'])){  ?>

<!DOCTYPE html>
<html>
  <head>
    <title> Kommentatorsforumuläret </title> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="assets\css\commentSection.css">
    <script src="assets\js\javas.js"></script>
  </head>
  <body>
        <a href="index.php">Startsida</a>
        <a href="logout-process.php">Logga ut</a>
      <h1> Kommentatorsfältet </h1>
      <p> Här kan du kommentera dina tankar. För att kommentera 
          behöver du fylla i ditt namn och din mailadress</p>
          
      <form name="form" method="POST" action="save.php" onsubmit="return validateCommentForm()">

            <label for="firstname">Förnamn</label>
            <input class="personalinfo" type="text" name="firstname" placeholder="Vänligen skriv ditt förnamn här...">

            <label for="email">Mailadress</label>
            <input class="personalinfo" type="text" name="email" placeholder="Vänligen skriv din email-adress här...">

            <label for="comment">Kommentar</label>
            <textarea name="comment" placeholder="Vänligen skriv en kommentar här..."></textarea>

            <input class="button" type="submit" name="submitbtn" value="Kommentera">
            <input class="button" type="reset" value="Töm fälten">
       </form>     

  </body>
  </html>  
       
<?php } 
else{
  header("Location: index.php");
}
    //Skriv ut alla kommentarer
    $queryTwo = "SELECT * FROM AllComments";
    $resultTwo = $connection->query($queryTwo);

    while ($row = mysqli_fetch_assoc($resultTwo)){
    echo '<span class="box">';

    echo '<span class="input">';
    echo "Namn: ".$row["Name"];
    '</span>';

    echo '<span class="input">';
    echo "Email: ".$row["Email"];
    '</span';

    echo '<span class="input">';
    echo "Kommentar: ".$row["Kommentar"];
    '</span>';

    echo '</span>';
}
