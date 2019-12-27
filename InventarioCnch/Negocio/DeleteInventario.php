<?php

if (empty($NOMBRE)) {
    
     echo '<div class="alert alert-danger">';
    echo '<Strong>---------Nombre del producto obligatorio!</Strong> Porfavor ingrese el nombre del producto.';
    echo '</div>'; 
   
   exit();
    
}else{



	$consulta ="DELETE  FROM Inventario WHERE Nombre='$NOMBRE'" ;

}