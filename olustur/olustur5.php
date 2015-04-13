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

$sorgu = "INSERT INTO puan (kullanici, makale, puan) VALUES
('a', 58, 6),
('a', 59, 7),
('a', 61, 8);";

$sorgu=$vt->query($sorgu);

if ($sorgu) {
  	echo "Puanlar Eklendi <a href='olustur6.php'>İleri</a>";
}
else
{
  	echo "Puanlar Eklenemedi";
  	trigger_error('Yanlış SQL sorgusu: ' . $sorgu . ' Hata: ' . $vt->error, E_USER_ERROR);
    
}


?>