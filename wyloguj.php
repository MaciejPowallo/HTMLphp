<?php
session_start();
if (!isset($_SESSION['zalogowany'])){
   header('Location: index.php');
   exit();
}
else{
   $_SESSION = array();// Usuń wszystkie zmienne sesyjne 
   if (isset($_COOKIE[session_name()])){
      setcookie(session_name(), '', time()-42000, '/'); // Uwaga: to usunie sesję, nie tylko dane sesji
   }
   session_destroy();
   header('Location: index.php');
}
?>