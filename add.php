<!DOCTYPE html>
<html lang="pl">
<head>
   <title>HTMLphp.pl</title>
   <meta charset="UTF-8">
<?php 
session_start(); // początek sesji
if (!isset($_SESSION['zalogowany'])){
   header('Location: index.php');
   exit();
}

if(isset($_POST['opis'])){
//udana walidacja
   $all_ok=true;

//sprawdzamy poprawność opisu
   $opis=$_POST['opis'];

//sprawdzam długość opisu
   if((strlen($opis) < 10) || (strlen($opis) > 2000)){
      $all_ok=false;
      $_SESSION['e_opis']="Opis musi posiadać minimum 10 znaków i mniej niż 2000";
   }

   $open = $_POST['open'];
   $close = $_POST['close'];
   $jezyk = $_POST['jezyk'];
   $poziom = $_POST['poziom'];

//sprawdzam znacznik
   if((strlen($open) < 1)){
      $all_ok=false;
      $_SESSION['e_open']="Uzupełnij znacznik";
   }

   $open = htmlentities($open, ENT_QUOTES, "UTF-8");
   $close = htmlentities($close, ENT_QUOTES, "UTF-8");
   require_once "connect.php";
   mysqli_report(MYSQLI_REPORT_STRICT);

   try{
      $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
      $polaczenie->set_charset("utf8");
      if ($polaczenie->connect_errno!=0){
         throw new Exception(mysqli_connect_errno());
      }
      else{
         $rezultat = $polaczenie->query("SELECT id_znacznik FROM znaczniki WHERE open='$open'");
         if (!$rezultat) throw new Exception($polaczenie->error);

         $ile_takich_znacznikow = $rezultat->num_rows;
         if($ile_takich_znacznikow>0){
            $all_ok=false;
            $_SESSION['e_open']="Podany znacznik już istnieje w bazie";
         }  

         $rezultat = $polaczenie->query("SELECT id_znacznik FROM znaczniki WHERE close='$close'");
         if (!$rezultat) throw new Exception($polaczenie->error);
         $ile_takich_znacznikow2 = $rezultat->num_rows;
         if($ile_takich_znacznikow2>0){
            $all_ok=false;
            $_SESSION['e_close']="Podany znacznik już istnieje w bazie";
         }  

         if($all_ok==true){
            if ($polaczenie->query("INSERT INTO znaczniki VALUES (NULL, '$jezyk', '$poziom', '$open', '$close', '$opis')")){
               $_SESSION['udanarejestracja']=true;
               echo'Dodano nowy znacznik';
            }
            else{
               throw new Exception($polaczenie->error);
            }
         }        
         $polaczenie->close();
      }
   }
   catch(Exception $e){
      echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności. Proszę o kontakt z administratorem</span>'; //Bład połaczenia
      echo '<br />Informacja developerska: ' . $e;
   }
}
?>
<meta name="Description" content="HTMLphp powstało z myśla o tych, którzy chcą nauczyć się tworzyć proste stony internetowe jak i dla tych którzy zamierząją stworzyć coś naprawdę wielkiego">
<meta name="Keywords" content="php, html, strony, css, kaskadowe, arkusze stylów">
<meta name="Author" content="Maciej Powallo, Sebastian Romańczukiewicz">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/ihover.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
</head>
<body id="page4">
   <div class="body6">
      <div class="body1" tyle="height:100%">
         <div class="main">
            <!-- header -->
            <header>
               <h1><a href="index.php" id="logo"></a></h1>
               <nav>
                  <ul id="top_nav">
                     <li><a href="index.php"><img class="find_us" src="images/main/icon_1.gif" alt="Home" title="HTMLphp"></a></li>
                     <li class="end"><a href="kontakt.php"><img class="find_us" src="images/main/icon_3.gif" alt="Kontakt" title="Kontakt"></a></li>
                  </ul>
               </nav>
               <nav>
                  <ul id="menu">
                     <li><a href="index.php">Strona główna</a></li>
                     <li><a href="aktualnosci.php">Aktualności</a></li>
                     <li><a href="kontakt.php">Kontakt</a></li>
                     <li><a href="html.podstawy.php">HTML<i class="arrow"></i></a>
                        <ul>
                           <li><a href="html.podstawy.php">Podstawy</a></li>
                           <li><a href="html.przydatne.php">Przydatne</a></li>
                           <li><a href="html.zaawansowane.php">Zaawansowane</a></li>
                        </ul>
                     </li>
                     <li><a href="#">PHP<i class="arrow"></i></a>
                        <ul>
                           <li><a href="php.podstawy.php">Podstawy</a></li>
                           <li><a href="php.przydatne.php">Przydatne</a></li>
                           <li><a href="php.zaawansowane.php">Zaawansowane</a></li>
                        </ul>
                     </li>
                     <li><a href="#">CSS<i class="arrow"></i></a>
                        <ul>
                           <li><a href="css.podstawy.php">Podstawy</a></li>
                           <li><a href="css.przydatne.php">Przydatne</a></li>
                           <li><a href="css.zaawansowane.php">Zaawansowane</a></li>
                        </ul>
                     </li>
                  </ul>
               </nav>
            </header>
            <!-- content -->
            <article id="content">
               <div class="wrap">   
               </div>
            </article>
         </div>
      </div>
   </div>
   <div class="body2">
      <div class="main">
         <article id="content2">
            <div class="wrapper">
               <!--lewa strona-->
               <section class="col4 pad_left">
                  <h2>Panel administracyjny</h2>
                  <form method="post">
                     <table style="margin-bottom:30px">
                        <tr>
                           <td style="padding:5px 5px;color:#220000;font-size:16px " >Wybierz język: </td>
                           <td>
                              <select id="form" name="jezyk">
                                 <option id="form" value="html">HTML</option>
                                 <option id="form" value="php">PHP</option>
                                 <option id="form" value="css">CSS</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td style="padding:5px 5px;color:#220000;font-size:16px " >Wybierz poziom: </td>
                           <td>
                              <select id="form" name="poziom">
                                 <option id="form" value="1">Podstawowy</option>
                                 <option id="form" value="2">Przydatne</option>
                                 <option id="form" value="3">Zaawansowane</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td style="padding:5px 5px;color:#220000;font-size:16px " >Znacznik otwierający: </td>
                           <td><input id="form" type="text" name="open"/>
                              <?php
                              if(isset($_SESSION['e_open'])){
                                 echo'<div class="error">'.$_SESSION['e_open'].'</div>';
                                 unset($_SESSION['e_open']);
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td style="padding:5px 5px;color:#220000;font-size:16px " >Znacznik zamykający: </td>
                           <td><input id="form" type="text" name="close"/>
                              <?php
                              if(isset($_SESSION['e_close'])){
                                 echo'<div class="error">'.$_SESSION['e_close'].'</div>';
                                 unset($_SESSION['e_close']);
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td style="padding:5px 5px; color:#220000; font-size:16px;">Opis: </td>
                           <td>
                              <textarea rows="4" cols="50" id="form" name="opis"></textarea>
                              <?php
                              if(isset($_SESSION['e_opis'])){
                                 echo'<div class="error">'.$_SESSION['e_opis'].'</div>';
                                 unset($_SESSION['e_opis']);
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="2">
                              <input class="button3" type="submit" value="Dodaj">
                              <input class="button3" type="reset" value="Wyczyść">
                           </td>
                        </tr>
                     </table>
                  </form>
               </section>
               <section>
                  <div class="col8">
                     <?php
                     echo '<h4 style="margin-left:10px"> Witaj '.$_SESSION['user'].' !</h4>';
                     echo '<h4 style="margin-left:10px"> Twój email to '.$_SESSION['email'].' </h4>';
                     echo '<form action="wyloguj.php" method="post"><input class="button3" type="submit" value="Wyloguj"></form>';
                     ?>
                  </div>
               </section>
            </div>
         </article>
      </div>
      </div>
      <div class="body3">
         <div class="body4">
            <div class="main">
               <!-- footer -->
               <footer>
                  <div class="main">
                     <article id="content2">
                        <div class="wrapper">
                           <section class="col6">
                              <h4 style="color:#000">Kontakt</h4>
                              <ul class="address">
                                 <li>HTMLphp.pl</li>
                                 <li><a href="mailto:">biuro@htmlphp.pl</a></li>
                              </ul>
                           </section>
                           <section class="col6 pad_left" style="margin-left:100px; width:160px">
                              <h4 style="color:#000">Znajdź nas</h4>
                              <ul id="icons">
                                 <li><a href=""><img class="find_us" src="images/main/facebook.png" alt="facebook"></a></li>
                                 <li><a href=""><img class="find_us" src="images/main/youtube.png" alt="youtube"></a></li>
                                 <li><a href=""><img class="find_us"src="images/main/google.png" alt="google"></a></li>
                              </ul>
                           </section>
                        </div>         
                     </article>
                  </div>
                  <center>&#169 2016 HTMLphp by &#87;&#101;&#98;&#77;&#97;&#110;&#105;&#101;&#107;</center>
               </footer>
            </div>
         </div>
      </div>
      <script type="text/javascript"> Cufon.now(); </script>
      <a href="#" title="Do góry!" id="scroll-to-top"><img src="images/main/scrollup.png" alt="strzałka do góry" /></a>
      <script>
         $(function(){
            var stt_is_shown = false;
            $(window).scroll(function(){
               var win_height = 300;
               var scroll_top = $(document).scrollTop(); 
               if (scroll_top > win_height && !stt_is_shown) {
                  stt_is_shown = true;
                  $("#scroll-to-top").fadeIn();
               } else if (scroll_top < win_height && stt_is_shown) {
                  stt_is_shown = false;
                  $("#scroll-to-top").fadeOut();
               }
            });
            $("#scroll-to-top").click(function(e){
               e.preventDefault();
               $('html, body').animate({scrollTop:0}, 1500);
            });
         });
      </script>
   </body>
   </html>