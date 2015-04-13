<?php
include "vt_baglan.php";

//error_reporting(0);
$kul_adi =$_SESSION['kullanici'];

         // $kul_adi = stripcslashes($kul_adi);
//echo $kul_adi;

?>
<?php
		
		@$konu=addslashes($_POST["konu"]);
		@$ozet=addslashes($_POST["ozet"]);
		$tarih=date("m.d.y");  
		  
	$kaynak=@$_FILES["dosya"]["tmp_name"];
	$dosya_adi=@$_FILES["dosya"]["name"];
	$dosya_boyut=@$_FILES["dosya"]["size"];

	$gecerli = array("pdf","docx","txt");
	$uzanti=@end(explode(".",@$_FILES["dosya"]["name"]));
	$yol="klasor/dosyalar";
	$yeni_ad=preg_replace("/[^A-Z0-9._-]/i", "_", basename(@$_FILES["dosya"]["name"]));
	$son_ad=$yeni_ad;

;
				if ($dosya_adi) 
			{
			if(in_array($uzanti, $gecerli))
				{
		 		 $yukle=move_uploaded_file($kaynak,$yol."/".$son_ad);
		  		 $url=$yol."/".$son_ad;
		  		 	

      			if ($dosya_boyut<1024*1024*2)
				{
					
						$sql="INSERT INTO makale(makele_id,yukleyen,konu,yol,zaman,ozeti) values(null, '$kul_adi', '$konu', '$url','$tarih','$ozet')"; 	
						


					if($vt->query($sql) === false) 
						{
							printf("Hata mesajý: %s <br />\r\n", $vt->error);
						} 
		else 
		{
			
			MesajUyari("Makale Ekleme Yükleme basarıyla gerceklesti","makale_ana.php?");  
		}
				
					$vt->close();
						
				
				}
				else 
				{

MesajUyari("Dosya Boyutu cok Fazla. Lütfen Tekrar Deneyin...","makale_paylas.php"); 	

				}

				
		}
		else
		{
			MesajUyari("Geçersiz dosya uzantisi . Lütfen Tekrar Deneyin...","makale_paylas.php"); 
		}
	}			
	
	?>