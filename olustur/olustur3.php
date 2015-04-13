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

$sorgu = "INSERT INTO uyeler (kullanici_id, sifre, ad, ikinci_ad, soyad, e_posta, soru, cevap, il, egitim) VALUES
('a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'a', 'a', 'a', 'k@hotmail.com', 'a', 'a', 'a', 'a'),
('internet', '83592796bc17705662dc9a750c8b6d0a4fd93396', 'ahmet', 'feyazi', 'satıcı', 'kral_sezgin_1905@hotmail.com', 'aaaa', 'aaaa', 'aaaa', 'aaaa')";


$sorgu=$vt->query($sorgu);

if ($sorgu) {
  	echo "Üyeler Eklendi <a href='olustur4.php'>İleri</a>";
}
else
{
  	echo "Üyeler Eklenemedi";
  	trigger_error('Yanlış SQL sorgusu: ' . $sorgu . ' Hata: ' . $vt->error, E_USER_ERROR);
    
}


?>