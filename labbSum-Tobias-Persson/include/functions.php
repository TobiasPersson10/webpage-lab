<?php
include('dbdata.php');

//Funktion för att visa kommentarer
function fetchComment($connection){
    $sql = "SELECT * FROM AllComments";
    $result = $connection->query($sql);
    while($row = $result->fetch_assoc()){
    echo "<div class='comments'>";
    echo $row['Email']."<br>";
    echo $row['Kommentar']."<br><br>";
    echo "</div>";
    }
}


?>
