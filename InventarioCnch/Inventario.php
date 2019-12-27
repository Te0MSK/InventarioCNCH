<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Presentacion/css/estiloTable.css">
	<link rel="stylesheet" type="text/css" href="Presentacion/css/estiloInventario.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<title></title>
</head>
<body>
     


     <style>
  

body{

background-image: url(Presentacion/Imagenes/fondo.jpg);
background-repeat: no-repeat;
background-position: 0px 0px;
background-size: 1350px;



}






</style>



	<div class="container">



			<div class="main">	

				<div class="main-center">
				<h3><b><center>Gestor de Inventario Innovación</center></b></h3><br><br>
					<form class="" method="post" action="#" enctype="multipart/form-data">
						
						<div class="form-group">
							<label for="name">Nombre del producto</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
				<input type="text" id="Nombre" class="form-control" name="Nombre"   placeholder="" onkeyup = "this.value=this.value.toUpperCase()"/>
							</div>
						</div>

						<div class="form-group">
							<label for="cantidad">Cantidad</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" id="Cantidad" class="form-control" name="Cantidad" placeholder=""  onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;"/>
							</div>
						</div>

						<div class="form-group">
							<label for="fv">Fecha De Vencimiento</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="date" id="Fecha_Vencimiento" class="form-control" name="Fecha_Vencimiento" placeholder=""/>
								</div>
						</div>

                        <div class="form-group">
                            <label for="fv">Imágen</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="file" id="Imagen" class="form-control" name="Imagen" placeholder=""/>
                                </div>
                        </div>

                      



						<br>
						<br>

						

				<input type="submit" name="btnGuardar" class="btn btn-primary btn-lg" value="Guardar">

         <input type="submit" name="btnBuscar" class="btn btn-primary btn-lg" value="Buscar">
             <input type="submit" name="btnEliminar" class="btn btn-primary btn-lg" value="Eliminar">
             <input type="submit" name="btnActualizar" class="btn btn-primary btn-lg" value="Editar">








            

						
					</form>

				</div><!--main-center"-->
			</div><!--main-->
             <center><b><input type="button" name="btnSalir" class="btn btn-primary btn-lg" value="Salir" onclick="location.href='Login.php'" ></b></center>
		</div><!--container-->




		<?php
 

 

if(isset($_REQUEST['btnGuardar'])){
    include "Conexion/Conexion.php";
    
    $conexion=mysqli_connect($db_host,$db_usuario,$db_pw,$db_nombre);
    
   

    $NOMBRE=$_POST['Nombre'];
    $CANTIDAD=$_POST['Cantidad'];
    $FECHA_VENCIMIENTO=$_POST['Fecha_Vencimiento'];
    $NOMBRE_IMAGEN=$_FILES['Imagen']['name'];
   // $TIPO_IMAGEN=$FILES['Imagen']['type'];
    //$SIZE_IMAGEN=$FILES['Imagen']['size'];


    $CARPETA_DESTINO=$_SERVER['DOCUMENT_ROOT'] . '/InventarioCnch/Imagenes_bd/';

    move_uploaded_file($_FILES['Imagen']['tmp_name'], $CARPETA_DESTINO.$NOMBRE_IMAGEN);


   
    include "Negocio/CreateInventario.php";

     

    $resultado=mysqli_query($conexion,$consulta);
   
     
       if($resultado){
       
    echo '<div class="alert alert-success">';
    echo '<Strong>---------Registro completo!</Strong>Se ha registrado un producto correctamente.';
    echo '</div>';

    

}else{
     echo '<div class="alert alert-danger">';
    echo '<Strong>---------Ya existe el cliente!</Strong> No se ha registrado el producto..';
    echo '</div>';
}
   
    mysqli_close($conexion);



}   



?>

