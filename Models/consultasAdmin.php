<?php
class ConsultaAdmin{
    public function registrarUsuario($apellido, $nombre, $email, $telefono, $contrasenaMD, $rol, $estado, $fecha_creacion, $documento, $tipoDocumento){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        $checkEmailQuery = "SELECT COUNT(*) FROM usuarios WHERE usu_correo = :email";
        $checkEmailStmt = $conexion->prepare($checkEmailQuery);
        $checkEmailStmt->bindParam(":email", $email);
        $checkEmailStmt->execute();
        $emailCount = $checkEmailStmt->fetchColumn();
    
        if ($emailCount > 0) {

            echo "<script>alert('El correo electrónico ya está registrado. Por favor, use otro correo.');</script>";
            echo "<script>location.href='../../views/administrador/icons.php';</script>";
            return;
        }
    
        $insert = "INSERT INTO usuarios (rol_id, usu_apellido, usu_contrasena, usu_correo, usu_nombre, usu_telefono, usu_estado, usu_fecha_creacion, usu_documento, usu_tipodoc)
                    VALUES (:rol, :apellido, :contrasena, :email, :nombre, :telefono, :estado, :fecha_creacion, :documento, :tipoDocumento)";
    
        $result = $conexion->prepare($insert);
    
        $result->bindParam(":rol", $rol);
        $result->bindParam(":apellido", $apellido);
        $result->bindParam(":contrasena", $contrasenaMD);
        $result->bindParam(":email", $email);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":estado", $estado);
        $result->bindParam(":fecha_creacion", $fecha_creacion);
        $result->bindParam(":documento", $documento);
        $result->bindParam(":tipoDocumento", $tipoDocumento);
    
        $result->execute();
    
        echo "<script>alert('Usuario registrado exitosamente');</script>";
        echo "<script>location.href='../../views/administrador/icons.php';</script>";
    }
    
    public function consultarUsuarios(){
        $f=[];

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $select = "SELECT * FROM usuarios";
        $result = $conexion->prepare($select);
        $result->execute();
        $f=$result->fetchAll();
        return $f;
    }
    public function eliminarUsers($id){

        $objconexion =new Conexion();

        $conexion = $objconexion->get_conexion();

        $eliminar = "DELETE FROM usuarios WHERE id=:id";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id", $id);

        $result->execute();
        echo "<script> alert('El usuario ha sido eliminado exitosamente') </script>";
        echo "<script> location.href='../../Views/Administrador/verUsers.php'</script> ";
      
    }

    public function cargarUsuario($id){
        $f = null;

        $objconexion =new Conexion();

        $conexion = $objconexion->get_conexion();

        $consultar = "SELECT * FROM usuarios WHERE id =:id";

        $result = $conexion->prepare($consultar);

        $result-> bindParam(':id', $id);

        $result->execute();


        while($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }
    public function editarUsuario($apellido, $nombre, $email, $telefono, $rol, $estado,$id){
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
        $actualizar = "UPDATE usuarios SET usu_nombre=:nombre,usu_apellido=:apellido,usu_telefono=:telefono,usu_correo=:email,rol_id=:rol,usu_estado=:estado WHERE id=:id";
        $result = $conexion -> prepare ($actualizar);

        $result->bindParam(":id",$id);
        $result->bindParam (":nombre", $nombre);
        $result->bindParam (":apellido", $apellido);
        $result->bindParam (":email", $email);
        $result->bindParam (":telefono", $telefono);
        $result->bindParam (":rol", $rol);
        $result->bindParam (":estado", $estado);

        $result->execute();
        echo "<script> location.href=''</script> ";
        echo "<script> alert('El usuario ha sido actualizado exitosamente') </script>";
    }

    public function modificarPerfil($id,$nombre,$apellido,$telefono,$email){
        $objconexion =new Conexion();

        $conexion = $objconexion->get_conexion();

        $actualizar = "UPDATE usuarios SET usu_nombre=:nombre,usu_apellido=:apellido,usu_telefono=:telefono,usu_correo=:email WHERE id=:id";

        $result = $conexion -> prepare($actualizar);

        $result ->bindParam(":id",$id);
        $result->bindParam (":nombre", $nombre);
        $result->bindParam (":apellido", $apellido);
        $result->bindParam (":telefono", $telefono);
        $result->bindParam (":email", $email);


        $result->execute();

        echo "<script> alert('El usuario ha sido actualizado exitosamente') </script>";
        echo "<script> location.href='../../views/administrador/user.php' </script>";

    }
    
    public function cambiarContrasena($id,$nuevaC){
        $objconexion =new Conexion();

        $conexion = $objconexion->get_conexion();

        $actualizar = "UPDATE usuarios SET usu_contrasena=:nuevaC WHERE id=:id";

        $result=$conexion->prepare($actualizar);
        $result->bindParam (":nuevaC",$nuevaC);
        $result ->bindParam(":id",$id);
        $result->execute();
        echo "<script> alert('la contraseña se a actualizado') </script>";
        echo "<script> location.href='../../views/administrador/user.php' </script>";
        //echo "<script> location.href='../../Views/Administrador/perfil.php' </script>";
       
    }

    public function editarEstado($id, $estado){
        $objconexion = new Conexion();

        $conexion = $objconexion -> get_conexion();

        $editarEstado = "UPDATE usuarios SET usu_estado=:estado WHERE id=:id";

        $result= $conexion->prepare($editarEstado);

        $result->bindParam(":estado",$estado);
        $result->bindParam(":id",$id);
        $result->execute();
        echo "<script> alert('El estado del usuario se ha editado') </script>";
        echo "<script> location.href='../../views/administrador/tables.php' </script>";
    }

    public function editarEstadoProducto($id, $disponibilidad){
        $objconexion = new Conexion ();
        
        $conexion = $objconexion->get_conexion();

        $editarEstadoPro = "UPDATE productos SET pro_dispo=:disponibilidad WHERE pro_id=:id";

        $result= $conexion->prepare($editarEstadoPro);
        $result->bindParam(":disponibilidad",$disponibilidad);
        $result->bindParam(":id",$id);
        $result->execute();

        echo "<script> alert('El estado del producto se ha editado') </script>";
        echo "<script> location.href='../../views/administrador/productosAdmin.php' </script>";


    }
    public function editarEstadoCompra($id, $estadoCompra){
        $objconexion = new Conexion ();
        
        $conexion = $objconexion->get_conexion();

        $editarEstadoCompra = "UPDATE procesocompra SET estado=:estadoCompra WHERE id_compra=:id";

        $result= $conexion->prepare($editarEstadoCompra);
        $result->bindParam(":estadoCompra",$estadoCompra);
        $result->bindParam(":id",$id);
        $result->execute();

        echo "<script> alert('El estado de la compra se ha actualizado') </script>";
        echo "<script> location.href='../../views/administrador/estadoCompra.php' </script>";


    }
}



?>
