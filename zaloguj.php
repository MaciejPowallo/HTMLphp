<?php
session_start(); // początek sesji

if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))){
   header('Location: index.php');
   exit();
}

require_once "dbconnect.php";
$stmt = @new mysqli($host, $db_user, $db_password, $db_name );

if($stmt->connect_errno!=0){
   echo "Error: ".$stmt->connect_errno; // błąd połaczenia
}
else{
   $login = $_POST['login'];
   $password = $_POST['haslo'];  
   $login = htmlentities($login, ENT_QUOTES, "UTF-8"); // przepuszczenie przez encje htmla

   if($result = @$stmt->query(sprintf("SELECT * FROM uzytkownicy WHERE login='%s'",  //sprawdzenie czy nie ma błedu
   mysqli_real_escape_string($stmt,$login)))){
      $user_count = $result->num_rows;
      if($user_count > 0){
         $wiersz = $result->fetch_assoc(); //tablica ze skojarzonymi 
         if(password_verify($password, $wiersz['haslo']))
         {
            $_SESSION['zalogowany'] = true; // informacja o zalogowaniu
            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['user'] = $wiersz['login'];
            $_SESSION['email'] = $wiersz['email']; 
            unset($_SESSION['blad']);
            $result->free(); // wyczyszczenie pamięci
            header('Location: add.php'); // odesłanie zmiennych do add.php
         }
         else{
            $_SESSION['blad'] = '<p style="color:red">Nieprawidłowe hasło!</p>';
            header('Location: index.php');
         }
      }
      else{
         $_SESSION['blad'] = '<p style="color:red">Brak użytkownika o podanym loginie!</p>';
         header('Location: index.php');
      }
   }
   $stmt->close();
}
?>
