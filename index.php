<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
   <title>HTMLphp.pl</title>
   <meta charset="UTF-8">
   <meta name="Description" content="HTMLphp powstało z myśla o tych, którzy chcą nauczyć się tworzyć proste stony internetowe jak i dla tych którzy zamierząją stworzyć coś naprawdę wielkiego">
   <meta name="Keywords" content="php, html, strony, css, kaskadowe, arkusze stylów">
   <meta name="Author" content="Maciej Powallo, Sebastian Romańczukiewicz">
   <link rel="shortcut icon" href="favicon.ico">
   <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
   <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
   <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
   <link rel="stylesheet" href="css/ihover.css" type="text/css" media="all">
   <link rel="stylesheet" href="css/face_slider.css" type="text/css" media="all">
   <script type="text/javascript" src="js/jquery-1.6.js" ></script>
   <script type="text/javascript" src="js/cufon-yui.js"></script>
   <script type="text/javascript" src="js/cufon-replace.js"></script>  
   <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
   <script type="text/javascript" src="js/tms-0.3.js"></script>
   <script type="text/javascript" src="js/tms_presets.js"></script>
   <script type="text/javascript" src="js/script.js"></script>
   <script type="text/javascript" src="js/atooltip.jquery.js"></script> 
   <script type="text/javascript" charset="utf-8" id="face_slider">
      $(function(){
         $('#face-slider').hover(
            function(){ $('#face-slider').stop().animate({"left": "0"}, 1000); } ,
            function(){ $('#face-slider').stop().animate({"left": "-309px"}, 1000); }
            );
      });
   </script>
