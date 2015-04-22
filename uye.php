<?php
session_start();
//error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Yazılım Defteri | Uyelik Formu</title>
<meta charset="utf-8">

<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
<script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/roundabout.js"></script>
<script type="text/javascript" src="js/roundabout_shapes.js"></script>
<script type="text/javascript" src="js/gallery_init.js"></script>
<script type="text/javascript" src="js/loopedslider.min.js"></script>
<script type="text/javascript">
$(function () {
    $('#loopedSlider').loopedSlider({
        container: ".wrap",
        containerClick: false
    });
});
</script>


 <script type="text/javascript">
  function SifreDogrula()
      {
        var sifre=document.forms["Form1"]["sifre"].value;
        var sifre2=document.forms["Form1"]["sifre2"].value;
      
        if (sifre!=sifre2)
        {
        alert("Şifreleriniz farklı, iki şifreyide aynı girmelisiniz!");
        document.forms["Form1"]["sifre"].focus();
        return false;
        }
      return true;
}
</script>
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
        <li><a href="uye.php">Üyelik İşlemleri</a></li>
      </ul>
    </nav>
  </div>
</header>
<section id="gallery">
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
  <div class="container">
    <div class="inside">
      <div class="wrapper">
        <aside>
          <h2>Yardımcı Siteler</h2>
          <div id="loopedSlider">
            <div class="wrap">
              <div class="slides">
                <div><a href="#"><img src="images/tum-1.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/tum-3.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/tum-2.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/tum-4.jpg" alt=""></a></div>
                <div><a href="#"><img src="images/tum-5.jpg" alt=""></a></div>
              </div>
            </div>
            <ul class="nav-controls">
              <li><a href="#" class="previous">Önceki</a></li>
              <li><a href="#" class="next">Sonraki</a></li>
            </ul>
          </div>
        </aside>
  
        <section id="content">
          <article>
            <h2>Üyelik Bilgileri</h2>
            <p>&nbsp;</p>
            <form name="Form1" method="post" action="uye_kontrol.php" onSubmit="return SifreDogrula()">
                     
            <table  border="0">
              <tr>
                <td width="209">Kullanıcı Adınız</td>
                <td width="210">            
                  <input type="text" name="kul_adi" required>
                </td>
              </tr>
              <tr><td>Eposta</td>
                 <td><input type="email" name="posta" required></td></tr>
              <tr>
                <td>Ad</td>
                <td><input type="text" name="ad" required></td>
              </tr>
              <tr>
                <td>İkinci Adınız</td>
                <td><input type="text" name="ad2"></td>
              </tr>              
              <tr>
                <td>Soyad</td>
                <td><input type="text" name="soyad" required></td>
              </tr>
             
              <tr>
                <td>Şifre</td>
                <td><input type="password" name="sifre"  required></td>
              </tr>
              <tr>
                <td>Şifre Tekrar</td>
                <td><input type="password" name="sifre2"  required></td>
              </tr>
              <tr> 
              </tr>
              <tr>
                <td>Eğitim</td>
                <td><input type="text" name="egitim" ></td>
              </tr>
              <tr>
                <td>İl</td>
                <td><input type="text" name="il" ></td>
              </tr>
              <td>Güvenlik Sorusu</td>
                <td><input type="text" name="soru" ></td>
              </tr>
              <tr>
                <td>Güvenlik Cevabı</td>
                <td><input type="password" name="cevap" ></td>
              <tr>
                <td>&nbsp;</td>
                <td>
                  <input type="submit" value="Gönder" /></td>
              </tr>
            </table>
            </form>
            <p>&nbsp;</p>
            <p>Bilgileriniz sizlere daha iyi hizmet vermek amacıyla saklanacaktır. </p>
          </article>
        </section>
        
        
      </div>
    </div>
  </div>
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
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
