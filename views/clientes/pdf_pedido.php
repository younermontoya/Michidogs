<?php
require_once('../../tcpdf/tcpdf.php');
require_once('../../Models/conexion_db.php');

$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Resumen del Pedido');
$pdf->SetSubject('Detalles del Pedido');

$pdf->SetPrintHeader(false);


$pdf->SetMargins(15, 20, 15);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(10);


$pdf->SetFont('helvetica', '', 12);

$pdf->AddPage();


$logoPath = '../../img/logo.png'; 
$pdf->Image($logoPath, 15, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);


$pdf->SetFont('helvetica', 'B', 16);
$pdf->Ln(25);
$pdf->Cell(0, 10, 'Resumen del Pedido', 0, 1, 'C'); 

$pdf->Ln(10); 


$conexion = (new Conexion())->get_conexion();
$carrito_id = $_GET['carrito_id']; 


$sql = "SELECT 
        c.id_carrito AS carrito_id,
        v.fecha AS fecha_venta,
        pco.direccion AS direccion,
        pco.telefono AS telefono,
        p.pro_nombre AS producto_nombre,
        SUM(d.cantidad_product) AS cantidad_total,
        d.precio_product AS precio,
        SUM(d.cantidad_product * d.precio_product) AS subtotal,
        pco.estado AS carrito_estado
    FROM 
        carrito c
    JOIN 
        detalle_carrito d ON c.id_carrito = d.id_carrito
    JOIN 
        productos p ON d.id_producto = p.pro_id
    LEFT JOIN
        ventas v ON c.id_carrito = v.id_carrito
    LEFT JOIN
        procesocompra pco ON c.id_carrito = pco.id_compra
    WHERE 
        c.id_carrito = :carrito_id
    GROUP BY 
        c.id_carrito, v.fecha, pco.direccion, pco.telefono, p.pro_nombre, d.precio_product, pco.estado
    ORDER BY 
        c.id_carrito, v.fecha DESC";

$stmt = $conexion->prepare($sql);
$stmt->bindParam(':carrito_id', $carrito_id, PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalPedido = 0;

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 10, 'Detalles del Pedido', 0, 1, 'L');
$pdf->SetFont('helvetica', '', 10);

$columnWidths = array(25, 35, 35, 50, 25, 35, 30);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.3);
$pdf->SetFont('', 'B');


$header = array('ID', 'Fecha', 'Dirección', 'Producto', 'Cantidad', 'Teléfono', 'Total unidad');
foreach ($header as $i => $col) {
    $pdf->Cell($columnWidths[$i], 10, $col, 1, 0, 'C', 1);
}
$pdf->Ln();


$pdf->SetFont('', '');
foreach ($results as $row) {
    $subtotal = $row['subtotal'];
    $totalPedido += $subtotal;
    
    $pdf->Cell($columnWidths[0], 10, htmlspecialchars($row['carrito_id']), 1);
    $pdf->Cell($columnWidths[1], 10, date('Y:m:d H:i', strtotime($row['fecha_venta'])), 1);
    $pdf->Cell($columnWidths[2], 10, htmlspecialchars($row['direccion']), 1);
    $pdf->Cell($columnWidths[3], 10, htmlspecialchars($row['producto_nombre']), 1);
    $pdf->Cell($columnWidths[4], 10, htmlspecialchars($row['cantidad_total']), 1);
    $pdf->Cell($columnWidths[5], 10, htmlspecialchars($row['telefono']), 1);
    $pdf->Cell($columnWidths[6], 10, number_format($row['precio'], 2), 1);
    $pdf->Ln();
}

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(array_sum($columnWidths), 10, 'Total a pagar: ' . number_format($totalPedido, 2), 1, 1, 'R');

$pdf->Output('Resumen_Pedido.pdf', 'D');
?>
