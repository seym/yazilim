<?php
session_start();
//error_reporting(0);
include "vt_baglan.php";
$kul_adi = htmlentities($_SESSION['kullanici'], ENT_QUOTES, "UTF-8");
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
  <br />  <br />  <br />  <br />
  <div>
   <?php 
        if (isset($_SESSION['kullanici'])) {      
            echo "   <table width=\"223\" height=\"39\"><tr><td>
                        <form name=\"form2\" method=\"post\" action=\"makale_paylas.php\">
                        <input type=\"submit\"  value=\"Yeni Makale Ekleme\" /></form></td></tr>
                     </table>";  
        } else {
            echo "<h2>Makale eklemek için üye girişi yapmış olmanız gereklidir!<br /></h2>"; 
        }
            $sql="SELECT count(*) FROM makale ";
            $sonuc=$vt->query($sql);
            $satirsayisi = $sonuc->fetch_array();
            $limit = 3;
            if (isset($_GET['sekme']) AND is_numeric($_GET["sekme"])) 
		{
                    if ($_GET['sekme']<1) {
                        $sekme=1;
                    }
                    else
                    {
                        $sekme = $_GET["sekme"];
                    }
                }
                else 
                {
                    $sekme=1;
                }

                $baslangic=($sekme - 1)* $limit;
                $sql="SELECT * FROM makale order by zaman DESC  LIMIT $baslangic,$limit";
                $sonuc=$vt->query($sql);
                $toplam=ceil($satirsayisi[0]/$limit);

                while($satir = $sonuc->fetch_assoc())
                {
                    $makale_id  = $satir["makale_id"];      
                    $makale_idyaz  = htmlentities($satir["makale_id"], ENT_QUOTES, 'UTF-8');
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
                    echo "<form method='POST' action='makale_oku.php?makale_id=$makale_id'>";
                    echo "<input type=\"hidden\" name=\"yol\"        value='$yol'  >";
                    echo "<input type=\"hidden\" name=\"yukleyen\"   value='$yukleyen'  >";
                    echo "<input type=\"hidden\" name=\"konu\"       value='$konu'     >";
                    echo "<input type=\"hidden\" name=\"ozet\"       value='$ozet'     >";
                    echo "<input type=\"hidden\" name=\"zaman\"      value='$zaman'    >";
                    echo "<tr><td></td><td><input type=\"submit\" value=\"detay\"></td></tr>";
                    echo "</form>";
                    echo "</table>";
                    echo "<br>"; 
                }

if(!empty($sekme))
{
   if($sekme>1)
       { 
        echo "<a href=\"makale_ana.php?sekme= $sekme-1 \" >Geri </a>";
       }   
    for ($i=1; $i<=$toplam; $i++) {
        echo " <a href=\"makale_ana.php?&sekme=$i\" ";
        if ($i==$sekme) {
            echo "class=\"selected\"";
        }
        echo ">$i</a> " ; 
    }
    
    if($sekme<$toplam){
        echo "<a href=\"makale_ana.php?sekme=$sekme+1\" >İleri </a> ";
    } 

}?>



  
  </h2>
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
<!-- END PAGE SOURCE -->
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div>
</body>
</html>
