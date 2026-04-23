<?php
  function verProductoAdmin(){
            $objConsultas = new ConsultasProducto();
            $resultado = $objConsultas->verProductos(3);

                 
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
                                    <td>'.$f['usu_nombre'].'</td>
                                    <td>'.$f['pro_nombre'].'</td>
                                    <td>'.$f['categ_nombre'].'</td>
                                    <td>'.$f['pro_precio'].'</td>
                                    <td>'.$f['pro_dispo'].'</td>
                                    <td>'.$f['pro_stock'].'</td>
                                    <td>'.$f['pro_descrip'].'</td>
                                    <td> <img src="'.$f['pro_img'].'" alt="Foto Producto" width="80px" height="80px"></td>
                                    <td> <a href="#" id='.$f['pro_id'].' onclick="editarEstadoProducto(this)" class="btn btn-primary botonEditar" data-bs-toggle="modal" data-bs-target="#exampleModalProducto"><i class="ti-pencil"></i> EDITAR </a> </td>
                                </tr>
                            ';
                        }
                    }
            }
            function verProductoAdminCompra(){
                $objConsultas = new ConsultasProducto();
                $resultado = $objConsultas->verProductos(4);
    
                     
                        if(empty($resultado)) {
                            // Aqui pintamos la información consultada en modelo
                            // para ser enviada a la vista
                            echo "<h2>No hay registros en la base de datos</h2>";
                            }
                    
                        else{
                            foreach($resultado as $f){
                                echo ' 
                                    <tr>
                                        <td>'.$f['id_compra'].'</td>
                                        <td>'.$f['id_usuario'].'</td>
                                        <td>'.$f['ciudad'].'</td>
                                        <td>'.$f['telefono'].'</td>
                                        <td>'.$f['direccion'].'</td>
                                        <td>'.$f['especificacion'].'</td>
                                        <td>'.$f['email'].'</td>
                                        <td>'.$f['estado'].'</td>
                                        <td> <a href="#" id='.$f['id_compra'].' onclick="editarEstadoCompra(this)" class="btn btn-primary botonEditar" data-bs-toggle="modal" data-bs-target="#exampleModalProducto"><i class="ti-pencil"></i> EDITAR </a> </td>
                                    </tr>
                                ';
                            }
                        }
                }
            function verProductoProv(){
                $objConsultas = new ConsultasProducto();
                $resultado = $objConsultas->verProductos(1);
    
                     
                        if(empty($resultado)) {
                            // Aqui pintamos la información consultada en modelo
                            // para ser enviada a la vista
                            echo "<h2>No hay registros en la base de datos</h2>";
                            }
                    
                        else{
                            foreach($resultado as $f){
                                echo ' 
                                    <tr>
                                        <td>'.$f['pro_nombre'].'</td>
                                        <td>'.$f['mar_nombre'].'</td>
                                        <td>'.$f['categ_nombre'].'</td>
                                        <td>'.$f['pro_precio'].'</td>
                                        <td>'.$f['pro_dispo'].'</td>
                                        <td>'.$f['pro_stock'].'</td>
                                        <td>'.$f['pro_descrip'].'</td>
                                        <td>'.$f['pro_vencimiento'].'</td>
                                        <td> <img src="'.$f['pro_img'].'" alt="Foto Producto" width="80px" height="80px"></td>
                                        <td> <a href="../../views/proveedor/editProducto.php?id='.$f['pro_id'].'" class="btn btn-primary"><i class="ti-pencil"></i> EDITAR </a> </td>
                                        <td> <a href="../../controllers/productos/eliminarProducto.php?id='.$f['pro_id'].'" class="btn btn-warning"><i class="ti-trash"></i> ELIMINAR </a> </td>
                                    </tr>
                                ';
                            }
                        }
                }
            function verInventarioProv(){
                $objConsultas = new ConsultasProducto();
                $resultado = $objConsultas->verProductos(1);
    
                     
                        if(empty($resultado)) {
                            // Aqui pintamos la información consultada en modelo
                            // para ser enviada a la vista
                            echo "<h2>No hay registros en la base de datos</h2>";
                            }
                    
                        else{
                            foreach($resultado as $f){
                                echo ' 
                                    <tr>
                                        <td>'.$f['pro_nombre'].'</td>
                                        <td>'.$f['mar_nombre'].'</td>
                                        <td>'.$f['categ_nombre'].'</td>
                                        <td>'.$f['pro_precio'].'</td>
                                        <td>'.$f['pro_dispo'].'</td>
                                        <td>'.$f['pro_stock'].'</td>
                                        <td>'.$f['pro_descrip'].'</td>
                                        <td>'.$f['pro_vencimiento'].'</td>
                                        <td> <img src="'.$f['pro_img'].'" alt="Foto Producto" width="80px" height="80px"></td>
                                    </tr>
                                ';
                            }
                        }
                }

    



   
                function verProductoEdit(){
                    $idProducto = $_GET['id'];
                    $objConsultas = new ConsultasProducto();
                    $resultado = $objConsultas->verProductosEdit($idProducto);//=f
            
                    if(empty($resultado)) {
                        // Aqui pintamos la información consultada en modelo
                        // para ser enviada a la vista
                        echo "<h2>No hay registros en la base de datos</h2>";
                        }
                
                    else{
                        foreach($resultado as $f){
                            echo '
                            <form action="../../controllers/productos/actualizarProducto.php" method="POST" enctype="multipart/form-data" >
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label>Codigo Producto</label>
                                   <input type="text" value='.$f['pro_id'].' readonly name="idProducto"class="form-control" placeholder="Id Producto">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Proveedor</label>
                                    <input type="text" value='.$f['usu_nombre'].' readonly class="form-control" placeholder="Nombre Proveedor">
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre Producto</label>
                                    <input type="text" value='.$f['pro_nombre'].' name="nombreProducto"class="form-control" placeholder="Nombre Producto" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="number"  value='.$f['pro_precio'].'  name="precio" class="form-control" placeholder="Precio" required>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha Vencimiento</label>
                                    <input type="date"  value='.$f['pro_vencimiento'].'  name="fecha" class="form-control" placeholder="Fecha" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number"  value='.$f['pro_stock'].'  name="stock" class="form-control" placeholder="Cantidad" required>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Peso</label>
                                    <input type="number"  value='.$f['pro_peso'].'  name="peso" class="form-control" placeholder="Peso" required>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Disponibilidad</label>
                                    <select class="form-control"  value='.$f['pro_dispo'].' name="disponibilidad" id="" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                         <option value="Disponible">Disponible</option>
                                         <option value="Sin existencias">Sin existencias</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div  class="form-group">                                      
                                      <label>Tipo Mascota</label>
                                    <select  class="form-control"  value='.$f['pro_tipoMascota'].'  name="tipoMascota" id="" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="gato">Gato</option>
                                        <option value="perro">Perro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div  class="form-group">                    
                                      <label>Categoria</label>
                                    <select  class="form-control" value='.$f['categ_nombre'].'  name="categoria" id="" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="1">Juguete</option>
                                        <option value="2">Accesorio</option>
                                        <option value="3">Alimento</option>
                                        <option value="4">Snack</option>
                                        <option value="5">Medicamento</option>  
                                    </select>
                                </div>
                             </div>   
                                <div  class="form-group col-md-12">     
                                        <label>Descripcion</label>                                       
                                        <textarea  placeholder="Descripcion Producto" value='.$f['pro_descrip'].' name="descripcion" id="" cols="207" rows="5" required>'.$f['pro_descrip'].'</textarea>
                                </div>
                            </div>
            
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"> Editar Producto</button>
                        </form>
                            ';
                        }
                        }
                }

    function cargarIndex(){
        $objConsultas = new ConsultasProducto();
        $resultado = $objConsultas->verProductos(2);
        if(empty($resultado)) {
            // Aqui pintamos la información consultada en modelo
            // para ser enviada a la vista
            echo "<h2>No hay registros en la base de datos</h2>";
            }
    
        else{
            
                echo ' 
                <div class="carousel-item active">
                <div class="row" >';
                 $aux=0;
                foreach($resultado as $f){  
                    $foto= substr($f['pro_img'],6);
                    $precio = number_format($f['pro_precio'], 0, ',', '.');

                   


                    if($aux<4){
                      
                        echo '
                        <div class="col-md-3 productosIndex">
                            <div class="product-card">
                                <a href="views/users/detalleProducto.php?id='.$f['pro_id'].'">
                                    <img src="'.$foto.'" alt="Producto 1" height="200px" width="130px">
                                </a>
                                <h5 class="mt-3">'.$f['pro_nombre'].'</h5>
                                <p>$ '.$precio.'</p>
                                <button 
                                    class="botonAgregar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    data-id="'.$f['pro_id'].'"
                                    data-nombre="'.$f['pro_nombre'].'"
                                    data-precio="'.$f['pro_precio'].'"
                                    data-imagen="'.$f['pro_img'].'"
                                >Agregar al carrito</button>
                            </div>
                        </div>';
                        
                       
                    }else{
                        break;
                    }    
                    $aux++;
                } 
                echo'</div>
                </div>';

               
                if($aux<8 && $aux>=4){
                    $resultado=array_slice( $resultado,$aux);
                    echo'
                    <div class="carousel-item">
                    <div class="row">';
                     
                        

                    foreach($resultado as $f){  
                        $foto= substr($f['pro_img'],6);
                        $precio = number_format($f['pro_precio'], 0, ',', '.');
                            echo' 
                            <div class="col-md-3  productosIndex" >
                            <div class="product-card">
                                <a href="views/users/detalleProducto.php?id='.$f['pro_id'].'" ><img src="'.$foto.'" alt="Producto 1" height="200px"  width="130px"></a>
                                <h5 class="mt-3">'.$f['pro_nombre'].'</h5>
                                <p>$ '.$precio.'</p>
                                
                            
                                <button 
                                    class="botonAgregar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    data-id="'.$f['pro_id'].'"
                                    data-nombre="'.$f['pro_nombre'].'"
                                    data-precio="'.$f['pro_precio'].'"
                                    data-imagen="'.$f['pro_img'].'"
                                >Agregar al carrito</button>
                            
                            </div>
                        </div>';
            
                        $aux++;
                    }
                    
                    echo'  </div>
                    </div>';
                }
                
            }
        
           
        }
    function cargarDetallesProducto(){
        $idProducto = $_GET['id'];
        $objConsultas = new ConsultasProducto();
        $resultado = $objConsultas->verProductosEdit($idProducto);

        if(empty($resultado)){

        }else 
            foreach($resultado as $f){
                $precio = number_format($f['pro_precio'], 0, ',', '.');
                echo'
            
            
                <div class="container">   
                    <div  class="row">
                        <div class="col-md-2 tresPeques">      
                                <div class="mb-2">
                                    <img src="'.$f['pro_img'].'" alt="" class="small-image">
                                </div>
                                <div class="mb-2">
                                    <img src="'.$f['pro_img2'].'"alt="" class="small-image">
                                </div>
                                <div class="mb-2">
                                    <img src="'.$f['pro_img3'].'"  alt="" class="small-image">
                                </div>     
                        </div> 
    
                            <div class="col-md-2 imagenYOU ">
                                
                                <img  src="'.$f['pro_img'].'" alt="" class="imagenPrincipal">
                                
                            </div>
    
                            <div class="col-md-3 textosPro" >
                                <div class="mb-2 infoSuperior">
                                    <h1>'.$f['pro_nombre'].'</h1>
                                    <h2>Marca:'.$f['mar_nombre'].'</h2>
                                    <small>Precio</small> <br>
                                    <span>$'.$f['pro_precio'].'</span>
                                </div>
                                <div class="mb-2 infoInferior">
                                    <small>Disponibilidad</small> <br>
                                    <span>'.$f['pro_dispo'].'</span>
                                
                                </div>              
                            </div>
                   
    
                            <div class="Detalles">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Descripción</button>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"> <strong>'.$f['pro_descrip'].'</strong> </div>
                                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"> <strong> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam dolore obcaecati nesciunt iste tempore ducimus molestias quam vel nostrum cum.</strong></div>
                                </div>   
                           </div>            
                </div>
            </div>
 
    
                ';
            }

        }

        function cargarProductosCliente(){
            $objConsultas = new ConsultasProducto();
            $result = $objConsultas->consultarProductosCliente();
            
            if(!isset($result) || empty($result)){
                echo "<h2> NO HAY PRODUCTOS REGISTRADOS </h2>";
            } else {
                echo '<div class="container">';
                echo '<div class="row">';
                
                foreach ($result as $f){
                    $foto = substr($f['pro_img'], 6);
                    $precio = number_format($f['pro_precio'], 0, ',', '.');
            
                    echo '
                    <div class="col-md-3 mb-4 productosIndex">
                        <div class="product-card">
                            <a href="../../views/clientes/detalleProductoC.php?id='.$f['pro_id'].'"><img src="'.$f['pro_img'].'" alt="Producto" class="img-fluid" style="height: 200px; width: 130px;"></a>
                            <h5 class="mt-3">'.$f['pro_nombre'].'</h5>
                            <p>$ '.$precio.'</p>
                            <button class="botonAgregar" onclick="mostrarModal('.$f['pro_id'].','.$f['pro_precio'].')">Agregar al carrito</button>
                        </div>
                    </div>';
                }
                
            }
        }
        
        
        function cargarProductos(){
            $isLoggedIn = isset($_SESSION['usuario']);
            
            $objConsultas = new ConsultasProducto();
            $result = $objConsultas->consultarProductosCliente();
        
            if (!isset($result)) {
                echo "<h2> NO HAY PRODUCTOS REGISTRADOS </h2>";
            } else {
                foreach ($result as $f) {
                    $foto = substr($f['pro_img'], 6);
                    $precio = number_format($f['pro_precio'], 0, ',', '.');
        
                    echo '
                    <div class="col-md-3 productosIndex">
                        <div class="product-card">
                            <a href="../../views/users/detalleProducto.php?id=' . $f['pro_id'] . '"><img src="'.$f['pro_img'].'" alt="Producto" height="200px" width="130px"></a>
                            <h5 class="mt-3">' . $f['pro_nombre'] . '</h5>
                            <p>$ ' . $precio . '</p>
                                <button 
                                    class="botonAgregar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    data-id="'.$f['pro_id'].'"
                                    data-nombre="'.$f['pro_nombre'].'"
                                    data-precio="'.$f['pro_precio'].'"
                                    data-imagen="'.$f['pro_img'].'"
                                >Agregar al carrito</button>
                                                        </div>
                    </div>';
                }
            }
        }

        function cargarProductosDetalle(){
            $objConsultas = new ConsultasProducto();
            $result = $objConsultas->consultarProductosCliente();
            
            if(!isset($result) || empty($result)){
                echo "<h2> NO HAY PRODUCTOS REGISTRADOS </h2>";
            } else {
                echo '<div class="container">';
                echo '<div class="row">';
                
                foreach ($result as $f){
                    $foto = substr($f['pro_img'], 6);
                    $precio = number_format($f['pro_precio'], 0, ',', '.');
            
                    echo '
                    <div class="col-md-3 mb-4 productosIndex">
                        <div class="product-card">
                            <a href="../../views/users/detalleProducto.php?id=' . $f['pro_id'] . '"><img src="'.$f['pro_img'].'" alt="Producto" height="200px" width="130px"></a>
                            <h5 class="mt-3">'.$f['pro_nombre'].'</h5>
                            <p>$ '.$precio.'</p>
                                <button 
                                    class="botonAgregar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    data-id="'.$f['pro_id'].'"
                                    data-nombre="'.$f['pro_nombre'].'"
                                    data-precio="'.$f['pro_precio'].'"
                                    data-imagen="'.$f['pro_img'].'"
                                >Agregar al carrito</button>                        </div>
                    </div>';
                }
                
            }
        }
        
        
        
        
        

       
        





