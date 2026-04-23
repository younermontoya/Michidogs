<?php
require_once("../../Models/conexion_db.php");
require_once('../../Models/consultasAdmin.php');
    function cargarUsuario(){
        $id= $_GET['id'];

        $objConsultas = new ConsultaAdmin();
        $result = $objConsultas -> cargarUsuario($id);

        foreach ($result as $f) {
            $rol="";
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
    
            <form action="../../Controllers/administrador/editarUsuario.php" method="POST"">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Id usuario</label>
                    <input type="text" readonly value="'.$f['id'].'" name="id" class="form-control" placeholder="example: 2846482">
                </div>
                <div class="form-group col-md-6">
                    <label>Nombre</label>
                    <input type="text" value="'.$f['usu_nombre'].'" name="nombre"class="form-control" placeholder="Nombre">
                </div>
                <div class="form-group col-md-6">
                    <label>Apellido</label>
                    <input type="text" value="'.$f['usu_apellido'].'" name="apellido"class="form-control" placeholder="Apellido">
                </div>
                <div class="form-group col-md-6">
                    <label>Teléfono</label>
                    <input type="text" value="'.$f['usu_telefono'].'" name="telefono" class="form-control" placeholder="Telefono">
                </div>
                <div class="form-group col-md-6">
                    <label>email</label>
                    <input type="email"  value="'.$f['usu_correo'].'"  name="email" class="form-control" placeholder="Email">
                </div>
    
                <div  class="form-group col-md-6">                                      
                      <label>Rol</label>
                    <select  class="form-control" name="rol" id="">
                        <option value="'.$rol.'">'.$rol.'</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Comprador">Comprador</option>
                        <option  value="Cliente">Cliente</option>
                    </select>
                </div>
                <div  class="form-group col-md-6">                                      
                      <label>Estado</label>
                    <select  class="form-control" name="estado" id="">
                        <option value="'.$f['usu_estado'].'">'.$f['usu_estado'].'</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                        <option value="Bloqueado">Bloqueado</option>
                    </select>
                </div>
            </div>
    
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Guardar Ajustes</button>
           
    
    
        </form>
        
        ';
        }

    }

?>