<?php

require_once('../../Models/conexion_db.php');
require_once('../../Models/consultasGrafic.php');

class SalesController {
    private $salesModel;

    public function __construct() {
        $db = new Conexion();
        $dbConnection = $db->get_conexion();
        $this->salesModel = new SalesModel($dbConnection);
    }

    public function getSalesByCategory() {
        $salesData = $this->salesModel->getSalesByCategory();
        echo json_encode($salesData);
    }

    public function getSalesTrends() {
        $trendsData = $this->salesModel->getSalesTrends();
        echo json_encode($trendsData);
    }

    public function getCustomerAnalysis() {
        $customerData = $this->salesModel->getCustomerAnalysis();
        echo json_encode($customerData);
    }

    public function __destruct() {
        $this->salesModel->close();
    }
}

// Verifica qué acción ejecutar
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $controller = new SalesController();

    switch ($action) {
        case 'categorySales':
            $controller->getSalesByCategory();
            break;
        case 'salesTrends':
            $controller->getSalesTrends();
            break;
        case 'customerAnalysis':
            $controller->getCustomerAnalysis();
            break;
        default:
            echo json_encode(['error' => 'Acción no válida']);
            break;
    }
}
?>
