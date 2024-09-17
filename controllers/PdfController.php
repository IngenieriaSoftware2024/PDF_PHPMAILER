<?php

namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;

class PdfController
{
    public static function pdf(Router $router)
    {

        $nombre = $_GET['nombre'] ?? '';
        $mensaje = $_GET['mensaje'] ?? '';


        $mpdf = new Mpdf([
            'default_font_size' => '12',
            'default_font' => 'arial',
            'orientation' => 'P',
            'margin_top' => '30',
            'format' => 'Letter'
        ]);

        $html = $router->load('pdf/reporte', [
            'nombre' => $nombre,
            'mensaje' => $mensaje
        ]);

        $css = $router->load('pdf/style', []);
        $mpdf->WriteHTML($css);
        $mpdf->WriteHTML($html);

        $pdfContent = $mpdf->Output('reporte.pdf', 'S');

        $pdfView = $router->load('pdf/reporte', [
            'nombre' => $nombre,
            'mensaje' => $mensaje,
            'pdfContent' => base64_encode($pdfContent)
        ]);

        echo $pdfView;
    }
}
