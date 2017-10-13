<?php
session_start(); 

if(isset($_POST['email'])){
   $all_ok=true;
   $login=$_POST['login'];

   //sprawdzam długość loginu
   if((strlen($login) < 3) || (strlen($login) > 20)){
      $all_ok=false;
      $_SESSION['e_login']="Login musi posidać od 3 do 20 zanków";
   }

   // sprawdzam poprawność wprowadzonych znaków
   if (ctype_alnum($login)==false){
      $all_ok=false;
      $_SESSION['e_login']="Login może składać się tylko z liter i cyfr (bez polskich znaków)";
   }

   $email=$_POST['email'];
   $good_email=filter_var($email, FILTER_SANITIZE_EMAIL); // usuwamy znaki niedozwolone

   //sprawdzamy poprawnosć eamila
   if ((filter_var($good_email, FILTER_VALIDATE_EMAIL)==false) || ($good_email!=$email)){
      $all_ok=false;
      $_SESSION['e_email']="Podaj poprawny adres e-mail!";
   }

   $password1 = $_POST['haslo1'];
   $password2 = $_POST['haslo2'];

   if ((strlen($password1)<8) || (strlen($password1)>20)){
      $all_ok=false;
      $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
   }

   if ($password1!=$password2){
      $all_ok=false;
      $_SESSION['e_haslo2']="Podane hasła nie są identyczne!";
   }  

   $pass_hash = password_hash($password1, PASSWORD_DEFAULT); //haszowanie hasła

   // sprawdzamy czy zaakceptowano regulamin?      
   if (!isset($_POST['regulamin'])){
      $all_ok=false;
      $_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
   }  

   $salt="6LeQGh4TAAAAAExDVJGNqevEJPHSfoHV4tCW-TZH"; //reCAPTCHA ((Bot or not))  //zmienić na stonie
   $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$salt.'&response='.$_POST['g-recaptcha-response']);
   $response = json_decode($check);

   if ($response->success==false){
      $all_ok=false;
      $_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
   }  

   require_once "dbconnect.php";
   mysqli_report(MYSQLI_REPORT_STRICT);

   try{
      $stmt = new mysqli($host, $db_user, $db_password, $db_name);
      if ($stmt->connect_errno!=0){
         throw new Exception(mysqli_connect_errno());
      }
      else{
   //Czy email już istnieje?
         $result = $stmt->query("SELECT id_user FROM uzytkownicy WHERE email='$email'");

         if (!$result) throw new Exception($stmt->error);

         $how_many = $result->num_rows;
         if($how_many>0){
            $all_ok=false;
            $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
         }  

   //Czy login już istnieje?
         $result = $stmt->query("SELECT id_user FROM uzytkownicy WHERE login='$login'");

         if (!$result) throw new Exception($stmt->error);

         $ile_takich_loginow = $result->num_rows;
         if($ile_takich_loginow>0){
            $all_ok=false;
            $_SESSION['e_login']="Podany login jest już zajety";
         }  

   //test walidacji zakończony sukcesem      
         if($all_ok==true){
            if ($stmt->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$pass_hash', '$email')")){
               $_SESSION['udanarejestracja']=true;
               header('Location: witamy.php');
            }
            else{
               throw new Exception($stmt->error);
            }
         }        
         $stmt->close();
      }
   }
   catch(Exception $e){
      echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
      echo '<br />Informacja developerska: '.$e;
   }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
   <title>HTMLphp.pl</title>
   <meta charset="UTF-8">
   <meta name="Description" content="HTMLphp powstało z myśla o tych, którzy chcą nauczyć się tworzyć proste stony internetowe jak i dla tych którzy zamierząją stworzyć coś naprawdę wielkiego">
   <meta name="Keywords" content="php, html, strony, css, kaskadowe, arkusze stylów">
   <meta name="Author" content="Maciej Powallo, Sebastian Romańczukiewicz">

   <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
   <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
   <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
   <link rel="stylesheet" href="css/ihover.css" type="text/css" media="all">
   <script src='https://www.google.com/recaptcha/api.js'></script>
   <script type="text/javascript" src="js/jquery-1.6.js" ></script>
</head>
<body id="page4">
   <div class="body6">
      <div class="body1" style="height:100%">
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
                  <div class="wrapper">
                     <div class="col4">
                        <h2>Rejestracja nowego konta</h2>
                     </div>
                     <div class="col4 pad_left">
                        <form method="post">
                           <table style="margin-bottom:30px">
                              <tr>
                                 <td style="padding:5px 5px;color:#220000;font-size:16px " >login: </td>
                                 <td><input id="form" type="text" name="login"/>
                                    <?php
                                    if(isset($_SESSION['e_login'])){
                                       echo'<div class="error">'.$_SESSION['e_login'].'</div>';
                                       unset($_SESSION['e_login']);
                                    }
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td style="padding:5px 5px;color:#220000;font-size:16px " >email: </td>
                                 <td><input id="form" type="email" name="email"/>
                                    <?php
                                    if(isset($_SESSION['e_email'])){
                                       echo'<div class="error">'.$_SESSION['e_email'].'</div>';
                                       unset($_SESSION['e_email']);
                                    }
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td style="padding:5px 5px;color:#220000;font-size:16px " >Podaj hasło: </td>
                                 <td><input id="form" type="password" name="haslo1"/>
                                    <?php
                                    if(isset($_SESSION['e_haslo'])){
                                       echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
                                       unset($_SESSION['e_haslo']);
                                    }
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td style="padding:5px 5px;color:#220000;font-size:16px " >Powtórz hasło: </td>
                                 <td><input id="form" type="password" name="haslo2"/>
                                    <?php
                                    if(isset($_SESSION['e_haslo2'])){
                                       echo'<div class="error">'.$_SESSION['e_haslo2'].'</div>';
                                       unset($_SESSION['e_haslo2']);
                                    }
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="padding:5px 5px;color:#220000;font-size:16px ">
                                    <label><input id="form" type="checkbox" name="regulamin"/> Akceptuję <a href="regulamin.php">regulamin</a></label>
                                    <?php
                                    if(isset($_SESSION['e_regulamin'])){
                                       echo'<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                                       unset($_SESSION['e_regulamin']);
                                    }
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="padding:5px 5px;color:#220000;font-size:16px ">
                                    <div class="g-recaptcha" data-sitekey="6LeQGh4TAAAAAHfPL6rkGv_kJfCVxLI5sh25VZZq"></div> 
                                    <?php
                                    if(isset($_SESSION['e_bot'])){
                                       echo'<div class="error">'.$_SESSION['e_bot'].'</div>';
                                       unset($_SESSION['e_bot']);
                                    }
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2">
                                    <input class="button3" type="submit" value="Zarejestruj">
                                    <input class="button3" type="reset" value="Wyczyść"></td>
                                 </tr>
                              </table>
                              <a href="index.php">Anuluj</a><br/><br/><br/>
                           </form>     
                        </div>
                     </div>
                  </section>
                  <section>
                     <div class="col8">
                        <div class="wrapper">
                           <div class="cols8">
                              <div class="wrapper">
                                 <div id='cssmenu'>
                                 </div>
                              </div>
                           </div>               
                        </div>
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
                  <center>&#169 2014 HTMLphp by &#87;&#101;&#98;&#77;&#97;&#110;&#105;&#101;&#107;</center>
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