<?php
require_once('conexion_db.php');

class ProveedorModel {
    protected $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function getProductosPorMes($proveedor_id) {
        $query = "
        SELECT 
            DATE_FORMAT(fecha_registro, '%Y-%m') AS mes, 
            COUNT(pro_id) AS productos_agregados
        FROM 
            productos
        WHERE 
            pro_proveedor = :proveedor_id
        GROUP BY 
            mes
        ORDER BY 
            mes";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':proveedor_id', $proveedor_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductosPorCategoria($proveedor_id) {
        $query = "
        SELECT 
            c.categ_nombre AS categoria, 
            COUNT(p.pro_id) AS productos_agregados 
        FROM 
            productos p
        INNER JOIN 
            categoria c ON p.pro_categoria = c.categ_id
        WHERE 
            p.pro_proveedor = :proveedor_id
        GROUP BY 
            c.categ_nombre";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':proveedor_id', $proveedor_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTendenciaProductosVentas($proveedor_id) {
        $query = "
        SELECT 
            DATE_FORMAT(p.fecha_registro, '%Y-%m') AS mes,
            COUNT(p.pro_id) AS productos_agregados,
            COALESCE(SUM(v.ventas), 0) AS total_ventas
        FROM 
            productos p
        LEFT JOIN 
            ventas v ON p.pro_categoria = v.categ_id
        WHERE 
            p.pro_proveedor = :proveedor_id
        GROUP BY 
            mes
        ORDER BY 
            mes";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':proveedor_id', $proveedor_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function close() {
        $this->conn = null;
    }
}
?>
