<?php
session_start();
//error_reporting(0);
include "vt_baglan.php";
include "fonksiyonlar.inc";

$kullanici_adi=$_SESSION['kullanici'];
$puan       = $vt->real_escape_string($_POST["puan"]);
$makale_id  = $vt->real_escape_string($_POST["makale_id"]);

	
if ($puan!=null) {
        $sql="INSERT INTO puan(kullanici,makale,puan) values('$kullanici_adi','$makale_id','$puan')";

        if ($vt->query($sql)) {
                MesajUyari("Puan Verme İşleminiz Başarıya Gerçekleşmiştir...","makale_oku.php?makale_id=$makale_id");
        }

        if($vt->query($sql) === false) 
        {
                printf("Hata mesajı: <br/>\r\n", $vt->error);
                MesajUyari("Tekrar Deneyiniz...","makale_oku.php?yol=$yol&makale_id=$makale_id");
        } 
        $vt->close();
}
else
{
        MesajUyari("Lütfen puan giriniz...","makale_oku.php?yol=$yol&makale_id=$makale_id");
}
?>