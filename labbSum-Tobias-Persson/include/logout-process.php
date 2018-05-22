<?php
session_start();
include_once('dbdata.php');


//Avsluta session och gå till startsidan
session_destroy();
header('Location: ..\index.php');


?>