<?php
require_once(dirname(__FILE__).'/tcpdf.php');
require_once(dirname(__FILE__).'/tcpdf_barcodes_1d_include.php');
$barcodeobj = new TCPDFBarcode('http://10.5.21.252/cardno', 'C128');
echo $barcodeobj->getBarcodeHTML(2, 30, 'black');
