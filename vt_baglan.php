<?php
$vtSunucu = 'localhost';
$vtKullanici   = 'root';
$vtSifre   = '';
$vtAd   = 'yazilim';

$vt = new mysqli($vtSunucu, $vtKullanici, $vtSifre, $vtAd);
 
// Bağlan
if ($vt->connect_error) {
  trigger_error('Veri tabanına bağlanılamadı: '  . $vt->connect_error, E_USER_ERROR);
}

// Karakter setini utf8 olarak ayarlayalım
if (!$vt->set_charset("utf8")) {
    printf("Karakter seti utf8 olarak ayarlarken hata oluştu. Hata: %s\r\n <BR /> \r\n", $vt->error);
}



?>