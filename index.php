<?php
session_start();
//error_reporting(0);
include "vt_baglan.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="tr">
<head>
<title>Yazılım Defteri</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<style type="text/css">
@import url("css/style.css");

body,td,th {
	font-size: 36%;
}
</style>
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/cambria.cufonfonts.js" ></script>
<script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
<script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
<script type="text/javascript" src="js/roundabout.js"></script>
<script type="text/javascript" src="js/roundabout_shapes.js"></script>
<script type="text/javascript" src="js/gallery_init.js"></script>
</head>
<body>

<!-- START PAGE SOURCE -->
<header class="aligncenter">
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
          <ul class="news">
            <?php
                if (@$_SESSION['kullanici']!=null) {
                    $data = htmlentities($_SESSION['kullanici'], ENT_QUOTES);
                    echo "<h2> Merhaba ".$data."</h2>";
            ?>	
				<form action="cikis.php">
				<table>
					<tr><td><input type="submit" name="button4" value="Çıkış"   /></td></tr>
				</table>
			   
			   </form>
            <?php  } else { ?>
                  <form name="Form1" method="post" onSubmit="return FormDogrula()" action="giris_kontrol.php"  >
                 <div align="left">
              <table width="324" height="101" border="0">
                  <tr>
                    <td width="101" height="35"><label>Kullanıcı Adı</label>
                      &nbsp;  </td>
                    <td width="144"><label ></label>
                    <input name="kul_adi" type="text" required></td>
                  </tr>
                  <tr>
                    <td>Şifre      </td>
                    <td><input name="sifre" type="password" required></td>
                  </tr>	
                  <tr><td></td><td>&nbsp;</td></tr>
                  <tr>
                    <td><input type="submit" name="button"  value="Giriş" /></td>
                    <td><input  type="button" value="Şifremi Unuttum" onclick="window.location.href='uye_unut.php'" />
                         <input type="button" value="Kayıt ol"        onclick="parent.location='uye.php'"   /></td>
                  </tr>
                </table>
  </div></form>
	<?php   }      ?>
            <li>
              <figure><strong>1</strong></figure>
              <h2><a href="ttp://msdn.microsoft.com/tr-tr/dn308572.aspx">MSDN</a></h2>
             <h2> MSDN – Microsoft Developer Network</h2> <a href="http://msdn.microsoft.com/tr-tr/dn308572.aspx"></a> </li>
            <li>
              <figure><strong>2</strong></figure>
              <h2><a href="http://www.asp.net/">ASP.NET</a></h2>
             <h2>ASP.NET is a free web framework for building web sites,
                apps and services with HTML, CSS and JavaScript.</h2> 
             </li>
            <li>
              <figure><strong>3</strong></figure>
              <h2><a href="http://www.php.net/">Php</a></h2>
              <h2>PHP is a popular general-purpose scripting language that is especially suited to web development.Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.</h2> </li>
          </ul>
        </aside>
        <section id="content">
          <article>
            <h2><strong>Yazılım Dünyasına Hoşgeldiniz.</strong></h2>
            <h2>Sistem yazılımı Nedir?</h2>
            <h2>  Doğrudan bilgisayar sisteminin çalışmasından sorumlu   olan programlardır. Bu programlar bilgisayar sisteminin kullanıcıyı ilgilendirmeyen alt seviye işlemlerini gerçekleştirirler. Örneğin klavyenin bir tuşuna basıldığında ekranda o harfin çıkması, çizilen bir resmin diskete kaydedilmesi, ekrandaki bir görüntünün yazıcıdan çıkarılması işletim sisteminin gerçekleştirdiği işlemlerdir. İşletim sistemi bilgisayan açar, ayarlarını yapar, kullanıcının bilgisayan kullanmasını sağlar. Windows bir işletim sistemidir.</h2>
            <h2><strong>Uygulama yazılımı Nedir?</strong></h2>
           <h2> Kullanıcının doğrudan kullandığı, yararlandığı ve/veya bir iş üretebildiği yazılımlardır. Oyunlar, kelime-işlem yazılımlan, eğitim yazılımlan, muhasebe yazılımlan, hesap tablolan vs. Bu yazılımlara örnektir. Kullanıcılar bazı yazılımlan kullanarak belge üretebilirler. Diğer bazı yazılımlarla birlikte Ofis yazılımlan bu gruba girer.</h2>
          </article>
        </section>
      </div>
    </div>
  </div>
</div>
<footer>
  <div class="container">
    <div class="footerlink">
      
     
      <div style="clear:both;"></div>
    </div>
  </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>

</body>
</html>
