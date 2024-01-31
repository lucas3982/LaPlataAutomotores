<!--acomodar unidades-->
<?php 

include("../../bd.php");


//con esto se borra el registro con el ID correspondiente
if(isset($_GET['txtid'])) {

$txtid=(isset($_GET['txtid']))?$_GET['txtid']: "";//recivo el dato que no este vacio, lo asigno si existe si no lo dejo en vacio


//con esto voy a borra los datos de img
$sentencia=$conexion->prepare("SELECT imagen FROM tb_unidades WHERE id=:id");
$sentencia->bindParam(":id", $txtid); //recepciono el dato       
$sentencia->execute();
$registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

if(isset($registro_imagen["imagen"])) {
    if(file_exists("../../../img/".$registro_imagen["imagen"])){
       unlink("../../../img/".$registro_imagen["imagen"]);
    }
}

//con esto voy a borra los datos de img


$sentencia=$conexion->prepare("DELETE FROM tb_unidades WHERE id=:id");
$sentencia->bindParam(":id", $txtid); //recepciono el dato
        
$sentencia->execute();

//con esto se borra el registro con el ID correspondiente
}


//con este selecciono toda la tabla de servicios el asterisco representa los campos(slect*from)seleccioname todos los campos de la tb_unidades
$sentencia=$conexion->prepare("SELECT * FROM `tb_unidades`");
$sentencia->execute();
$lista_unidades=$sentencia->fetchAll(PDO::FETCH_ASSOC);



include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" role="role" name="" id="" href="crear.php">Agregar Unidad</a>
        
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Marca y Version</th>
                        <th scope="col">Año</th>
                        <th scope="col">Km</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_unidades as $registros) { ?>
                       
                    
                    <tr class="">
                        <td><?php echo $registros['id'];?></td>

                        <td>
                            <img width="60" src="../../../img/<?php echo $registros['imagen'];?>" />
                            </td>

                        <td><?php echo $registros['Marca'];?></td>
                        <td><?php echo $registros['Año'];?></td>
                        <td><?php echo $registros['Km'];?></td>
                        <td>
                            <a name="" id="" class="btn btn-success" href="editar.php?txtid=<?php echo $registros['id']; ?>" role="button">Editar</a>
                            |
                            <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros['id']; ?>" role="button">Eliminar</a>
                            
                        </td>
                    </tr>

                    <?php }?>
                    
                </tbody>
            </table>
        </div>
    </div>

</div>


<?php include("../../templates/footer.php");