<?php

	include "vt_baglan.php";
	error_reporting(0);
	$kullanici_adi=@$_SESSION['kullanici'];

	$yorum			= @trim(($_POST["yorum"]));
	$makale_id		= @trim(($_POST["makale_id"]));

	if ($yorum!="" And $makale_id!="" And $kullanici_adi!="") {
		
		$sql="INSERT INTO yorum(yapan,makale,yorum,tarih) values('$kullanici_adi','$makale_id','$yorum')";
		
		if ($sql) {
			MesajUyari("Yorumunuz onaylandıktan sonra yayınlanacaktır...","makale_oku.php?id=$makale_id");
		}
		
		if($vt->query($sql) === false) 
		{
			printf("Hata mesajı: %s <br />\r\n", $vt->error);
			MesajUyari("Tekrar Deneyiniz...","makale_oku.php?id=$makale_id");
		} 
		$vt->close();
	}

	else
	{
		MesajUyari("Tekrar Deneyiniz...","makale_oku.php?id=$makale_id");

	}

	

?>