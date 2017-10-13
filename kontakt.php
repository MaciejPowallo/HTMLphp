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
   <script type="text/javascript" src="js/jquery-1.6.js" ></script>
   <script type="text/javascript" id="2form">
      function validateForm(){
         var x=document.forms["formularz"]["E_MAIL"].value;
         var atpos=x.indexOf("@");
         var dotpos=x.lastIndexOf(".");
         if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
            alert("Podany e-mail ma niewłaściwą formę");
            return false;
         }
         var x=document.forms["formularz"]["IMIE"].value;
         if (x==null || x==""){
            alert("Musisz podać imię");
            return false;
         }
         var x=document.forms["formularz"]["TRESC"].value;
         if (x==null || x==""){
            alert("Musisz podać treść wiadomości");
            return false;
         }
      }
   </script>
</head>
<body id="page5">
   <div class="body6">
      <div class="body1">
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
                  <div class="box">
                     <div>
                        <h2 class="letter_spacing"><span>Formularz kontaktowy</span></h2>
                        <!-- formularz wiadomosci --> 
                        <?php
                        if (count($_POST)){
                           $email = 'leonxes@o2.pl'; 
                           $subject = 'Formularz kontaktowy'; 
                           $message = '<br><br><br><div style="color:#ffffff; text-align:center">Dziękujemy za wysłanie wiadomości. Postaramy się odpowiedzieć w jak najkrótszym czasie.<br><br><br><a href="kontakt.php"  text-align:center"><h3>>> Powrót do formularza <<</h3></a></div>';
                           $error = '<br><br><br><div style="color:#ff0000; text-align:center"><h3>&#0;ERROR&#0; Wystąpił błąd podczas wysyłania wiadomości</h3><br><br><br><a href="kontakt.php"><h3>>> Powrót do formularza <<</h3></a></div>';
                           $charset = 'utf-8';
                           $head = 
                           "MIME-Version: 1.0\r\n" . 
                           "Content-Type: text/plain; charset=$charset\r\n" . 
                           "Content-Transfer-Encoding: 8bit"; 
                           $body = ''; 
                           foreach ($_POST as $name => $value) { 
                              if (is_array($value)) { 
                                 for ($i = 0; $i < count($value); $i++){ 
                                    $body .= "$name=" . (get_magic_quotes_gpc() ? stripslashes($value[$i]) : $value[$i]) . "\r\n"; 
                                 } 
                              } 
                              else $body .= "$name=" . (get_magic_quotes_gpc() ? stripslashes($value) : $value) . "\r\n"; 
                           } 
                           foreach($_FILES as $key => $value){ 
                              $plik_tmp = $_FILES[$key]['tmp_name'];  
                              $plik_nazwa = $_FILES[$key]['name'];  
                              $plik_rozmiar = $_FILES[$key]['size'];  
                              $plik_new = uniqid(date('d m Y'),true); 
                              if(is_uploaded_file($plik_tmp)){  
                                 move_uploaded_file($plik_tmp, "upload/".$plik_new); 
                                 $body .= (get_magic_quotes_gpc() ? stripslashes($plik_nazwa) : $plik_nazwa) . " - " . $plik_new . "\r\n"; 
                              } 
                           }      
                           echo mail($email, "=?$charset?B?" . base64_encode($subject) . "?= ", $body, $head) ? $message : $error; 
                        } 
                        else { 
                           ?> 
                           <form id="ContactForm" name="formularz" action="?" method="post" enctype="multipart/form-data" action="demo_form.asp" onsubmit="return validateForm()" onsubmit="return sprawdz_imie()">
                              <table class="forms" rules="none" style="border:0; margin-left:auto; margin-right:auto;">
                                 <tr>
                                    <td class="lewa">Oceń stronę (1-6):</td><td>
                                       <input type="radio" name="ocena" value="1">1 
                                       <input type="radio" name="ocena" value="2">2 
                                       <input type="radio" name="ocena" value="3">3 
                                       <input type="radio" name="ocena" value="4">4 
                                       <input type="radio" name="ocena" value="5">5 
                                       <input type="radio" name="ocena" value="6">6 
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="lewa"><b style="color:#f00">*</b>Imię i nazwisko (nazwa firmy): </td><td><input class="input" type="text" name="IMIE" maxlength="80" autofocus placeholder="Proszę podać imię i nazwisko lub nazwę firmy"></td>
                                 </tr>
                                 <tr>
                                    <td class="lewa"><b style="color:#f00">*</b>E-mail: </td><td><input class="input" type="email" name="E_MAIL" maxlength="80" placeholder="e-mail jest nam niezbędny do odpowiedzi"></td>
                                 </tr>
                                 <tr>
                                    <td class="lewa">Tytuł: </td><td><input type="text" class="input" name="TYTUL" maxlength="60" placeholder="Tytuł wiadomości"></td>
                                 </tr>
                                 <tr>
                                    <td class="lewa"><b style="color:#f00">*</b>Twoja wiadomość: </td><td><textarea name="TRESC" maxlength="1500" placeholder="Treść - max 1500 znaków" wrap="hard" required></textarea></td>
                                 </tr>
                                 <tr>
                                    <td colspan="2" align="center"><br>
                                       <input class="button" type="submit" value="Wyślij">
                                       <input class="button" type="reset" value="Wyczyść"><br><br><br>
                                    </td>
                                 </tr>
                              </table>
                           </form>
                           <?php 
                        }
                        ?> 
                     </div>
                  </div>
               </div>
            </article>
         </div>
      </div>
   </div>
   <div class="body2">
      <div class="main">
         <article id="content2">
            <div class="wrapper">
               <section class="pad_left1">
                  <div class="wrapper">
                     <div class="cols">
                        <h2>Dane adresowe</h2>
                     </div>
                     <div class="col3 pad_left1">
                        <h2>Mapa dojazdu</h2>
                     </div>
                  </div>
                  <div class="line1">
                     <div class="wrapper line2">
                        <div class="cols">
                           <div class="wrapper pad_bot1">
                              <ul class="address"  style="font-size:18px">
                                 <h3>HTMLphp</h3>
                                 ul. Prószkowska 76, 45-758 Opole<br/>
                                 <span>tel:</span> <a>+48 600 000 000</a><br/>
                                 <span>e-mail:</span> <a href="mailto:">biuro@htmlphp.pl</a>
                              </div>
                           </div>
                           <div class="col3 pad_left1">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2117.839144453074!2d17.902854715738737!3d50.6541171795039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471053bb1bcdafab%3A0xf2ef41915344d5dd!2sPolitechnika+Opolska!5e1!3m2!1spl!2spl!4v1460235548332" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                                 <li><a href=""><img class="find_us" src="images/main/google.png" alt="google"></a></li>
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