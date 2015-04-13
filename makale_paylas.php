<?php
error_reporting(0);
include "vt_baglan.php";
@$_SESSION['kullanici'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Design Company | Privacy</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
<script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/roundabout.js"></script>
<script type="text/javascript" src="js/roundabout_shapes.js"></script>
<script type="text/javascript" src="js/gallery_init.js"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>

<!--[if lt IE 7]>
<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all">
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/IE9.js"></script>
<![endif]-->
</head>
<body>
<!-- START PAGE SOURCE -->
<header>
  <div class="container">
 <h1>Yazılım Defteri</h1>
    <nav>
      <ul>
     <li><a href="index.php" class="current">Anasayfa</a></li>
        <li><a href="arama.php">Arama</a></li>
        <li><a href="makale_ana.php"> Makaleler</a></li>
        <li><a href="uye.php">Üyelik işlemleri</a></li>
      </ul>
    </nav>
  </div>
</header>
<<section id="gallery">
  <div class="container">
    <ul id="myRoundabout">
      <li><img src="images/Untitled-1.jpg" alt=""></li>
      <li><img src="images/Untitled-2.jpg" alt=""></li>
      <li><img src="images/Untitled-5.jpg" alt=""></li>
      <li><img src="images/Untitled-3.jpg" alt=""></li>
      <li><img src="images/Untitled-4.jpg" alt=""></li>
    </ul>
  </div>
</section>
<div class="main-box">
  <?php 
  if ($_SESSION['kullanici'] !=null) {
	 ?> 
  <div class="container">
    <div class="inside">
     <h2>Makale Paylaşımı</h2>
      <div>
     <form class="contact-form" method="post" action="makale_yukle.php" name="Form1" onSubmit="return FormDogrula()" enctype="multipart/form-data">
      <table>
        <tr>
          <td width="54">Konu</td>
        <td width="23">&nbsp;</td>
        <td width="746"><input name="konu" type="text"  size="55">
        </td>
      </tr>
      <tr>
        <td>Özeti</td>
        <td>&nbsp;</td>
        <td> 
          <input name="ozet" type="text" size="55">
        </td>
        </tr>
        <td>Makale</td>
        <td>&nbsp;</td>
        <td> 
 Bir dosya seçiniz (Maksimum 2 mb):  <input type="file" class="default" name="dosya">    
<input type="submit" value="Yükle">
           </td>
        </tr>
      </table>
    </form> 
  </div>
      <p>&nbsp;</p>
    </div>
  </div>

  <?php 
  
}
  else
  {
	  echo "lütfen anasayfdan giriş yapınız";
	  }
  
  
  ?>
</div>
<footer>
  <div class="container">
    <div class="footerlink">
      <p class="lf">Copyright &copy; 2010 <a href="#">Domain Name</a> - All Rights Reserved</p>
      <p class="rf"><a href="http://all-free-download.com/free-website-templates/">Free CSS Templates</a> by <a href="http://www.templatemonster.com/">TemplateMonster</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div>

</body>
</html>
