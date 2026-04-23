<?php
class ConsultasProducto{

        public function verificarCodigoProducto($pro_id) {
            $objconexion = new Conexion();
            $conexion = $objconexion->get_conexion();

            $query = "SELECT COUNT(*) FROM productos WHERE pro_id = :pro_id";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':pro_id', $pro_id, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->fetchColumn();
            return $count > 0;
        }

        public function verificarNombreProducto($nombre) {
            $objconexion = new Conexion();
            $conexion = $objconexion->get_conexion();
        
            $query = "SELECT COUNT(*) FROM productos WHERE pro_nombre = :nombre";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->execute();
        
            $count = $stmt->fetchColumn();
            return $count > 0;
        }
        
        public function registrarProducto($pro_id, $nombre, $marca, $precio, $fecha, $stock, $peso, $disponibilidad, $tipoMascota, $categoria, $imagen, $descripcion, $usuario, $imagen2, $imagen3, $cantMaxima, $cantMinima) {
            $objconexion = new Conexion();
            $conexion = $objconexion->get_conexion();
        
            // if ($this->verificarNombreProducto($nombre)) {
            //     echo "<script>alert('Ya existe un producto con ese nombre.');</script>";
            //     echo "<script>location.href='../../views/proveedor/registrarProductos.php';</script>";
            //     return;
            // }
        
            // // Validación de campos
            // $errors = [];
        
            // // Validar campos de texto
            // if (empty($nombre) || is_numeric($nombre)) {
            //     $errors[] = "Nombre incorrecto. Debe contener solo letras.";
            // }
        
            // if (empty($marca) || !preg_match("/^[a-zA-Z\s]+$/", $marca)) {
            //     $errors[] = "Marca incorrecta. Debe contener solo letras.";
            // }
        
            // if (empty($descripcion) || preg_match("/\d/", $descripcion)) {
            //     $errors[] = "Descripción incorrecta. No puede contener números.";
            // }
        
            // // Validar campos numéricos
            // if (empty($precio) || !is_numeric($precio)) {
            //     $errors[] = "Precio incorrecto. Debe ser un número.";
            // }
        
            // if (empty($stock) || !is_numeric($stock)) {
            //     $errors[] = "Stock incorrecto. Debe ser un número.";
            // }
        
            // if (empty($peso) || !is_numeric($peso)) {
            //     $errors[] = "Peso incorrecto. Debe ser un número.";
            // }
        
            // if (empty($cantMaxima) || !is_numeric($cantMaxima)) {
            //     $errors[] = "Cantidad máxima incorrecta. Debe ser un número.";
            // }
        
            // if (empty($cantMinima) || !is_numeric($cantMinima)) {
            //     $errors[] = "Cantidad mínima incorrecta. Debe ser un número.";
            // }
        
            // // Validar las imágenes
            // $allowedTypes = ['image/jpeg', 'image/png'];
            // $imageFiles = [
            //     'imagen' => $_FILES['imagen'],
            //     'imagen2' => $_FILES['imagen2'],
            //     'imagen3' => $_FILES['imagen3']
            // ];
        
            // $imageErrors = false;
        
            // foreach ($imageFiles as $key => $file) {
            //     if ($file['error'] !== UPLOAD_ERR_OK) {
            //         $imageErrors = true;
            //     } elseif (!in_array($file['type'], $allowedTypes)) {
            //         $imageErrors = true;
            //     } elseif ($file['size'] == 0) {
            //         $imageErrors = true;
            //     } else {
            //         // Mover el archivo cargado a la ubicación deseada
            //         $destination = "../../Uploads/" . basename($file['name']);
            //         if (!move_uploaded_file($file['tmp_name'], $destination)) {
            //             $imageErrors = true;
            //         }
            //         // Actualizar el nombre del archivo para ser almacenado en la base de datos
            //         ${$key} = $destination;
            //     }
            // }
        
            // // Mostrar un mensaje general si hay errores en los campos o imágenes
            // if (!empty($errors)) {
            //     $message = "Por favor, rellene todos los campos correctamente.";
            //     if ($imageErrors) {
            //         $message .= " Además, asegúrese de que todas las imágenes sean JPEG o PNG y que no estén vacías.";
            //     }
            //     echo "<script>alert('$message');</script>";
            //     echo "<script>location.href='../../views/proveedor/registrarProductos.php';</script>";
            //     return;
            // }
        
            // Preparar la consulta de inserción
            $insert = "INSERT INTO productos (pro_proveedor, pro_id, pro_nombre, pro_marca, pro_precio, pro_vencimiento, pro_stock, pro_peso, pro_dispo, pro_categoria, pro_tipoMascota, pro_img, pro_descrip, pro_img2, pro_img3, pro_cant_max, pro_cant_min)
                       VALUES (:usuario, :pro_id, :nombre, :marca, :precio, :fecha, :stock, :peso, :disponibilidad, :categoria, :tipoMascota, :imagen, :descripcion, :imagen2, :imagen3, :cantMaxima, :cantMinima)";
        
            $result = $conexion->prepare($insert);
        
            // Enlazar parámetros
            $result->bindParam(":pro_id", $pro_id);
            $result->bindParam(":usuario", $usuario);
            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":marca", $marca);
            $result->bindParam(":precio", $precio);
            $result->bindParam(":fecha", $fecha);
            $result->bindParam(":stock", $stock);
            $result->bindParam(":peso", $peso);
            $result->bindParam(":disponibilidad", $disponibilidad);
            $result->bindParam(":categoria", $categoria);
            $result->bindParam(":tipoMascota", $tipoMascota);
            $result->bindParam(":imagen", $imagen);
            $result->bindParam(":descripcion", $descripcion);
            $result->bindParam(":imagen2", $imagen2);
            $result->bindParam(":imagen3", $imagen3);
            $result->bindParam(":cantMaxima", $cantMaxima);
            $result->bindParam(":cantMinima", $cantMinima);
        
