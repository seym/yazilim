
<?php
error_reporting(0);
include "vt_baglan.php";
$posta=addslashes($_POST["posta"]);

@$kul_adi=trim(addslashes($_POST['kullanici2']));
@$cevap=trim(addslashes($_POST['cevap']));

?>


<?php

function rasgeleharf($kackarakter) 
{ 
$char="abcdefghijklmnoprstuwvyzqxABCDEFGHIJKLMNOPRSTUVWYZQX1234567890"; /// a dan z ye verilen karakterler ? 
for ($k=1;$k<=$kackarakter;$k++) 
{ 
$h=substr($char,mt_rand(0,strlen($char)-1),1); 

@$s=$h.$s; 
} 

return $s;
}  
$yeni_sifre=rasgeleharf(8);
$sifre2=$yeni_sifre;

$yeni_sifre=sha1($yeni_sifre);
//echo "$posta"."<br>";
//echo "$cevap"."<br>";
//echo "$kul_adi"."<br>";

$sql ="UPDATE uyeler SET sifre='$yeni_sifre' WHERE kullanici_id='$kul_adi' and cevap='$cevap'";
	$sonuc=$vt->query($sql);
	if($vt->query($sql) === false) 
			{
				printf("Hata mesajı: %s <br />\r\n", $vt->error);
				MesajUyari("Şifreniz değiştirilemedi Lütfen Tekrar Deneyiniz...","index.php?");
			} 

else{



// http://www.php.net/manual/en/ref.mail.php adresinden alinmistir. 
// MAIL.php dosyasini dosyamiza dahil etmemiz gerekiyor. 
require_once 'XPMail/MAIL.php';
$m = new MAIL; // Mail sinifini baslat
$m->From('ornekhesap@gmail.com', 'Yazılım Defteri'); // Kimden gönderilecek
$m->AddTo("$posta", "$kullanici2"); // Kime gönderilecek
$m->Subject('Şifre Değiştirme : Yazılım Defteri'); // Konu
// Mesaj (html kodu da kullanabilirsiniz) (text/html)

$m->HTML('<b>YENi   ŞİFRENİZ :   '."$sifre2".  '</b>');
 
/*
$c ismini verdigimiz bir baglanti iÃ§in ayarlarini yapiyoruz. ePosta Transfer uygulamasinin yÃ¼klÃ¼ oldugu
sunucunun adresi 'smtp.gmail.com', baglanacagimiz port '465', SSL yani 'tls' kodlamasini kullanacagiz
baglanti iÃ§in kullanici hesabi 'kullanici@gmail.com' ve 'parola' gereklidir. Baglanti 10 saniye iÃ§erisinde
kurulamazsa hata verecektir, baglandigimiz sunucunun ismi 'localhost' onaylama iÃ§in 'plain'i kullaniyoruz.
Ayrica, php uzantilarindan OpenSSL modÃ¼lÃ¼ yÃ¼klÃ¼ olmalidir. Yoksa hata verir. 

*/


$c = $m->Connect('smtp.gmail.com', 465, 'ornekhesap@gmail.com', 'sifresi','tls', 10, 'localhost', null, 'plain') or die(print_r($m->Result));

// '$c' ismini verdigimiz baglantiyla maili gönder....
 $m->Send($c) ? 'ePostanıza şifre basarıyla gönderildi' : 'HATA!!!';
 MesajUyari("Şifreniz Başarıyla Değiştirildi Lütfen Anasayfadan Giriş Yapınız...","index.php");

// Sunucuyla baglantiyi kes...
$m->Disconnect();

}

?>