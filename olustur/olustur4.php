<?php
/*
$vtSunucu = 'localhost';
$vtKullanici   = 'root';
$vtSifre   = '';
$db='yazilim';

$vt = new mysqli($vtSunucu, $vtKullanici, $vtSifre,$db);
$karakter = $vt->set_charset("utf8");
if (!$vt->set_charset("utf8")) {
    printf("Karakter seti utf8 olarak ayarlarken hata oluþtu. Hata: %s\r\n <BR /> \r\n", $vt->error);
}

$sorgu = "INSERT INTO makale (makale_id, yukleyen, konu, yol, zaman, ozeti) VALUES
(58, 'a', 'uu', 'klasor/dosyalar/1OgretimVizeNotlari.pdf', '05.19.14', 'uu'),
(59, 'a', 'aaa', 'klasor/dosyalar/1OgretimVizeNotlari.pdf', '05.19.14', 'aaa'),
(60, 'a', 'sdsd', 'klasor/dosyalar/12.gulsoy.pdf', '05.19.14', 'dsds'),
(61, 'a', 'dfdfd', 'klasor/dosyalar/Egitsel_Yazilim_Grup_Projesi.pdf', '05.19.14', 'dfd')";


$sorgu=$vt->query($sorgu);

if ($sorgu) { */
  	echo "<a href='olustur5.php'>İleri</a>";
/*
        
}
else
{
  	echo "Makaleler Eklenemedi";
  	trigger_error('Yanlış SQL sorgusu: ' . $sorgu . ' Hata: ' . $vt->error, E_USER_ERROR);
    
}

*/
?>