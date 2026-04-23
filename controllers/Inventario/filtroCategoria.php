<?php


function filtrar(){
    $categoria = $_GET['categoria'];
    $producto = $_GET['producto'];




    $obj_consulta = new ConsultasProducto();


    $resultado = $obj_consulta ->filtrarProducto($categoria, $producto);

    if(empty($resultado)) {
        // Aqui pintamos la información consultada en modelo
        // para ser enviada a la vista
        echo "<h2>No hay registros en la base de datos</h2>";
        }

    else{
        foreach($resultado as $f){
            echo ' 
                <tr>
                    <td>'.$f['pro_id'].'</td>
                    <td>'.$f['pro_nombre'].'</td>
                    <td>'.$f['pro_stock'].'</td>
                    <td>'.$f['pro_stock_max'].'</td>
                    <td>'.$f['pro_stock_min'].'</td>
                    <td> <a href="../../Views/Productos/editarProducto.php?id='.$f['pro_id'].'" class="btn btn-primary"><i class="ti-pencil"></i> Ver entradas </a> </td>
                    <td> <a href="../../Controllers/productos/eliminarProducto.php?id='.$f['pro_id'].'" class="btn btn-primary"><i class="ti-trash"></i> Ver salidas</a> </td>
                </tr>
            ';
        }
    }
}



?>
