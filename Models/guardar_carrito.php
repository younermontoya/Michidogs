<?php
class Carrito {

    public static function crearCarrito($idUsuario, $estado, $total) {
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
        $validacionCarrito = "SELECT * FROM carrito WHERE id_usuario = :idUsuario AND estado = :estado"; 
        
        $result = $conexion->prepare($validacionCarrito);
        $result->bindParam(':idUsuario', $idUsuario);
        $result->bindParam(':estado', $estado);
        $result->execute();

        $carritoExistente = $result->rowCount();

        if ($carritoExistente > 0) {
            $registro = $result->fetch(PDO::FETCH_ASSOC);
            $idCarrito = $registro['id_carrito'];
            return [
                "success" => "Ya hay un carrito creado",
                "idCarrito" => $idCarrito
            ];
        } else {
            $consulta = "INSERT INTO carrito(id_usuario, total, estado) VALUES (:idUsuario, :total, :estado)";
            $result = $conexion->prepare($consulta);
            $result->bindParam(':idUsuario', $idUsuario);
            $result->bindParam(':total', $total);
            $result->bindParam(':estado', $estado);

            if ($result->execute()) {
                $ultimoId = $conexion->lastInsertId();
                return [
                    "success" => "Se ha creado el carrito",
                    "idCarrito" => $ultimoId
                ];
            } else {
                return ["error" => "No se pudo crear el carrito"];
            }
        }
    }

    public static function agregarCarrito($idCarrito, $idProducto, $precio, $iva, $cantidad) {
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
        $validacionProducto = "SELECT * FROM detalle_carrito WHERE id_producto = :idProducto AND id_carrito = :idCarrito"; 
        
        $result = $conexion->prepare($validacionProducto);
        $result->bindParam(':idProducto', $idProducto);
        $result->bindParam(':idCarrito', $idCarrito);
        $result->execute();

        if ($result->rowCount() > 0) {
            return [
                "success" => "El producto ya se ha agregado",
                "idCarrito" => $idCarrito
            ];
        } else {
            $consulta = "INSERT INTO detalle_carrito(id_carrito, id_producto, cantidad_product, precio_product, iva) 
                         VALUES (:idCarrito, :idProducto, :cantidad, :precio, :iva)";
            $result = $conexion->prepare($consulta);
            $result->bindParam(':idCarrito', $idCarrito);
            $result->bindParam(':idProducto', $idProducto);
            $result->bindParam(':cantidad', $cantidad);
            $result->bindParam(':precio', $precio);
            $result->bindParam(':iva', $iva);

            if ($result->execute()) {
                return ["success" => "Se ha agregado al carrito"];
            } else {
                return ["error" => "No se pudo agregar al carrito"];
            }
        }
    }

    public static function cargarCarrito($idUsuario) {
        $estado = "Activo";
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
        $cargarCarrito = "SELECT * FROM detalle_carrito d
                          INNER JOIN carrito c ON c.id_carrito = d.id_carrito
                          INNER JOIN productos p ON p.pro_id = d.id_producto
                          WHERE c.id_usuario = :idUsuario AND c.estado = :estado";
        $result = $conexion->prepare($cargarCarrito);
        $result->bindParam(':idUsuario', $idUsuario);
        $result->bindParam(':estado', $estado);
        $result->execute();
        return $result;
    }

    public static function actualizarCarrito($cantidad, $idCarrito, $idProducto) {
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
        $validacionProducto = "SELECT * FROM productos WHERE pro_id = :idProducto";
        $result = $conexion->prepare($validacionProducto);
        $result->bindParam(':idProducto', $idProducto);
        $result->execute();
        $producto = $result->fetch(PDO::FETCH_ASSOC);

        if ($cantidad > $producto['pro_stock']) {
            return ["success" => "El producto agotó su stock"];
        } else {
            $validacionProducto = "UPDATE detalle_carrito SET cantidad_product = :cantidad WHERE id_producto = :idProducto AND id_carrito = :idCarrito";
            $result = $conexion->prepare($validacionProducto);
            $result->bindParam(':cantidad', $cantidad);
            $result->bindParam(':idProducto', $idProducto);
            $result->bindParam(':idCarrito', $idCarrito);
            $result->execute();
            return ["success" => "El producto se actualizó"];
        }
    }

    public static function eliminarProducto($idCarrito, $idProducto) {
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
        $validacionProducto = "DELETE FROM detalle_carrito WHERE id_producto = :idProducto AND id_carrito = :idCarrito";
        $result = $conexion->prepare($validacionProducto);
        $result->bindParam(':idProducto', $idProducto);
        $result->bindParam(':idCarrito', $idCarrito);
        $result->execute();
        return ["success" => "El producto se eliminó correctamente"];
    }

    public static function registrarVenta($idCarrito, $idCompra, $idUsuario) {
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();

        $query = "SELECT d.id_producto, d.cantidad_product, p.pro_categoria
                  FROM detalle_carrito d
                  JOIN productos p ON d.id_producto = p.pro_id
                  WHERE d.id_carrito = :idCarrito";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':idCarrito', $idCarrito);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $queryVenta = "INSERT INTO ventas (pro_id, usu_id, ventas, fecha, categ_id, id_carrito, id_compra)
                           VALUES (:pro_id, :usu_id, :ventas, NOW(), :categ_id, :id_carrito, :id_compra)";
            $stmtVenta = $conexion->prepare($queryVenta);
            $stmtVenta->bindParam(':pro_id', $row['id_producto']);
            $stmtVenta->bindParam(':usu_id', $idUsuario);
            $stmtVenta->bindParam(':ventas', $row['cantidad_product']);
            $stmtVenta->bindParam(':categ_id', $row['pro_categoria']);
            $stmtVenta->bindParam(':id_carrito', $idCarrito);
            $stmtVenta->bindParam(':id_compra', $idCompra);
            $stmtVenta->execute();
        }

        return ['success' => true];
    }

    public static function actualizarCarritoEstado($idUsuario) {
        $estado = "Inactivo";
        $estadoA = "Activo";
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();

        $validacionProducto = "UPDATE carrito SET estado = :estado WHERE estado = :estadoA AND id_usuario = :idUsuario";
        $result = $conexion->prepare($validacionProducto);
        $result->bindParam(':estado', $estado);
        $result->bindParam(':estadoA', $estadoA);
        $result->bindParam(':idUsuario', $idUsuario);
        $result->execute();
    }
}
?>
