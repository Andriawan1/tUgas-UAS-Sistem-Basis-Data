<?php

require_once __DIR__ . '/vendor/autoload.php';


$mpdf = new \Mpdf\Mpdf();

$html =


    $mpdf->WriteHTML($mpdf);
$mpdf->Output();
