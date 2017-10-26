<?php
require_once(dirname(__FILE__).'/tcpdf_barcodes_1d_include.php');
$barcodeobj = new TCPDFBarcode('8080000000003034', 'C128');
echo $barcodeobj->getBarcodeHTML(2, 30, 'black');

