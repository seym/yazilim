<?php
	include "vt_baglan.php";
	
	$kullanici_adi= trim(stripcslashes($_SESSION['kullanici']));
	
	
	$makale_id		= @trim($_POST["makale_id"]);
	$tarih			=@$_POST['tarih'];
$yol    		=@$_POST["yol"];


	$sql="DELETE FROM yorum WHERE makale = '$makale_id' AND tarih = '$tarih'";
		if($vt->query($sql) === false) { // Yorumu silerken hata oluştuysa
			printf("Hata mesajı: %s <br />\r\n", $vt->error);
			echo $sql;
		} else {
			$vt->close();
			MesajUyari("Silme İşlemi Başarıyla Gerçekleşti...","makale_oku.php?yol=$yol&makale_id=$makale_id");
			
			
		}
?>

