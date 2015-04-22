<?php
//error_reporting(0);    
session_start();
include "vt_baglan.php";
include "fonksiyonlar.inc";
		
$kullanici_adi=$_SESSION['kullanici'];
$metin = $vt->real_escape_string($_POST["yorum"]);
$makale_id = $vt->real_escape_string($_POST["makale_id"]);
if ($makale_id!=null and $kullanici_adi!=null) {
    $sql="INSERT INTO yorum(yapan,makale,yorum) VALUES ('$kullanici_adi','$makale_id','$metin')";
    if($vt->query($sql) === false) 
    {
        printf("Hata mesajı: %s <br />\r\n", $vt->error);
        MesajUyari("Bir hata oluştu. Lütfen tekrar Deneyiniz...","makale_oku.php?makale_id=$makale_id");
    } 
    $vt->close();
    MesajUyari("Yorumunuz başarıyla eklenmiştir.","makale_oku.php?makale_id=$makale_id");
}
else
{
    MesajUyari("Bir problem oluştu...","makale_oku.php?makale_id=$makale_id");
}
?>