<?php 


if(trim($NOMBRE) == ''){

echo '<div class="alert alert-danger">';
    echo '<Strong>---------Nombre obligatorio!</Strong>Porfavor ingrese el nombre del producto a modificar.';
    echo '</div>'; 
    exit();
}
else{


   $consulta ="UPDATE inventario SET Cantidad='$CANTIDAD' WHERE Nombre='$NOMBRE'" ;



}





 ?>