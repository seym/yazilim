<?php
session_start();
//error_reporting(0);
include "vt_baglan.php";
include "fonksiyonlar.inc";

$kul_adi= $vt->real_escape_string($_POST["kul_adi"]);
$sifre=sha1($_POST['sifre']);

$sql="SELECT * FROM uyeler WHERE kullanici_id like '$kul_adi' AND sifre like '$sifre' ";
$sonuc =    $vt->query($sql);

if($sonuc->num_rows > 0)
{	
    $satir = $sonuc->fetch_assoc();
    $ad = $satir["ad"];
    $soyad = $satir["soyad"];
    $_SESSION['kullanici']= $kul_adi;
        // İşimiz bittiğinde sonucu silelim.
    $sonuc->free();
    // Bağlantıyı kapatalım. 
    $vt->close();
    MesajUyari("Hoşgeldiniz: ".$ad." ".$soyad,"index.php");
}
else 
{
    // İşimiz bittiğinde sonucu silelim.
    $sonuc->free();
    // Bağlantıyı kapatalım. 
    $vt->close();
    MesajUyari("Şifre veya kullanıcı adınız hatalı Lütfen tekrar deneyiniz","index.php");
}
?>