<?php

require_once('conexion_db.php');

class SalesModel {
    protected $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function getSalesByCategory() {
        $query = "SELECT categ_nombre AS categoria, SUM(ventas) AS ventas FROM ventas INNER JOIN categoria ON ventas.categ_id = categoria.categ_id GROUP BY categ_nombre";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesTrends() {
        $sql = "SELECT fecha, SUM(ventas) AS total_ventas FROM ventas GROUP BY fecha ORDER BY fecha";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getCustomerAnalysis() {
        $sql = "SELECT p.pro_nombre AS producto, SUM(v.ventas) AS total_ventas FROM ventas v JOIN productos p ON v.categ_id = p.pro_categoria GROUP BY p.pro_nombre";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function close() {
        // PDO no requiere cerrar conexión explícitamente
        $this->conn = null;
    }
}
?>
