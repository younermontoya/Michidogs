
<?php
class consultasCliente{
    public function modificarPerfil($id,$nombre,$apellido,$telefono,$email,$documento){
        $objconexion =new Conexion();

        $conexion = $objconexion->get_conexion();

        $actualizar = "UPDATE usuarios SET usu_nombre=:nombre,usu_apellido=:apellido,usu_telefono=:telefono,usu_correo=:email,usu_documento=:documento WHERE id=:id";

        $result = $conexion -> prepare($actualizar);

        $result->bindParam (":id", $id);
        $result->bindParam (":nombre", $nombre);
        $result->bindParam (":apellido", $apellido);
        $result->bindParam (":telefono", $telefono);
        $result->bindParam (":email", $email);
        $result->bindParam (":documento", $documento);



        $result->execute();

        echo "<script> alert('El usuario ha sido actualizado exitosamente') </script>";
        echo "<script> location.href='../../views/clientes/editarPerfil.php' </script>";

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
        echo "<script> location.href='../../views/clientes/editarPerfil.php' </script>";
       
    }

    public function procesoCompra($id_usuario,$ciudad, $telefono, $direccion, $especificacion,$email){


        $objconexion = new conexion();
        $conexion = $objconexion->get_conexion();
        $registrar = "INSERT INTO procesocompra (id_usuario, ciudad, telefono, direccion, especificacion, email) 
        VALUES (:id_usuario, :ciudad, :telefono, :direccion, :especificacion, :email)";

        $result = $conexion->prepare($registrar);
        $result->bindParam(":id_usuario", $id_usuario);
        $result->bindParam(":ciudad", $ciudad);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":direccion", $direccion);
        $result->bindParam(":especificacion", $especificacion);
        $result->bindParam(":email", $email);

        $result->execute();

    }

}

?>