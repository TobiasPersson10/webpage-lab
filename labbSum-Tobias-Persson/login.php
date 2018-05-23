<?php

//Kolla om man kommit hit som inloggad (via URL) eller via loginknappen. Om inte, skicka tillbaka till commentpage.php (se längst ner)
if(isset($_POST['submitlogin'])){
session_start();

include('include/dbdata.php');


  //Spara input som variablar, skydda från SQL-injections.
  $email = mysqli_real_escape_string($connection, $_POST["email"]);
  $password = mysqli_real_escape_string($connection, $_POST["password"]);


  //Validate på server side.
  $error = false;
  // 2. trimma email och kolla så den inte är tom
  if(empty(trim($email))){
      echo "Vänligen fyll i din email";
      $error = true;
      header("Location: index.php");
  }
  // 3. trimma kommentaren och kolla så den inte är tom
  if(empty(trim($password))){
      echo "Vänligen skriv in ett lösenord";
      $error = true;
      header("Location: index.php");
  }
  // 4. Validera emailen så den har @ och .
  $regex = "/\S+\@+\S+\.+\S+/";

  if(!preg_match($regex,$email)){
      echo "Vänligen ange en giltig epostadress";
      $error = true;
      header("Location: index.php");
  }
  // 5. Spara input i databasen om inga errors finns.
  if(!$error) {




  //Hämta kolumnen salt från databasen i den rad som stämmer överrens med input; email.
  $fetchSalt = "SELECT salt FROM Users WHERE email = '$email'";
  $query = mysqli_query($connection,$fetchSalt);

  //Konkatenera det ifyllda lösenordet med saltet som motsvarar den ifyllda emailen
  $concat = "";
  if ($row = mysqli_fetch_assoc($query)){
    $concat = $row['salt'].$password;
  }
  else{
    $_SESSION["InvalidInput"] = "Invalid email";
    header("Location: index.php");
  }

  //Hasha lösenordet med motsvarande salt
  $hashed_salt = md5($concat);

  //Jämför det ifyllda hash(lösenord+salt) med password-kolumnen i databasen
  $hashedPass = "SELECT password FROM Users WHERE email = '$email'";
  $queryTwo = mysqli_query($connection,$hashedPass);

  if ($rowTwo = mysqli_fetch_assoc($queryTwo)){
    if($rowTwo['password'] == $hashed_salt){
      $_SESSION['user'] = $email;
      header('Location: commentpage.php');
    }
    else{
    $_SESSION["InvalidInput"] = "Invalid password";
    header("Location: index.php");

    }
  }

  $connection->close();
  }//Stänger servervalideringen.
}
 else{
   header("Location: index.php");
}


?>