function procesoCarroCompra() {
    $objConsultas = new ConsultasProducto();
        $resultado = $objConsultas->verProductos(2);

    

    if (!empty($resultado)) {
       
        echo '
            <!-- Boton carrito-de-compras -->
            <button type="button" id="boton-carro" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img src="https://img.icons8.com/pastel-glyph/64/shopping-trolley--v1.png" alt="Imagen carro compras" height="30px" width="30px"> <span id="cuenta-carrito">0</span>
            </button>

            <!-- Modal- Carro de compras -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Carro de compras</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- DATOS CARRO DE COMPRAS -->
                            <div class="shopping-cart">  
                                <div class="column-labels">
                                    <label class="product-image">Imagen</label>
                                    <label class="product-details">Producto</label>
                                    <label class="product-price">Precio</label>
                                    <label class="product-quantity">Cantidad</label>
                                    <label class="product-removal">Eliminar</label>
                                    <label class="product-line-price">Total</label>
                                </div>
        ';
        
        
        foreach ($resultado as $f) {
            $precio = number_format($f['pro_precio'], 0, ',', '.');
            $foto= substr($f['pro_img'],6);
            
            echo '
                <div class="product">
                    <div class="product-image">
                        <img src="'.$foto.'"  height="150px"  width="100px" alt="Imagen producto">
                    </div>
                    <div class="product-details">
                        <div class="product-title"><h4  value='.$f['pro_id'].'>'.$f['pro_nombre'].'</h4></div>
                        <h5 >Marca: '.$f['mar_nombre'].'</h5>
                        <p class="product-description">'.$f['pro_descrip'].'</p>
                    </div>
                    <h6>'.$f['pro_peso'].' kg</h6>
                    <div class="product-price">'.$precio.'</div>
                    <div class="product-quantity">
                        <input type="number" value="1" min="1">
                    </div>
                    <div class="product-removal">
                        <button class="remove-product">Eliminar</button>
                    </div>
                    <div class="product-line-price">'.$precio.'</div>
                </div>
            ';
        }

      
        echo '
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="Views/usuarios/procesoCompra.php"><button type="button" class="checkout">Continuar al Checkout</button></a>
                        </div>
                    </div>
                </div>
            </div>
            </li>
        ';
    } else {
      
    echo '
    <div class="modal-body">
        <p>No hay productos en el carrito.</p>
    </div>
    <div class="modal-footer">
        <a href="Views/usuarios/procesoCompra.php"><button type="button" class="checkout">Continuar al Checkout</button></a>
    </div>
';
    }
}

      
      
      
    
/* */

?>