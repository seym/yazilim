<?php 
include "vt_baglan.php";
include "fonksiyonlar.inc";
//error_reporting(0);
$ad             = $vt->real_escape_string($_POST["ad"]);
$soyad		= $vt->real_escape_string($_POST["soyad"]);
$ikinci_ad	= $vt->real_escape_string($_POST["ad2"]);
$kullanici_id	= $vt->real_escape_string($_POST["kul_adi"]);
$e_posta	= $vt->real_escape_string($_POST["posta"]);
$il		= $vt->real_escape_string($_POST["il"]);
$egitim	        = $vt->real_escape_string($_POST["egitim"]);
$soru		= $vt->real_escape_string($_POST["soru"]);
$cevap		= $vt->real_escape_string($_POST["cevap"]);
$sifre          = sha1($_POST["sifre"]);

$sql="SELECT * FROM uyeler WHERE kullanici_id like '$kullanici_id'";
    $sonuc=$vt->query($sql);
    if ($sonuc->num_rows<>0) {
        MesajUyari("Bu kullanıcı adı kullanılmaktadır Lütfen başka bir kullanıcı adı deneyiniz...","uye.php");
    }
    else
    {
             $sql="INSERT INTO uyeler(ad,soyad,ikinci_ad,kullanici_id,e_posta,il,egitim,soru,cevap,sifre)
             values('$ad','$soyad','$ikinci_ad','$kullanici_id','$e_posta','$il','$egitim','$soru','$cevap','$sifre')";

             if($vt->query($sql) === false) 
             {
                     printf("Hata mesajı: %s <br />\r\n", $vt->error);
                     MesajUyari("Tekrar Deneyin","uye.php");
             } 

             else 
             {
               MesajUyari("Üye Kaydınız Başarıyla Gerçekleşti. Giriş Yaparak Profilinize Ulaşabilirsiniz.","index.php");
             }

             $vt->close();
    }

?>