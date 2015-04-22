<?php
$vtSunucu = 'localhost';
$vtKullanici   = 'root';
$vtSifre   = '';
$vtAd   = 'yazilim';

$vt = new mysqli($vtSunucu, $vtKullanici, $vtSifre, $vtAd);
// Bağlan
if ($vt->connect_error) {
  echo "Veri tabanına bağlanılamadı: ". $vt->connect_error;
}

// Karakter setini utf8 olarak ayarlayalım
$vt->set_charset("utf8");
if ($vt->error) {
  echo "Veri tabanı karakter seti ayalanamadı!: ". $vt->error;
}
?>