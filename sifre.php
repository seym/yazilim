<?php
include "vt_baglan.php";
error_reporting(0);
//$kullanici_gizli=trim($_POST['kul_adi']);
@$kullanici=trim($_POST['kul_adi']);
$kul=htmlentities($kullanici);
@$posta=$_POST['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Yazlım Defteri | Sitemap</title>
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
      <form name="form1" method="post" action="email.php">
        <div>
          <table width="542" border="3">
            <tr>
              <td width="209">kullanıcı adı</td>
              <td width="10"></td>
              <td width="10"><?php echo $kul;?></td>
            </tr>
            <tr>
              <td>e_posta</td>
              <td>&nbsp;</td>
              <td><?php echo $posta;?></td>
            </tr>
            <tr>
              <td>soru</td>
              <td>&nbsp;</td>
              <td><?php 
				
		                      	$sql="SELECT * FROM uyeler WHERE kullanici_id='$kullanici'";
                            $sonuc=$vt->query($sql);
                            $satir = $sonuc->fetch_assoc();
                            $soru   = $satir['soru'];      
                            $k=  $satir['kullanici_id'];
                            $soru = htmlentities($soru);

                            $soru = stripcslashes($soru);
                    
                            echo $soru;
                            	?>
                            </td>
            </tr>
            <tr>
              <td>cevap</td>
              <td>&nbsp;</td>
              <td><input type="text" name="cevap" ></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="button" >
             <input type="hidden" name="kullanici2" value="<?php echo $kul; ?>">

                   <input type="hidden" name="posta" value="<?php echo $posta;?>">
             
                       
              
                <input type="reset" name="button2" id="button2" ></td>
            </tr>
          </table>
        </div>
        
      </form>
      <h2>&nbsp;</h2>
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