<?php
if (isset($_REQUEST['btnBuscar'])) {

include "Conexion/Conexion.php";
$conexion=mysqli_connect($db_host,$db_usuario,$db_pw,$db_nombre);

$NOMBRE=$_POST['Nombre'];
$NOMBRE_IMAGEN=$_FILES['Imagen']['name'];

$consulta ="SELECT * FROM Inventario ORDER BY Fecha_Vencimiento ASC  ";



$resultado=mysqli_query($conexion,$consulta);




echo '<table class="table table-bordered table-striped">';
echo '<thead>';
echo '<tr>'; 
echo '<th><center>NOMBRE</center></th>';
echo '<th><center>CANTIDAD</center></th>';
echo '<th><center>FECHA DE VENCIMIENTO</center></th>';
echo '<th><center>IMAGEN</center></th>';
echo '</tr>';
echo '</thead';


while($row = mysqli_fetch_array($resultado)) {
 
    $RUTA=$row['Nombre_Imagen'];
     
    
     echo '<tbody id="myTable">';
     echo '<thead>';
     echo '<tr>';
     echo '<td>'.$row['Nombre'].'</td>'; 
     echo '<td>'.$row['Cantidad'].'</td>';
     echo '<td>'.$row['Fecha_Vencimiento'].'</td>';
     echo '<td>'.'<img src="/InventarioCnch/Imagenes_bd/'.$RUTA.'"width="100" height="100"" />'.'</td>';
     echo '</tr>';
     echo '</thead';
     echo '</tbody>';



    
   

}



mysqli_close($conexion);
echo '<script src="Presentacion/js/filtracionTabla.js"></script>';


}
?>

 <?php  
if (isset($_REQUEST['btnEliminar'])) {

include "Conexion/Conexion.php";
$conexion=mysqli_connect($db_host,$db_usuario,$db_pw,$db_nombre);
$NOMBRE=$_POST['Nombre'];


include "Negocio/DeleteInventario.php";


$resultado=mysqli_query($conexion,$consulta);

 if($resultado){
       
    echo '<div class="alert alert-success">';
    echo '<Strong>---------Eliminacion completa!</Strong>Se ha eliminado un producto correctamente.';
    echo '</div>';

}else{
     echo '<div class="alert alert-danger">';
    echo '<Strong>---------No existe el producto!</Strong> No se ha borrado el producto..';
    echo '</div>';
}
   
    mysqli_close($conexion);


}   







 ?>

 <?php 

if (isset($_REQUEST['btnActualizar'])) {

include "Conexion/Conexion.php";
$conexion=mysqli_connect($db_host,$db_usuario,$db_pw,$db_nombre);
    $NOMBRE=$_POST['Nombre'];
    $CANTIDAD=$_POST['Cantidad'];
$FECHA_VENCIMIENTO=$_POST['Fecha_Vencimiento'];
  


include "Negocio/UpdateInventario.php";

    

$resultado=mysqli_query($conexion,$consulta);

if($resultado){
       
    echo '<div class="alert alert-success">';
    echo '<Strong>---------Modificacion completa!</Strong>Se ha modificado un producto correctamente.';
    echo '</div>';

}else{
     echo '<div class="alert alert-danger">';
    echo '<Strong>---------No existe el producto!</Strong><br>---------No se ha modificado el producto.. Recuerde usar un Nombre valido';
    echo '</div>';
}
$consulta1 ="SELECT * FROM inventario WHERE Nombre='$NOMBRE'" ;

$resultado1=mysqli_query($conexion,$consulta1);


echo '<table class="table table-bordered table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>NOMBRE</th>';
echo '<th>CANTIDAD</th>'; 
echo '<th>FECHA DE VENCIMIENTO</th>';
echo '<th><center>IMAGEN</center></th>';
echo '</tr>';
echo '</thead';


if ($row = mysqli_fetch_array($resultado1)) {

    $RUTA=$row['Nombre_Imagen'];

      echo '<tbody id="myTable">';
     echo '<tr>';
     echo '<td>'.$row['Nombre'].'</td>';
     echo '<td>'.$row['Cantidad'].'</td>';
     echo '<td>'.$row['Fecha_Vencimiento'].'</td>';
     echo '<td>'.'<img src="/InventarioCnch/Imagenes_bd/'.$RUTA.'"width="100" height="100"" />'.'</td>';
     echo '</tr>';
     echo '</tbody>';



    
   

}

mysqli_close($conexion);
echo '</table>';
echo '<script src="Presentacion/js/filtracionTabla.js"></script>';
} 



  ?>






</body>
</html>