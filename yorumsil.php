<?php
session_start();
include "vt_baglan.php";
include "fonksiyonlar.inc";
$kullanici_adi  = $_SESSION['kullanici'];
$makale_id	= $_POST["makale_id"];
$tarih          = $_POST['tarih'];

$sql="DELETE FROM yorum WHERE makale = '$makale_id' AND tarih = '$tarih'";
    if($vt->query($sql) === false) { // Yorumu silerken hata oluştuysa
            printf("Hata mesajı: %s <br />\r\n", $vt->error);
            echo $sql;
    } else {
            $vt->close();
            MesajUyari("Silme İşlemi Başarıyla Gerçekleşti...","makale_oku.php?makale_id=$makale_id");
    }
?>

