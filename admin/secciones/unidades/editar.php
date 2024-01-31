<!--editar unidades-->



<?php 

include("../../bd.php");

//con esto se edita el registro con el ID correspondiente
if(isset($_GET['txtid'])) {

    $txtid=(isset($_GET['txtid']))?$_GET['txtid']: "";//recupero los datos del ID correspondiente (seleccionado)
    
    $sentencia=$conexion->prepare("SELECT * FROM tb_unidades WHERE id=:id");
    $sentencia->bindParam(":id", $txtid); //recepciono el dato
    $sentencia->execute();

    //almaceno los datos en una variable
    $registro=$sentencia->fetch(PDO::FETCH_ASSOC); //recupera el dato de registro, el fetch nos sirve para obtener la seleccion que hemos hecho

        $imagen=$registro['imagen'];
        $Marca=$registro['Marca'];
        $Año=$registro['Año'];
        $Km=$registro['Km'];
    //con esto se edita el registro con el ID correspondiente
    }

    if($_POST) {
        

        $txtid = (isset($_POST['txtid'])) ? $_POST['txtid'] : "";

        $Marca = (isset($_POST['Marca'])) ? $_POST['Marca'] : "";
        $Año = (isset($_POST['Año'])) ? $_POST['Año'] : "";
        $Km = (isset($_POST['Km'])) ? $_POST['Km'] : "";

        //hago una ejecucion de insercion
       
            // Ejecución de la actualización
            $sentencia = $conexion->prepare("UPDATE tb_unidades SET imagen=:imagen, Marca=:Marca, Año=:Anio, Km=:Km WHERE id=:id ");
            $sentencia->bindParam(":imagen", $imagen);
            $sentencia->bindParam(":Marca", $Marca);
            $sentencia->bindParam(":Anio", $Año);
            $sentencia->bindParam(":Km", $Km);
            $sentencia->bindParam(":id", $txtid);

            $sentencia->execute();



        if($_FILES["imagen"]["name"]!="") {

            $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
            //con esto lo que voy hacer es adjuntar las imagenes a la carpeta de img las cuales van a ser utilizadas en la pagina
            $fecha_imagen=new DateTime();
            $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";

            $tmp_imagen=$_FILES["imagen"]["tmp_name"];
        
            move_uploaded_file($tmp_imagen, "../../../img/".$nombre_archivo_imagen);

            
//borrado dela archivo anterior
$sentencia=$conexion->prepare("SELECT imagen FROM tb_unidades WHERE id=:id");
$sentencia->bindParam(":id", $txtid); //recepciono el dato       
$sentencia->execute();
$registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

if(isset($registro_imagen["imagen"])) {
    if(file_exists("../../../img/".$registro_imagen["imagen"])){
       unlink("../../../img/".$registro_imagen["imagen"]);
    }
}

//borrado del archivo anterior
        

        $sentencia = $conexion->prepare("UPDATE tb_unidades SET imagen=:imagen WHERE id=:id ");
        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->bindParam(":id", $txtid);
        $sentencia->execute();
    }

            

        //con esto regreso a la edicion a la tabla original
        $mensaje="Modificación Exitosa";
        header("location:index.php?mensaje=$mensaje");
    
            
    }
    

include("../../templates/header.php");?>


<div class="card">
    <div class="card-header">
        Editar información de la Unidad
    </div>

    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data"> <!-- enctype sirve para información y archivos -->

            <div class="mb-3">
                <label for="" class="form-label">ID:</label>
                <input readonly value="<?php echo $txtid;?>" type="text" class="form-control" name="txtid" id="txtid" 
                aria-describedby="helpId" placeholder="ID">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img width="60" src="../../../img/<?php echo $imagen;?>" />
                <input value="<?php echo $imagen;?>" type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen">
                    
            </div>

            <div class="mb-3">
                <label for="Marca" class="form-label">Marca y Versión:</label>
                    <input value="<?php echo $Marca;?>" type="text" class="form-control" name="Marca" id="Marca" aria-describedby="helpId" placeholder="Marca y Versión">
                    
            </div>

            <div class="mb-3">
                <label for="Año" class="form-label">Año:</label>
                    <input value="<?php echo $Año;?>" type="text" class="form-control" name="Año" id="Año" aria-describedby="helpId" placeholder="Año">
                    
            </div>

            <div class="mb-3">
                <label for="Km" class="form-label">Km:</label>
                    <input value="<?php echo $Km;?>" type="text" class="form-control" name="Km" id="Km" aria-describedby="helpId" placeholder="Km">
                    
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button> <!--tipo submit se utiliza para cuando queremos enviar información-->
            <a name="" id="" href="index.php" role="button" class="btn btn-primary">Cancelar</a>    <!--con la etiqueta a nos permite cancelar-->
        </form>
    </div>

    <div class="card-footer text-muted">
        
    </div>
</div>






<?php include("../../templates/footer.php");?>