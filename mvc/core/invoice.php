<?php

// reference the Dompdf namespace
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

function printInvoice($html){

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    //portrait Landscape
    $dompdf->setPaper('A4', 'portrait ');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('hoadon.pdf', Array("Attachment" => 0));
}
?>