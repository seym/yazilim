<?php

function MesajUyari($mesaj,$url){

//		header('Location:index.php?sayfa=giris');
                echo "<script type=\"text/javascript\"> alert(\"$mesaj\"); window.location.href='$url';  </script> ";
}
?>
