<?php

	include "vt_baglan.php";
	error_reporting(0);
	$kullanici_adi=$_SESSION['kullanici'];

	$puan			= @$_POST["puan"];
	$makale_id		= trim($_POST["makale_id"]);
	$yol			= @$_POST["yol"];
	


	if ($puan!=null) {
		
		$sql="INSERT INTO puan(kullanici,makale,puan) values('$kullanici_adi','$makale_id','$puan')";

		if ($sql) {
			MesajUyari("Puan Verme İşleminiz Başarıya Gerçekleşmiştir...","makale_oku.php?yol=$yol&makale_id=$makale_id");
		}

		if($vt->query($sql) === false) 
		{
			printf("Hata mesajı: <br/>\r\n", $vt->error);
			MesajUyari("Tekrar Deneyiniz...","makale_oku.php?yol=$yol&makale_id=$makale_id");
		} 
		$vt->close();
	}

	else
	{
		MesajUyari("Lütfen puan giriniz...","makale_oku.php?yol=$yol&makale_id=$makale_id");

	}

	

?>