<?php
session_start();
//error_reporting(0);
include ("fonksiyonlar.inc"); //MesajUyari fonksiyonuna bağlantı
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Yazılım Defteri
 </title>
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
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script><!--[if lt IE 7]>

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
<div class="container">
  <div class="inside">
  <div>
    <?php
    // Burada URL aracılığıyla makale_id'si gönderilmiş mi ona bakıyor. Eğer gönderilmişse, 
    //diğer bilgileri veri tabanından okutuyor, gönderilmemişse bir uyarı veriyor. 
    if (isset($_GET["makale_id"])) {
        include ("vt_baglan.php");
        $makale_id = $vt->real_escape_string($_GET["makale_id"]);
        $sql="SELECT * FROM makale WHERE makale_id = '$makale_id'";
        $sonuc=$vt->query($sql);
        if ($sonuc->num_rows > 0) {
            $satir = $sonuc->fetch_assoc();
            $yol   = $satir["yol"];
        } else {
            MesajUyari("Böyle bir makale mevcut değil!","makale_ana.php"); // Verilen id tabloda yoksa gösterilecek mesaj
        }
     } 
     else 
     {
         MesajUyari("Hangi makaleye erişmeye çalıştığınızı belirleyemedik, lütfen tekrar deneyiniz!","makale_ana.php");
         // makale_id hiç yoksa gösterilecek mesaj
     }
    ?>
      <table width="80%" border="1">;
        <tr>
            <td colspan="3">               
            <?php   
                echo  "<embed src='$yol'  width=\"100%\" height='600'>";
            ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <?php 
                if (isset($_SESSION['kullanici'])) {  ?>
                    <form action="yorumla.php" method="POST">
                        <input name="makale_id" type="hidden" value="<?php echo $makale_id; ?>"/>
                        <input name="yol" type="hidden" value="<?php echo $yol; ?>" />
                        <textarea name="yorum" cols="80" rows="5"></textarea>
                        <input type="submit" name="yorumlama" value="Gönder">
                    </form>
                <?php 
                } 
                else { 
                    echo "Yorum yapmak için giriş yapmanız gereklidir!";
                } ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">                 
            <?php
                // Makalenin ortalama puanını gösterelim. 
                $sql="SELECT AVG(puan) as ortpuan FROM puan where makale=$makale_id";
                $sonuc=$vt->query($sql);
                if ($vt->error) {echo $vt->error;}
                $satir = $sonuc->fetch_assoc();
                $ortpuan    = $satir["ortpuan"];
                echo "Ortalama Puan:".$ortpuan; 
                echo "<br />";
                
                // Puan verebilmesi veya önceki puanını gösterebilmemiz için giriş yapması lazım
                if (isset($_SESSION['kullanici'])) { 
                    $kullanici_adi=$_SESSION['kullanici'];
                    $sql="SELECT puan FROM puan WHERE makale = '$makale_id' and kullanici = '$kullanici_adi'";
                    $sonuc=$vt->query($sql);
                    $satir = $sonuc->fetch_assoc();
                    $puan = $satir["puan"];

                    if ($puan!=null)
                    {
                        echo "Senin Puanın: ".$puan;
                    }
                    else
                    { // Puan verebilmesi için formu gösterelim 
                    ?>
                        <form action="puanla.php" method="POST">
                            <input type="hidden" name="makale_id" value="<?php echo $makale_id ?>"> 
                            Makaleye Puan Verin:
                            <input type="radio" name="puan" value="0">0 
                            <input type="radio" name="puan" value="1">1 
                            <input type="radio" name="puan" value="2">2 
                            <input type="radio" name="puan" value="3">3 
                            <input type="radio" name="puan" value="4">4 
                            <input type="radio" name="puan" value="5">5 
                            <input type="radio" name="puan" value="6">6 
                            <input type="radio" name="puan" value="7">7 
                            <input type="radio" name="puan" value="8">8 
                            <input type="radio" name="puan" value="9">9
                            <input type="radio" name="puan" value="10">10
                           <input type="submit" name="puanlama" value="Puanla">
                        </form> 
            <?php   } 
                } else {
                    echo "Puan verebilmeniz veya önceki puanınızı görebilmeniz için giriş yapmanız gereklidir.";
                }
                ?>
              </td>
        </tr>
     <?php
        $sql="SELECT * FROM yorum WHERE makale = '$makale_id' order by tarih";
        $sonuc=$vt->query($sql);
        while($satir = $sonuc->fetch_assoc()){
            $yorumyazan  = $satir["yapan"];
            $tarih          = $satir["tarih"];
            $yorum          = $satir["yorum"];
            $yorumyazan=htmlentities($yorumyazan,ENT_COMPAT,'utf-8');
    ?>
        <tr>
              <td width="20%"><?php echo $yorumyazan?> <br>
              <?php echo $tarih?></td>
              <td><?php echo  htmlentities($yorum,ENT_COMPAT,'utf-8');?></td>
              <td>                     

                <?php
                    if (isset($_SESSION['kullanici']) AND $_SESSION['kullanici']==$yorumyazan) {
                        echo '<form action="yorumsil.php" method="post">';
                        echo "<input type=\"hidden\" name=\"makale_id\" value=\"$makale_id\">";
                        echo "<input type=\"hidden\" name=\"tarih\" value=\"$tarih\">";
                        echo '<input type="submit" value="sil"></form>';
                    } else { echo "&nbsp;&nbsp;&nbsp;"; }
                ?>                     
              </td>
            </tr>
          
          <?php } ?>
         </table>
            
   </div>
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
</body>
</html>