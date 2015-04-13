<?php
session_start();
error_reporting(0);
include "vt_baglan.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Yazılım Defteri | Arama </title>
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
<br>
<?php 
  
    @$baslik=$_GET["baslik"];
     echo '<form name="form1" method="get" action="arama.php">
            <table border="0">
              <tr>
                <td>Aranacak Kelime &nbsp;</td>
                <td><input name="baslik" type="text"  size="40"></td>
                <td> &nbsp;<input type="submit" value="Ara"></td>
              </tr>
            </table>
          </form>';

    if($baslik!=null)
    {
        $sql="SELECT * FROM makale WHERE konu like'%$baslik%' order by zaman DESC ";
        $sonuc=$vt->query($sql);
        while($satir = $sonuc->fetch_assoc())
            {
                $makale_id  = $satir["makale_id"];      
                $makale_idyaz  = htmlentities($satir["makele_id"], ENT_QUOTES, 'UTF-8');
                $yukleyen = $satir['yukleyen'];
                $yukleyenyaz   = htmlentities($satir['yukleyen'], ENT_QUOTES, "UTF-8");
                $konu = $satir['konu'];
                $konuyaz       = htmlentities($satir["konu"],ENT_QUOTES,'utf-8');
                $ozeti = $satir['ozeti'];
                $ozetyaz       = htmlentities($satir["ozeti"],ENT_QUOTES,'utf-8');
                $zaman = $satir['zaman'];
                $zamanyaz      = htmlentities($satir["zaman"],ENT_QUOTES,'utf-8');
                $yol = $satir['yol'];
                $yolyaz        = htmlentities($satir["yol"], ENT_QUOTES, 'UTF-8');
                echo " <table border=1>";
                echo "<tr width=\"80%\"><td>Paylaşan</td><td>$yukleyenyaz</td></tr>"."<br>"."<br>"."<br>";
                echo "<tr width=\"500\"><td>Konu</td><td>$konuyaz</td></tr><br>";
                echo "<tr width=\"500\"><td>Ozeti</td><td>$ozetyaz</td></tr><br>";
                echo "<tr width=\"500\"><td>Makale</td><td><a href='$yol'>indir</a></td></tr><br>";
                echo "<tr width=\"500\"><td>Paylaşım Tarihi</td></a><td>$zaman</td></tr><br>";
                echo "<tr><td></td><td><a href='makale_oku.php?makale_id=$makale_id'>Detay</a></td></tr>";
                echo "</table>";
                echo "<br>"; 
            }
    }

?>
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
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div>
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
</body>
</html>
