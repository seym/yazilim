<?php
$vtSunucu = 'localhost';
$vtKullanici   = 'root';
$vtSifre   = '';
$vt = new mysqli($vtSunucu, $vtKullanici, $vtSifre);

$karakter = $vt->set_charset("utf8");
if (!$vt->set_charset("utf8")) {
    printf("Karakter seti utf8 olarak ayarlarken hata oluþtu. Hata: %s\r\n <BR /> \r\n", $vt->error);
}

$sorgu = "CREATE DATABASE IF NOT EXISTS yazilim DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci";

$sorgu=$vt->query($sorgu);

if ($sorgu) {
  echo "Veri Tabanı Oluşturuldu. <a href='olustur2.php'>İleri</a>";
}
else
{
  echo "Veri Tabanı Oluşturulamadı";
trigger_error('Yanlış SQL sorgusu: ' . $sorgu5 . ' Hata: ' . $vt->error, E_USER_ERROR);
}


?>