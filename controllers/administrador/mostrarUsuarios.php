<?php
require_once("../../Models/conexion_db.php");
require_once('../../Models/consultasAdmin.php');

function cargarUsers(){
        
    $objConsultas = new ConsultaAdmin();
    $result = $objConsultas->consultarUsuarios();

    if(!empty($result)) {
        // Aqui pintamos la información consultada en modelo
        // para ser enviada a la vista
        foreach($result as $f){
            if($f['rol_id']=='1'){
                $rol='Administrador';
            }
            else if($f['rol_id']=='2'){
                $rol= 'Comprador';
            }
            else{
                $rol= 'Proveedor';
            }

            echo ' 
                         <tr>
                            <td>'.$f['rol_id'].'</td>
                            <td>'.$f['usu_nombre'].'</td>
                            <td>'.$f['usu_apellido'].'</td>
                            <td>'.$f['usu_telefono'].'</td>
                            <td>'.$f['usu_correo'].'</td>
                            <td>'.$f['usu_estado'].'</td>
                            <td> <a href="#" id='.$f['id'].' onclick="botonEditar(this)" class="btn btn-primary botonEditar" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="ti-pencil"></i> EDITAR </a> </td>
                        </tr>
            ';
        }

    }
    else{
        echo "<h2>No hay registros en la base de datos</h2>";

       
        }
}


?>

<!-- <button type="button" class="btn btn-primary botonEditar" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Modificar Estado
</button> -->