            // Ejecutar la consulta
            if ($result->execute()) {
                echo "<script>alert('El producto ha sido registrado exitosamente');</script>";
                echo "<script>location.href='../../views/proveedor/registrarProductos.php';</script>";
            } else {
                echo "<script>alert('Error al registrar el producto');</script>";
                echo "<script>location.href='../../views/proveedor/registrarProductos.php';</script>";
            }
        }
        
        public function eliminarProducto($pro_id){

            $objConexion =new Conexion();
    
            $conexion = $objConexion->get_conexion();
    
            $eliminar = "DELETE FROM productos WHERE pro_id=:pro_id";

            $result = $conexion->prepare($eliminar);
    
            $result->bindParam(":pro_id", $pro_id);
    
            $result->execute();
            echo "<script> alert('Producto Eliminado') </script>";
            echo "<script> location.href='../../views/proveedor/gestionProductos.php'</script> ";
          
        }

        public function verProductos($opcion){
            $f=null;


            $objConexion = new Conexion();

            $conexion = $objConexion->get_conexion();

            if($opcion == 1){
                $usuarioId = $_SESSION['id'];
                $select = "SELECT * FROM vistaCargarProductos WHERE pro_proveedor=:usuarioId";
                $result=$conexion->prepare($select);
                $result->bindParam(":usuarioId",$usuarioId);
        }if($opcion == 2){
                $select = "SELECT * FROM vistaCargarProductos LIMIT 8";
                $result=$conexion->prepare($select);
        }if($opcion == 3){
                $select = "SELECT * FROM vistaCargarProductos";
                $result=$conexion->prepare($select);
        }else if($opcion == 4){
                $select = "SELECT * FROM procesocompra ";
                $result=$conexion->prepare($select);
        }
            $result->execute();

            while($resultado = $result->fetch() ){
                $f []=$resultado;
            }
            return $f;
        }

        public function consultarProductosCliente(){
            $f=null;
    
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
    
            $consultar = "SELECT * FROM productos where pro_dispo = 'Disponible'  AND pro_stock>0 ";
            $result = $conexion->prepare($consultar);
            
            $result->execute();
    
            while($resultado = $result->fetch()){
                $f[] = $resultado;
            }
            return $f;
        }
    
        
        public function verProductosEdit($idProducto){
        
           
            $f= null;
            $objConexion = new Conexion();
            
            $conexion = $objConexion->get_conexion();
            
            $select = "SELECT * FROM vistaCargarProductos WHERE pro_id=:idProducto";

            $result = $conexion->prepare($select);

            $result->bindParam(":idProducto",$idProducto);

            $result->execute();
            
            while ($resultado = $result->fetch()){
                $f[] = $resultado;
            }
            return $f;
        }
        

 
        public function actualizarProducto($nombre, $precio, $fecha, $stock, $peso, $disponibilidad, $tipoMascota, $categoria, $descripcion, $idProducto)  {
            //Validaciones proveedor//
            // if (empty($nombre) || is_numeric($nombre)) {
            //     $errors[] = "Nombre incorrecto. Debe contener solo letras.";
            // }
            // if (empty($precio) || !is_numeric($precio)) {
            //     $errors[] = "Precio incorrecto. Debe ser un número.";
            // }
            // if (empty($stock) || !is_numeric($stock)  || $stock > 101) {
            //     $errors[] = "Stock incorrecto. Debe ser un número.";
            // }
            // if (empty($peso) || !is_numeric($peso)  || $peso > 130) {
            //     $errors[] = "Peso incorrecto. Debe ser un número.";
            // }
            // if (empty($disponibilidad)) {
            //     $errors[] = "Disponibilidad incorrecta.";
            // }
            // if (empty($categoria)) {
            //     $errors[] = "Categoria incorrecta.";
            // }
            // if (empty($descripcion) || is_numeric($descripcion)) {
            //     $errors[] = "Descripcion incorrecta.";
            // }
            // if (!empty($errors)) {
            //     $message = "Por favor, rellene todos los campos correctamente.";
            //     echo "<script>alert('$message');</script>";
            //     echo "<script>location.href='../../views/proveedor/gestionProductos.php';</script>";
            //     return;
            // }
    
            
            try {
                $objConexion = new Conexion();
                $conexion = $objConexion->get_conexion();
                
                $verificarCategoria = "SELECT COUNT(*) FROM categoria WHERE categ_id = :categoria";
                $stmtVerificar = $conexion->prepare($verificarCategoria);
                $stmtVerificar->bindParam(":categoria", $categoria, PDO::PARAM_INT);
                $stmtVerificar->execute();
                
                if ($stmtVerificar->fetchColumn() == 0) {
                    echo "<script>alert('Error: La categoría proporcionada no existe.')</script>";
                    echo "<script> location.href='../../views/proveedor/gestionProductos.php'</script> ";
                    return; 
                }
        
                $actualizar = "UPDATE productos SET pro_nombre = :nombre, pro_precio = :precio, pro_vencimiento = :fecha, pro_stock = :stock, pro_peso = :peso, pro_dispo = :disponibilidad, pro_tipoMascota = :tipoMascota, pro_categoria = :categoria, pro_descrip = :descripcion WHERE pro_id = :idProducto";
                
                $result = $conexion->prepare($actualizar);
                
                $result->bindParam(":nombre", $nombre);
                $result->bindParam(":precio", $precio);
                $result->bindParam(":fecha", $fecha);
                $result->bindParam(":stock", $stock);
                $result->bindParam(":peso", $peso);
                $result->bindParam(":disponibilidad", $disponibilidad);
                $result->bindParam(":tipoMascota", $tipoMascota);
                $result->bindParam(":categoria", $categoria);
                $result->bindParam(":descripcion", $descripcion);
                $result->bindParam(":idProducto", $idProducto);
                
                $result->execute();
        
                if ($result->rowCount() > 0) {
                    echo "<script>alert('Producto actualizado correctamente.')</script>";
                    echo "<script> location.href='../../views/proveedor/gestionProductos.php'</script> ";
                } else {
                    echo "<script>alert('No se realizaron cambios. Verifica si el producto existe o si los datos son iguales a los actuales.')</script>";
                    echo "<script> location.href='../../views/proveedor/gestionProductos.php'</script> ";
                }
            } catch (PDOException $e) {
                echo "<script>alert('Error en la actualización: " . $e->getMessage() . "')</script>";
            }
        }
        public function  filtrarProducto( $categoria, $producto){

            $f =null;

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
            $consulta= null;

            if($categoria == "categorias" && $producto == "productos"){
                echo  '<script>alert("condicion 1") </script>';
                $consulta ="SELECT pro_id,pro_nombre,pro_stock,pro_stock_min,pro_stock_max FROM productos";
            }
            else if($categoria != "categorias" && $producto == "productos"){
                echo  '<script>alert("condicion 2") </script>';
                $consulta ="SELECT pro_id,pro_nombre,pro_stock,pro_stock_min,pro_stock_max FROM productos WHERE pro_categoria= :categoria";
            }
            else if($categoria == "categorias" && $producto != "productos"){
                echo  '<script>alert("condicion 3") </script>';
                $consulta = "SELECT * FROM productos WHERE pro_nombre LIKE :producto";
            }
            else{
                echo  '<script>alert("condicion 4") </script>';
                $consulta = "SELECT * FROM productos WHERE pro_nombre LIKE :producto AND pro_categoria = :categoria";
            }

            $result = $conexion->prepare($consulta);


            if($producto != "productos"){
              $productoParam = '%' . $producto . '%';
              $result->bindParam(":producto", $productoParam);
            }
            if($categoria != "categorias"){
                $result->bindParam(":categoria",$categoria);
            }
          
            

            $result->execute();
            
            while ($resultado = $result->fetch()){
                $f[] = $resultado;
            }
            return $f;

        }


    } 

?>