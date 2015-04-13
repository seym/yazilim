<?php
$vtSunucu = 'localhost';
$vtKullanici   = 'root';
$vtSifre   = '';
$db='yazilim';

$vt = new mysqli($vtSunucu, $vtKullanici, $vtSifre,$db);
$karakter = $vt->set_charset("utf8");
if (!$vt->set_charset("utf8")) {
    printf("Karakter seti utf8 olarak ayarlarken hata oluþtu. Hata: %s\r\n <BR /> \r\n", $vt->error);
}

$sorgu = "INSERT INTO yorum (yapan, makale, tarih, yorum) VALUES
('a', 58, '2014-05-19 23:04:15', 'dsdsd<br>'),
('a', 60, '2014-05-19 23:00:34', 'rfgfg')";


$sorgu=$vt->query($sorgu);

if ($sorgu) {
  	echo "Yorumlar Eklendi <a href='olustur7.php'>İleri</a>";
}
else
{
  	echo "Yorumlar Eklenemedi";
  	trigger_error('Yanlış SQL sorgusu: ' . $sorgu . ' Hata: ' . $vt->error, E_USER_ERROR);

    
}


?>