<?php
    session_start();
    include '..\include\dbdata.php';
    include '..\include\functions.php';

if(isset($_SESSION['user'])){
    echo "<h1 class='display'>Kommentarer</h1>";
    fetchComment($connection);
}
else{
    header("Location: ..\index.php");
}
?>

<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\assets\css\header.css">
    </head>
     <body>
         <div class="displaylinks">
         <a href="..\commentpage.php">Skriv en ny kommentar</a>
         <a href="..\index.php">Startsida</a>
         </div>  
    </body>
</html>
