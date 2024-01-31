<!--acomodar portafolio-->



<?php 
include("../../bd.php");

if(isset($_GET['txtid'])) {

    $txtid=(isset($_GET['txtid']))?$_GET['txtid']: "";//recupero los datos del ID correspondiente (seleccionado)



    //con esto voy a borra los datos de img
$sentencia=$conexion->prepare("SELECT img1, img2, img3, img4, img5, img6 FROM tb_portafolio WHERE id_unidad=:id");
$sentencia->bindParam(":id", $txtid); //recepciono el dato       
$sentencia->execute();
$registro_imagen=$sentencia->fetch(PDO::FETCH_ASSOC);


for ($i = 1; $i <= 6; $i++) {
    $imagen_key = "img" . $i;
    
    if (isset($registro_imagen[$imagen_key])) {
        $ruta_imagen = "../../../img/" . $registro_imagen[$imagen_key];

        
    }
}

    }


$sentencia=$conexion->prepare("DELETE FROM tb_portafolio WHERE id_unidad=:id");
$sentencia->bindParam(":id", $txtid); //recepciono el dato       
$sentencia->execute();



// Con este código seleccionas toda la tabla de servicios
$sentencia = $conexion->prepare("SELECT * FROM `tb_portafolio`");
$sentencia->execute();
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Incluyes el archivo header
include("../../templates/header.php");

?>

<div class="card">
    <div class="card-header">
    <a class="btn btn-primary" role="role" name="" id="" href="crear.php">Agregar Unidad</a>
    </div>

        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id_unidad</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">img1</th>
                            <th scope="col">img2</th>
                            <th scope="col">img3</th>
                            <th scope="col">img4</th>
                            <th scope="col">img5</th>
                            <th scope="col">img6</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($lista_portafolio as $registros) { ?>

                        <tr class="">
                            <td scope="col"><?php echo $registros['id_unidad'];?></td>
                            <td scope="col"><?php echo $registros['Descripcion'];?></td>

                            <td scope="col">
                                <img width="60" src="../../../img/<?php echo $registros['img1'];?>" alt="">
                                </td>
                            <td scope="col"><img width="60" src="../../../img/<?php echo $registros['img2'];?>" alt=""></td>
                            <td scope="col"><img width="60" src="../../../img/<?php echo $registros['img3'];?>" alt=""></td>
                            <td scope="col"><img width="60" src="../../../img/<?php echo $registros['img4'];?>" alt=""></td>
                            <td scope="col"><img width="60" src="../../../img/<?php echo $registros['img5'];?>" alt=""></td>
                            <td scope="col"><img width="60" src="../../../img/<?php echo $registros['img6'];?>" alt=""></td>
                            <td>
                            <a name="" id="" class="btn btn-success" href="editar.php?txtid=<?php echo $registros['id_unidad']; ?>" role="button">Editar</a>
                            |
                            <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros['id_unidad']; ?>" role="button">Eliminar</a>
                            
                        </td>
                        </tr>

                        <?php }?>
                    
                    </tbody>

                </table>
            </div>

        </div>

        
    
</div>

<?php include("../../templates/footer.php");?>