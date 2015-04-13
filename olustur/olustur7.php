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

$sorgu =  "ALTER TABLE mesajlar
  ADD CONSTRAINT fk_mesajlar_uyeler1 FOREIGN KEY (kimden) REFERENCES uyeler (kullanici_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_mesajlar_uyeler2 FOREIGN KEY (kime) REFERENCES uyeler (kullanici_id) ON DELETE NO ACTION ON UPDATE NO ACTION";


$sorgu1 = "ALTER TABLE puan
  ADD CONSTRAINT puan_ibfk_1 FOREIGN KEY (makale) REFERENCES makale (makale_id),
  ADD CONSTRAINT puan_ibfk_2 FOREIGN KEY (kullanici) REFERENCES uyeler (kullanici_id)";

$sorgu2 = "ALTER TABLE yorum
  ADD CONSTRAINT fk_uyeler_has_makale_uyeler1 FOREIGN KEY (yapan) REFERENCES uyeler (kullanici_id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT makale_idd FOREIGN KEY (makale) REFERENCES makale (makale_id)";


$sorgu=$vt->query($sorgu);

if ($sorgu and $sorgu2) {
  	echo "Bağlantılar Kuruldu <a href='../index.php'>İleri</a>";
}
else
{
  	echo "Bağlantılar Kurululamadı";
  	trigger_error('Yanlış SQL sorgusu: ' . $sorgu . ' Hata: ' . $vt->error, E_USER_ERROR);
  	trigger_error('Yanlış SQL sorgusu: ' . $sorgu2 . ' Hata: ' . $vt->error, E_USER_ERROR);
    
}


?>