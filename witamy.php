<?php
   session_start();
   if (!isset($_SESSION['udanarejestracja'])){
      header('Location: index.php');
      exit();
   }
   else{
      unset($_SESSION['udanarejestracja']);
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
   <script type="text/javascript" src="js/jquery-1.6.js" ></script>
</head>
<body id="page4">
   <div class="body6">
      <div class="body1"      style="height:100%">
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
               <section class="col4 pad_left">
                  <div class="wrapper">
                     <div class="col4 pad_left">
                        Dziękujemy za rejestrację w serwisie! Możesz już zalogować się na swoje konto!<br/><br/>
                        <a href="index.php">Zaloguj się na swoje konto!</a><br/><br/>
                     </div>
                  </div>
               </section>
               <section>
                  <div class="col8">
                     <div class="wrapper">
                        <div class="cols8">
                           <div class="wrapper">
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