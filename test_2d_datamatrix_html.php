<?php
require_once(dirname(__FILE__).'/tcpdf_barcodes_2d_include.php');
$barcodeobj = new TCPDF2DBarcode('http://10.5.21.252/cardno', 'DATAMATRIX');
echo $barcodeobj->getBarcodeHTML(6, 6, 'black');
