<?php 

if (empty($NOMBRE)) {
    
     echo '<div class="alert alert-danger">';
    echo '<Strong>---------Nombre del producto obligatorio !</Strong>Porfavor ingrese el nombre del producto.';
    echo '</div>'; 
   
   exit();
    
}else{


if(trim($NOMBRE) == ''){

echo '<div class="alert alert-danger">';
    echo '<Strong>---------Nombre obligatorio!</Strong>Porfavor ingrese su nombre.';
    echo '</div>'; 
    exit();
}else{



if(trim($CANTIDAD) == ''){

echo '<div class="alert alert-danger">';
    echo '<Strong>---------Cantidad obligatorio!</Strong>Porfavor ingrese la cantidad.';
    echo '</div>'; 
    exit();
}else{


include "Conexion/Conexion.php";
 
  $conexion=mysqli_connect($db_host,$db_usuario,$db_pw,$db_nombre);
 $NOMBRE=$_POST['Nombre'];
$result =mysqli_query($conexion,"SELECT * FROM Inventario WHERE Nombre='$NOMBRE'");
$rows=mysqli_num_rows($result);

 if($rows>0)
 {
     
   echo '<div class="alert alert-danger">';
    echo '<Strong>El Producto ya existe !</Strong>';
    echo '</div>'; 
   exit();
     
 }
else{

if(empty($FECHA_VENCIMIENTO)){

    $FECHA_VENCIMIENTO="9999-09-09";
$consulta="INSERT INTO Inventario   VALUES('$NOMBRE','$CANTIDAD','$FECHA_VENCIMIENTO','$NOMBRE_IMAGEN')";

}else{

$consulta="INSERT INTO Inventario   VALUES('$NOMBRE','$CANTIDAD','$FECHA_VENCIMIENTO','$NOMBRE_IMAGEN')";
}
}


}




}
}
 ?>