</head>
<body id="page1">
   <div class="body6">
      <div class="body1">
         <div class="body5">
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
                  <div class="slider_bg" >
                     <div class="slider">  
                        <ul class="items">
                           <!-- Slajd 1 -->
                           <li>
                              <img src="images/slider/img1.jpg" alt="1">
                              <div class="banner">
                                 <strong>HTML</strong>
                                 <b>HyperText Markup Language</b>
                                 <p><span>język obecnie szeroko wykorzystywany do tworzenia stron internetowych</span></p>
                              </div>
                           </li> 
                           <!-- Slajd 2 -->
                           <li>
                              <img src="images/slider/img2.jpg" alt="2">
                              <div class="banner">
                                 <strong>CSS</strong>
                                 <b>Cascading Style Sheets</b>
                                 <p><span>język służący do opisu formy prezentacji stron. CSS został opracowany przez organizację W3C w 1996 r.</span></p>
                              </div>
                           </li>
                           <!-- Slajd 3 -->
                           <li>
                              <img src="images/slider/img3.jpg" alt="3">
                              <div class="banner">
                                 <strong>PHP</strong>
                                 <b>PHP Hypertext Preprocessor</b>
                                 <p><span>interpretowany skryptowy język programowania zaprojektowany do generowania stron internetowych i budowania aplikacji webowych w czasie rzeczywistym</span></p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="wrap">
                     <section class="cols">
                        <div class="box">
                           <div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <h2><span>HTML</span></h2>
                                    <div class="ih-item circle effect2 left_to_right"><a href="html.php">
                                       <div class="img"><img src="images/image2.png" alt="img"></div>
                                       <div class="info">
                                          <h2>HTML</h2>
                                          <p>język obecnie szeroko wykorzystywany do tworzenia stron internetowych</p>
                                       </div></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>              
                     <section class="cols  pad_left1">
                        <div class="box">
                           <div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <h2><span>PHP</span></h2>
                                    <div class="ih-item circle effect2 top_to_bottom"><a href="php.php">
                                       <div class="img"><img src="images/image1.png" alt="img"></div>
                                       <div class="info">
                                          <h2>PHP</h2>
                                          <p>język programowania zaprojektowany do generowania stron internetowych</p>
                                       </div></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="cols pad_left1">
                        <div class="box">
                           <!-- Right to left-->
                           <div class="row">
                              <div class="col-sm-6">
                                 <h2><span>CSS</span></h2>
                                 <div class="ih-item circle effect2 right_to_left"><a href="css.php">
                                    <div class="img"><img src="images/image3.png" alt="img"></div>
                                    <div class="info">
                                       <h2>CSS</h2>
                                       <p>język służący do opisu formy prezentacji stron.</p>
                                    </div></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  </article>
               </div>
            </div>
         </div>
      </div>
      <div class="body2">
         <div class="main">
            <article id="content2">
               <div class="wrapper">
                  <section class="col3 pad_left">
                     <h2>Aktualności</h2>
                     <div class="wrapper">
                        <div class="cols">
                           <div class="wrapper" style="width:550px">
                              <!--POCZĄTEK NEWSA -->
                              <div class="border_news">
                                 <a href="aktualnosci.html"><figure><img src="images/aktualnosci/13_08.jpg" class="ico" alt="Nazwa pliku"></figure></a>
                                 <table class="date">
                                    <tr>
                                       <td>
                                          <h6 style="padding-top:6px;font-size:10px; color:#ffffff">2016</h6>09.04
                                       </td>
                                    </tr>
                                 </table>
                                 <b class="title_news"><q>Powstanie strony HTMLphp.pl</q></b>
                                 <div class="width_news">Prezentujemy Państwu nową stronę stworzoną w celeach szkoleniowych. HTMLphp powstało z myśla o tych, którzy chcą nauczyć się tworzyć proste stony internetowe jak i dla tych którzy zamierząją stworzyć coś naprawdę wielkiego.
                                    <a href="aktualnosci.html">(czytaj więcej)</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <h2 style="margin-left:10px">Zaloguj</h2>
                  <section class="col2 pad_left" style="width:380px; border:3px solid #ddd; border-radius:15px">
                     <?php
                     if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
                        echo '<h4 style="margin-left:10px"> Witaj '.$_SESSION['user'].' !</h4>';
                        echo 'Przejdź do <a href="add.php">[moje konto]</a>';
                        echo '<form action="wyloguj.php" method="post"><input class="button3" type="submit" value="Wyloguj"></form>';
                     }
                     else{
                        if(isset($_SESSION['blad']))  echo $_SESSION['blad'];

                        echo'
                        <form action="zaloguj.php" method="post">
                           <table style="margin-bottom:30px">
                              <tr>
                                 <td style="padding:5px 5px;color:#220000;font-size:16px " >Login: </td>
                                 <td>
                                    <input id="form" type="text" name="login"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td style="padding:5px 5px;color:#220000;font-size:16px " >Hasło: </td>
                                 <td>
                                    <input id="form" type="password" name="haslo"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2">
                                    <input class="button3" type="submit" value="Zaloguj się">
                                    <input class="button3" type="reset" value="Anuluj">
                                 </td>
                              </tr>
                           </table>
                           <a href="rejestracja.php">Nie mam konta!</a><br/><br/><br/>
                        </form>
                        ';
                     }
                        ?>          
                     </section>
                  </div>
               </article>
               <h2 style="margin-left:10px">Współpraca</h2>
               <script type="text/javascript" src="js/jssor.core.js"></script>
               <script type="text/javascript" src="js/jssor.utils.js"></script>
               <script type="text/javascript" src="js/jssor.slider.js"></script>
               <script>
                  jssor_slider1_starter = function (containerId) {
                     var options = {
                        $AutoPlay: true,
                        $AutoPlaySteps: 1,
                        $AutoPlayInterval: 0,
                        $PauseOnHover: 1,
                        $ArrowKeyNavigation: true,
                        $SlideEasing: $JssorEasing$.$EaseLinear,
                        $SlideDuration: 3000,
                        $MinDragOffsetToSlide: 20,
                        $SlideWidth: 140,
                        $SlideSpacing: 0,
                        $DisplayPieces: 7,
                        $ParkingPosition: 0,
                        $UISearchMode: 1,
                        $PlayOrientation: 1,
                        $DragOrientation: 1
                     };
                     var jssor_slider1 = new $JssorSlider$(containerId, options);
                     function ScaleSlider() {
                        var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                        if (parentWidth)
                           jssor_slider1.$SetScaleWidth(Math.min(parentWidth, 980));
                        else
                           $JssorUtils$.$Delay(ScaleSlider, 30);
                     }
                     ScaleSlider();
                     $JssorUtils$.$AddEvent(window, "load", ScaleSlider);
                     if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                        $JssorUtils$.$OnWindowResize(window, ScaleSlider);
                     }
                  };
               </script>
               <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden; ">

                  <!-- Loading Screen -->
                  <div u="loading" style="position:absolute; top:0px; left:0px">
                     <div style="filter:alpha(opacity=70); opacity:0.7; position:absolute; display:block;
                     background-color:#000; top:0px; left:0px; width:100%; height:100%">
                  </div>
                  <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                  top:0px; left:0px; width:100%; height:100%">
               </div>
            </div>
            <!-- Pasek współpracy  musi zawierać minimum 8 pozycji, w razie mniejszej ilości trzeba je powtórzyć. Obrazy powinny mieć rozmair 320x256-->
            <div u="slides" style="cursor: move; position: absolute; left: 10px; top: 0px; width: 880px; height: 100px; overflow: hidden">
               <!-- Współpraca -->
               <div><a href="https://www.w3.org/"><img u="image" alt="w3c" src="images/wspolpraca/w3c.png" class="sl_logo"/></a></div>
               <div><a href="https://www.facebook.com/"><img u="image" alt="facebok" src="images/wspolpraca/facebok.png" class="sl_logo"/></a></div>
               <div><a href="http://www.kurshtml.edu.pl/"><img u="image" alt="kurshtml" src="images/wspolpraca/kurshtml.png" class="sl_logo"/></a></div>
               <div><a href="https://www.w3.org/"><img u="image" alt="w3c" src="images/wspolpraca/w3c.png" class="sl_logo"/></a></div>
               <div><a href="https://www.facebook.com/"><img u="image" alt="facebok" src="images/wspolpraca/facebok.png" class="sl_logo"/></a></div>
               <div><a href="http://www.kurshtml.edu.pl/"><img u="image" alt="kurshtml" src="images/wspolpraca/kurshtml.png" class="sl_logo"/></a></div>
               <div><a href="https://www.w3.org/"><img u="image" alt="w3c" src="images/wspolpraca/w3c.png" class="sl_logo"/></a></div>
               <div><a href="https://www.facebook.com/"><img u="image" alt="facebok" src="images/wspolpraca/facebok.png" class="sl_logo"/></a></div>
               <div><a href="http://www.kurshtml.edu.pl/"><img u="image" alt="kurshtml" src="images/wspolpraca/kurshtml.png" class="sl_logo"/></a></div>
            </div>
            <!-- Trigger -->
            <script>
               jssor_slider1_starter('slider1_container');
            </script>
         </div>
         <!-- Slider End -->
      </div>
      <br/>
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
                  <!-- end content -->
               </div>
               <center>&#169 2016 HTMLphp by &#87;&#101;&#98;&#77;&#97;&#110;&#105;&#101;&#107;</center>
            </div>
            <!-- {%FOOTER_LINK} -->
            <div id="face-slider"><!--SLIDER -->
               <div id="fb-root"></div>
               <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.0";
                  fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));</script>
               <div id="tab"></div>
               <div id="face-code"><div class="fb-like-box" data-href="https://www.facebook.com/neobud.official" data-width="292" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div></div></div>
            </div><!--END SLIDER -->
         </div>
      </div>
   </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<a href="#" title="Do góry!" id="scroll-to-top"><img src="images/main/scrollup.png" alt="strzałka do góry" /></a>
<script>
   $(function(){
      var stt_is_shown = false;
      $(window).scroll(function(){
         var win_height = 300;
         var scroll_top = $(document).scrollTop(); 
         if (scroll_top > win_height && !stt_is_shown){
            stt_is_shown = true;
            $("#scroll-to-top").fadeIn();
         } else if (scroll_top < win_height && stt_is_shown){
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