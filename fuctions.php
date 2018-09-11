<?php

function verificar_sesion() {

	if( !isset ($_SESSION['clave']) ){
        unset($_SESSION);
       header("location:error_sesion.html") ;
	}
}

?>
