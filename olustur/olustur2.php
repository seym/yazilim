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


$sorgu = "CREATE TABLE IF NOT EXISTS makale (
  makale_id int(11) NOT NULL AUTO_INCREMENT,
  yukleyen varchar(45) NOT NULL,
  konu varchar(255) NOT NULL,
  yol varchar(255) NOT NULL,
  zaman varchar(45) DEFAULT NULL,
  ozeti varchar(255) DEFAULT NULL,
  PRIMARY KEY (makele_id),
  KEY fk_makale_uyeler1 (yukleyen)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62";

$sorgu2 = "CREATE TABLE IF NOT EXISTS mesajlar (
  kimden varchar(45) NOT NULL,
  kime varchar(45) NOT NULL,
  mesaj text NOT NULL,
  durum tinyint(1) NOT NULL DEFAULT '0',
  tarih datetime NOT NULL,
  PRIMARY KEY (kimden,kime),
  KEY fk_mesajlar_uyeler2 (kime)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$sorgu3 = "CREATE TABLE IF NOT EXISTS puan (
  kullanici varchar(50) NOT NULL,
  makale int(11) NOT NULL,
  puan int(11) NOT NULL,
  PRIMARY KEY (kullanici,makale),
  KEY makale (makale)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$sorgu4 = "CREATE TABLE IF NOT EXISTS uyeler (
  kullanici_id varchar(45) NOT NULL,
  sifre varchar(255) NOT NULL,
  ad varchar(45) NOT NULL,
  ikinci_ad varchar(45) DEFAULT NULL,
  soyad varchar(45) NOT NULL,
  e_posta varchar(45) NOT NULL,
  soru varchar(45) NOT NULL,
  cevap varchar(45) NOT NULL,
  il varchar(45) DEFAULT NULL,
  egitim varchar(45) DEFAULT NULL,
  PRIMARY KEY (kullanici_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$sorgu5 = "CREATE TABLE IF NOT EXISTS yorum (
  yapan varchar(45) NOT NULL,
  makale int(11) NOT NULL,
  tarih datetime NOT NULL,
  yorum varchar(255) NOT NULL,
  PRIMARY KEY (yapan,makale,tarih),
  KEY makale_idd (makale)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";




$sorgu=$vt->query($sorgu);
$sorgu2=$vt->query($sorgu2);
$sorgu3=$vt->query($sorgu3);
$sorgu4=$vt->query($sorgu4);
$sorgu5=$vt->query($sorgu5);


if ($sorgu) {
  echo "Tablolar Oluşturuldu. <a href='olustur3.php'>İleri</a>";
}
else
{
  echo "Tablolar Oluşturulamadı";
trigger_error('Yanlış SQL sorgusu: ' . $sorgu . ' Hata: ' . $vt->error, E_USER_ERROR);
trigger_error('Yanlış SQL sorgusu: ' . $sorgu2 . ' Hata: ' . $vt->error, E_USER_ERROR);
trigger_error('Yanlış SQL sorgusu: ' . $sorgu3 . ' Hata: ' . $vt->error, E_USER_ERROR);
trigger_error('Yanlış SQL sorgusu: ' . $sorgu4 . ' Hata: ' . $vt->error, E_USER_ERROR);
trigger_error('Yanlış SQL sorgusu: ' . $sorgu5 . ' Hata: ' . $vt->error, E_USER_ERROR);
}


?>