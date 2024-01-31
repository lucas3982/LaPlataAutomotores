<?php 

include("../../bd.php");

if($_POST) {

   

    //recepcionamos los valores de formulario

        $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
        $Marca=(isset($_POST['Marca']))?$_POST['Marca']:"";
        $Año=(isset($_POST['Año']))?$_POST['Año']:"";
        $Km=(isset($_POST['Km']))?$_POST['Km']:"";


        //con esto lo que voy hacer es adjuntar las imagenes a la carpeta de img las cuales van a ser utilizadas en la pagina
        $fecha_imagen=new DateTime();
        $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";

        $tmp_imagen=$_FILES["imagen"]["tmp_name"];
        if($tmp_imagen!="") {
            move_uploaded_file($tmp_imagen, "../../../img/".$nombre_archivo_imagen);
        }



    //hago una ejecucion de insercion
    $sentencia=$conexion->prepare("INSERT INTO `tb_unidades` (`id`, `imagen`, `Marca`, `Año`, `Km`) 
    VALUES (NULL, :imagen, :Marca, :Anio, :Km);");

        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->bindParam(":Marca", $Marca);
        $sentencia->bindParam(":Anio", $Año);
        $sentencia->bindParam(":Km", $Km);

        try {
            $sentencia->execute();
            $mensaje = "Unidad agregada con Éxito";
            header("location:index.php?mensaje=$mensaje");
            //exit();
        } catch (PDOException $e) {
            echo "Error durante la ejecución de la consulta: " . $e->getMessage();
        }
    }
    
    include("../../templates/header.php");

        //$sentencia->execute();
        

        //con esto regreso a la edicion a la tabla original
        //$mensaje="Unidad agregada con Exito";
       // header("location:index.php?mensaje=$mensaje");

?>

<div class="card">
    <div class="card-header">
        Agregar Unidad
    </div>

    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data"> <!-- enctype sirve para información y archivos -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen">
                    
            </div>

            <div class="mb-3">
                <label for="Marca" class="form-label">Marca y Versión:</label>
                    <input type="text" class="form-control" name="Marca" id="Marca" aria-describedby="helpId" placeholder="Marca y Versión">
                    
            </div>

            <div class="mb-3">
                <label for="Año" class="form-label">Año:</label>
                    <input type="text" class="form-control" name="Año" id="Año" aria-describedby="helpId" placeholder="Año">
                    
            </div>

            <div class="mb-3">
                <label for="Km" class="form-label">Km:</label>
                    <input type="text" class="form-control" name="Km" id="Km" aria-describedby="helpId" placeholder="Km">
                    
            </div>

            <button type="submit" class="btn btn-success">Agregar</button> <!--tipo submit se utiliza para cuando queremos enviar información-->
            <a name="" id="" href="index.php" role="button" class="btn btn-primary">Cancelar</a>    <!--con la etiqueta a nos permite cancelar-->
        </form>
    </div>

    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("../../templates/footer.php");?> 