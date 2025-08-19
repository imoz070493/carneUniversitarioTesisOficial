<?php
namespace App\Http\Controllers\Reportes;

use stdClass;

use TCPDF;
use DateTime;
use Symfony\Component\HttpFoundation\StreamedResponse;
use TCPDF_FONTS;

class FichaMatriculaMasivaPdf
{
    public static function buildReport($datos)
    {
    	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('IMOZ');
        $pdf->SetTitle($datos['file']->name_file);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);


        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set auto page breaks
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        //Insertar encabezado
        // self::setHeaderLandscape($pdf);
        //Insertar foto del personal
        // self::setPersonImage($pdf, $datos['personal']->imagen);

        /**
         * Dibuja lineas de prueba
         */
        // $pdf->Line(5, 55 + $alturas_agrupadas[0][2], 180, 55 + $alturas_agrupadas[0][2], '');
        // $pdf->Line(5, $pdf->GetY(), 180, $pdf->GetY(), '');

        //  $pdf->writeHTML($html, true, false, true, false, '');

        // 09:30, 12:00, 15:00
        $fecha_matricula = "16/08/2024 12:00";
        $fecha_impresion = "16/08/2024 12:00";
        $fecha_impresion_footer = "16/08/2024 12:00 P.M.";

        foreach ($datos['data'] as $key => $item) {
            
            self::encabezadoReporteGeneral($pdf,$datos);

            static::setBody($pdf, $item, $fecha_matricula, $fecha_impresion);
            // //Obtenemos el numero mayor y le incrementamos 0.5 para que pinten completo el texto
            // $max = max(array(
            //     $pdf->GetStringHeight(75, $item->nombre_articulo),
            //     $pdf->GetStringHeight(25, $item->nombre_unidad_medida),
            // )) + 0.5;

            // $salta_reporte_general = self::heightExceededPortrait($pdf, $max);
            // if($salta_reporte_general)
                

            // $pdf->SetX(5);
            // $pdf->SetFont('times', '', 9);
            // $pdf->MultiCell(25, $max, $item->codigo, '', 'L', 0, 0, '', '', true, 0, false, true, $max, 'M');
            // $pdf->MultiCell(75, $max, $item->nombre_articulo, '', 'L', 0, 0, '', '', true, 0, false, true, $max, 'M');
            // $pdf->MultiCell(25, $max, $item->nombre_unidad_medida, '', 'C', 0, 0, '', '', true, 0, false, true, $max, 'M');
            // $pdf->MultiCell(25, $max, $item->cantidad, '', 'R', 0, 0, '', '', true, 0, false, true, $max, 'M');
            // $pdf->MultiCell(25, $max, static::formatNumber($item->precio_unitario), '', 'R', 0, 0, '', '', true, 0, false, true, $max, 'M');
            // $pdf->MultiCell(25, $max, static::formatNumber($item->subtotal), '', 'R', 0, 1, '', '', true, 0, false, true, $max, 'M');
            // $pdf->Ln(1);

            static::setFooter($pdf, $datos,$fecha_impresion_footer);
        }

        /**
         * Paint Header
         */
        $total_paginas = $pdf->getPage();
        for ($i=1; $i <= $total_paginas ; $i++) { 
            // $pdf->setPage($i);
            // self::setHeaderLandscape($pdf,$datos['file']);
            // self::setFooterLanscape($pdf, $datos['file']);
            // self::setHourPaginateLandscape($pdf, $datos['file']->fecha_hora_impresion, $i, $total_paginas);
        }

        // self::setFooterLanscape($pdf,$datos['file']);

        //Close and output PDF document
        // $pdf->Output(public_path().'/document/'.$datos->name_file, 'F');
        // return   $datos->name_file;

        $response =  new StreamedResponse(
            function () use ($pdf) {
                $pdf->Output('Reporte Personal.pdf');
            }
        );
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment;filename="Reporte Personal.pdf"');
        $response->headers->set('Cache-Control', 'max-age=0');
        return $response;
    }

    public static function encabezadoReporteGeneral($pdf,$datos){

        $pdf->AddPage("P","A4");

        $pdf->SetFont('times', '', 11);
        $fontname = TCPDF_FONTS::addTTFfont(public_path().'/fonts/NimbusSanL-Reg.ttf', 'TrueTypeUnicode', '', 96);
        $nimbusSans = TCPDF_FONTS::addTTFfont(public_path().'/fonts/NimbusSanL-Reg.ttf', 'TrueTypeUnicode', '', 96);
        $nimbusSansBold = TCPDF_FONTS::addTTFfont(public_path().'/fonts/NimbusSanL-Bol.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont($nimbusSansBold, '', 14, '', false);
        $pdf->SetFont($nimbusSans, '', 14, '', false);
        // $pdf->setFont($font_family='nimbussanlreg',$font_variant='',$font_size=10);
        // $pdf->setFont($font_family='nimbussanlregita',$font_variant='',$font_size=10);
        // $pdf->setFont($font_family='nimbussanlbol',$font_variant='',$font_size=10);
        // $pdf->setFont($font_family='nimbussanlbolita',$font_variant='',$font_size=10);
        // $pdf->setFont($font_family='helveticanowtext',$font_variant='',$font_size=10);
        //Logo
        $pdf->SetXY(13,10);
        $pdf->Image(public_path().'/images/logo_unajma.png', '', '', 25, 24, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        $pdf->SetFont($nimbusSansBold, '', 14, '', false);
        $pdf->SetXY(15,12);
        $texto = 'UNIVERSIDAD NACIONAL JOSE MARIA ARGUEDAS';
        $altura = $pdf->GetStringHeight(180, $texto);
        // $pdf->MultiCell(180, 10.66, '<strong style="font-family: '.$nimbusSansBold.'; font-size:16px;">UNIVERSIDAD NACIONAL JOSE MARIA ARGUEDAS</strong>', '', 'C', 0, 1, '', '', true, 0, true, true, 10.66, 'M');
        $pdf->MultiCell(180, $altura, $texto, '', 'C', 0, 1, '', '', true, 0, false, true, $altura, 'M');

        
        $pdf->SetFont($nimbusSansBold, '', 12, '', false);
        $pdf->SetX(15);
        $texto = 'DIRECCIÓN DE SERVICIOS ACADÉMICOS';
        $altura = $pdf->GetStringHeight(180, $texto);
        $pdf->MultiCell(180, $altura, $texto, '', 'C', 0, 1, '', '', true, 0, false, true, $altura, 'M');
        $pdf->SetX(15);
        $texto = 'UNIDAD DE REGISTROS ACADEMICOS';
        $altura = $pdf->GetStringHeight(180, $texto);
        $pdf->MultiCell(180, $altura, $texto, '', 'C', 0, 1, '', '', true, 0, false, true, $altura, 'M');

        $pdf->Ln(5);
        $pdf->SetX(15);
        $pdf->SetFont($nimbusSansBold, '', 14, '', false);
        $pdf->MultiCell(180, 10.66, 'FICHA DE MATRICULA', '', 'C', 0, 1, '', '', true, 0, false, true, 10.66, 'M');

        $pdf->Ln(10);
        // $pdf->SetX(5);
        // $pdf->SetTextColor(255, 255, 255);
        // $pdf->SetFont('helvetica', '', 9);

        // $fontname = TCPDF_FONTS::addTTFfont(public_path().'/fonts/CHILLER.TTF', 'TrueTypeUnicode', '', 96);
        // $pdf->SetFont($fontname, '', 14, '', false);
        // $pdf->MultiCell(25, 10, "CHILLER", '', 'L', 0, 0, '', '', true, 0, false, true, 10, 'M');

        // $pdf->MultiCell(25, 10.66, 'CÓDIGO', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        // $pdf->MultiCell(75, 10.66, 'DESCRIPCION DEL ARTICULO', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        // $pdf->MultiCell(25, 10.66, 'U.M.', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        // $pdf->MultiCell(25, 10.66, 'CANTIDAD', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        // $pdf->MultiCell(25, 10.66, 'P.U.', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        // $pdf->MultiCell(25, 10.66, 'SUBTOTAL', 1, 'C', 1, 1, '', '', true, 0, false, true, 10.66, 'M');


        // $pdf->SetTextColor(0, 0, 0);
    }

    public static function setBody($pdf, $datos, $fecha_matricula, $fecha_impresion){
        $nimbusSans = TCPDF_FONTS::addTTFfont(public_path().'/fonts/NimbusSanL-Reg.ttf', 'TrueTypeUnicode', '', 96);
        $nimbusSansBold = TCPDF_FONTS::addTTFfont(public_path().'/fonts/NimbusSanL-Bol.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont($nimbusSans, '', 7, '', false);

        $pdf->SetX(15);
        $texto = $datos['escuela_profesional'];
        $altura = $pdf->GetStringHeight(90, $texto);
        $facultad = '<strong style="font-family: '.$nimbusSansBold.';">FACULTAD: </strong>'.$datos['facultad'];
        $pdf->MultiCell(90, $altura, $facultad, '', 'L', 0, 0, '', '', true, 0, true, true, $altura, 'M');
        $escuela_profesional = '<strong style="font-family: '.$nimbusSansBold.';">ESCUELA PROFESIONAL: </strong>'.$datos['escuela_profesional'];
        $pdf->MultiCell(90, $altura, $escuela_profesional, '', 'L', 0, 1, '', '', true, 0, true, true, $altura, 'M');
        $pdf->Ln(3);

        $pdf->SetX(15);
        $texto = $datos['apellidos_nombres'];
        $altura = $pdf->GetStringHeight(90, $texto);
        $facultad = '<strong style="font-family: '.$nimbusSansBold.';">APELLIDOS Y NOMBRES: </strong>'.$datos['apellidos_nombres'];
        $pdf->MultiCell(90, $altura, $facultad, '', 'L', 0, 0, '', '', true, 0, true, true, $altura, 'M');
        $escuela_profesional = '<strong style="font-family: '.$nimbusSansBold.';">CODIGO DE MATRÍCULA: </strong>'.$datos['codigo'];
        $pdf->MultiCell(90, $altura, $escuela_profesional, '', 'L', 0, 1, '', '', true, 0, true, true, $altura, 'M');
        $pdf->Ln(3);

        $pdf->SetX(15);
        $texto = '2024-I';
        $altura = $pdf->GetStringHeight(90, $texto);
        $facultad = '<strong style="font-family: '.$nimbusSansBold.';">PLAN DE ESTUDIOS: </strong>'.static::getPlanEstudios($datos['escuela_profesional']);
        $pdf->MultiCell(90, $altura, $facultad, '', 'L', 0, 0, '', '', true, 0, true, true, $altura, 'M');
        $escuela_profesional = '<strong style="font-family: '.$nimbusSansBold.';">DOCUMENTO DE IDENTIDAD: </strong>'.$datos['dni'];
        $pdf->MultiCell(90, $altura, $escuela_profesional, '', 'L', 0, 1, '', '', true, 0, true, true, $altura, 'M');
        $pdf->Ln(3);

        $pdf->SetX(15);
        $facultad = '<strong style="font-family: '.$nimbusSansBold.';">PERIODO ACADEMICO: </strong> 2024-2';
        $pdf->MultiCell(90, $altura, $facultad, '', 'L', 0, 0, '', '', true, 0, true, true, $altura, 'M');
        $escuela_profesional = '<strong style="font-family: '.$nimbusSansBold.';">CICLO DE ESTUDIOS REFERENCIAL: </strong> PRIMERO';
        $pdf->MultiCell(90, $altura, $escuela_profesional, '', 'L', 0, 1, '', '', true, 0, true, true, $altura, 'M');
        $pdf->Ln(8);

        $pdf->SetFillColor(214,220,229);
        // $pdf->SetTextColor(255, 255, 255);

        $pdf->SetFont($nimbusSansBold, '', 7, '', false);
        $pdf->SetX(15);
        $pdf->MultiCell(10, 7, 'N°', 1, 'C', 1, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->MultiCell(25, 7, 'CICLO', 1, 'C', 1, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->MultiCell(25, 7, 'CÓDIGO', 1, 'C', 1, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->MultiCell(85, 7, 'ASIGNATURA', 1, 'C', 1, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->MultiCell(20, 7, 'SECCIÓN', 1, 'C', 1, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->MultiCell(20, 7, 'CRÉDITOS', 1, 'C', 1, 1, '', '', true, 0, false, true, 7, 'M');

        $pdf->SetX(15);
        $pdf->MultiCell(185, 1, '', 'LR', 'C', 0, 1, '', '', true, 0, false, true, 1, 'M');

        $asignaturas = static::getAsignaturas($datos['escuela_profesional']);

        $pdf->SetFont($nimbusSans, '', 7, '', false);
        $total_creditos = 0;
        foreach ($asignaturas as $key => $item) {

            $max = max(array(
                $pdf->GetStringHeight(85, $item['nombre_asignatura']),
            )) + 3;

            $pdf->SetX(15);
            $pdf->MultiCell(10, $max, $key + 1, 'L', 'C', 0, 0, '', '', true, 0, false, true, $max, 'M');
            $pdf->MultiCell(25, $max, $item['ciclo'], '', 'C', 0, 0, '', '', true, 0, false, true, $max, 'M');
            $pdf->MultiCell(25, $max, $item['codigo'], '', 'C', 0, 0, '', '', true, 0, false, true, $max, 'M');
            $pdf->MultiCell(85, $max, $item['nombre_asignatura'], '', 'L', 0, 0, '', '', true, 0, false, true, $max, 'M');
            $pdf->MultiCell(20, $max, $item['seccion'], '', 'C', 0, 0, '', '', true, 0, false, true, $max, 'M');
            $pdf->MultiCell(20, $max, static::formatNumber($item['creditos']), 'R', 'C', 0, 1, '', '', true, 0, false, true, $max, 'M');
            // $pdf->Ln(1);

            $total_creditos += $item['creditos'];
        }

        // $pdf->SetFillColor(255,255,255);
        $pdf->SetX(15);
        $pdf->SetFont($nimbusSansBold, '', 7, '', false);
        $pdf->MultiCell(85, 7, 'OBSERVACIONES:', 'LTB', 'L', 0, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->MultiCell(80, 7, 'TOTAL DE CRÉDITOS MATRICULADOS:', 'RTB', 'R', 0, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->MultiCell(20, 7, static::formatNumber($total_creditos), 'RTB', 'C', 0, 1, '', '', true, 0, false, true, 7, 'M');
        $y_coordenada = $pdf->GetY();

        $pdf->SetX(15);
        $pdf->MultiCell(90, 30, '', 'LRB', 'C', 0, 0, '', '', true, 0, false, true, 30, 'M');
        $pdf->MultiCell(95, 30, '', 'RB', 'C', 0, 1, '', '', true, 0, false, true, 30, 'M');

        // $fecha_matricula = '<strong style="font-family: '.$nimbusSansBold.'; padding-top: 10px;">Fecha-Hora de matrícula: </strong> 18/03/2024 - 09:17';
        // $fecha_impresion = '<strong style="font-family: '.$nimbusSansBold.';">Fecha-Hora de Impresión: </strong> 18/03/2024 - 09:17';
        $fecha_matricula = $fecha_matricula;
        $fecha_impresion = $fecha_impresion;

        $pdf->SetX(15);
        $pdf->SetFont($nimbusSansBold, '', 7, '', false);
        $pdf->MultiCell(33, 7, 'Fecha-Hora de matrícula: ', 'LB', 'L', 0, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->SetFont($nimbusSans, '', 7, '', false);
        $pdf->MultiCell(57, 7, '-', 'RB', 'L', 0, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->SetFont($nimbusSansBold, '', 7, '', false);
        $pdf->MultiCell(34, 7, 'Fecha-Hora de Impresión: ', 'LB', 'L', 0, 0, '', '', true, 0, false, true, 7, 'M');
        $pdf->SetFont($nimbusSans, '', 7, '', false);
        $pdf->MultiCell(61, 7, $fecha_impresion, 'RB', 'L', 0, 1, '', '', true, 0, false, true, 7, 'M');
        
        $pdf->SetX(15);
        $pdf->MultiCell(90, 7, 'UNAJMA', '', 'L', 0, 0, '', '', true, 0, false, true, 7, 'M');

        $pdf->SetXY(40,$y_coordenada + 20);
        $pdf->SetFont($nimbusSansBold, '', 7, '', false);
        $pdf->MultiCell(40, 5, 'FIRMA DEL ESTUDIANTE', array('T' => array('width' => 0, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0))), 'C', 0, 0, '', '', true, 0, false, true, 5, 'M');
        $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
        $pdf->Line(40, $y_coordenada + 20, 80, $y_coordenada + 20/* , $style */);
        // $pdf->Line(5, $y_coordenada + 20 + 10, 85, $y_coordenada + 20 + 10/* , $style */);
        $pdf->SetLineStyle(array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
    }

    public static function getAsignaturas($escuela_profesional){
        $asignaturas = [];

        switch ($escuela_profesional) {
            case 'ADMINISTRACIÓN DE EMPRESAS':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AEAE11',
                        'nombre_asignatura' => 'REDACCIÓN UNIVERSITARIA Y ORATORIA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AEAE12',
                        'nombre_asignatura' => 'MATEMÁTICA I',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AEAE13',
                        'nombre_asignatura' => 'PENSAMIENTO ARGUEDIANO I',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AEAE14',
                        'nombre_asignatura' => 'TÉCNICAS DE APRENDIZAJE UNIVERSITARIO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AEAE15',
                        'nombre_asignatura' => 'FUNDAMENTOS DE LAS CIENCIAS EMPRESARIALES',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AEAE16',
                        'nombre_asignatura' => 'REALIDAD DE LA ECONOMÍA REGIONAL Y NACIONAL',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AEAE17',
                        'nombre_asignatura' => 'ÉTICA Y MORAL',
                        'seccion' => 'A',
                        'creditos' => 2,
                    ]
                ];
                break;
            case 'CONTABILIDAD':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'CTAE11',
                        'nombre_asignatura' => 'REDACCIÓN UNIVERSITARIA Y ORATORIA',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'CTAE12',
                        'nombre_asignatura' => 'MATEMÁTICA I',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'CTAE13',
                        'nombre_asignatura' => 'TÉCNICAS DE APRENDIZAJE UNIVERSITARIO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'CTAE14',
                        'nombre_asignatura' => 'ÉTICA Y MORAL',
                        'seccion' => 'A',
                        'creditos' => 2,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'CTAE15',
                        'nombre_asignatura' => 'REALIDAD REGIONAL Y NACIONAL',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'CTAE16',
                        'nombre_asignatura' => 'PENSAMIENTO ARGUEDIANO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'CTAE17',
                        'nombre_asignatura' => 'FUNDAMENTOS DE CONTABILIDAD',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ]
                ];
                break;
            case 'EDUCACIÓN PRIMARIA INTERCULTURAL':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EIAE11',
                        'nombre_asignatura' => 'HISTORIA DEL PERÚ CONTEMPORÁNEO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EIAE12',
                        'nombre_asignatura' => 'CIUDADANÍA INTERCULTURAL Y ÉTICA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EIAE13',
                        'nombre_asignatura' => 'FILOSOFÍA DE LA EDUCACIÓN',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EIAE14',
                        'nombre_asignatura' => 'TÉCNICAS PARA EL APRENDIZAJE UNIVERSITARIO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EIAE15',
                        'nombre_asignatura' => 'REDACCIÓN Y ARGUMENTACIÓN 1',
                        'seccion' => 'A',
                        'creditos' => 5,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EIAE16',
                        'nombre_asignatura' => 'MATEMÁTICA I',
                        'seccion' => 'A',
                        'creditos' => 5,
                    ]
                ];
                break;
            case 'INGENIERÍA AGROINDUSTRIAL':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IAAE11',
                        'nombre_asignatura' => 'MATEMÁTICA BÁSICA',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IAAE12',
                        'nombre_asignatura' => 'REDACCIÓN Y COMPOSICIÓN',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IAAE13',
                        'nombre_asignatura' => 'INTRODUCCIÓN A LA INGENIERÍA AGROINDUSTRIAL',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IAAE14',
                        'nombre_asignatura' => 'TÉCNICAS DE APRENDIZAJE UNIVERSITARIO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IAAE15',
                        'nombre_asignatura' => 'PENSAMIENTO ARGUEDIANO',
                        'seccion' => 'A',
                        'creditos' => 2,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IAAE16',
                        'nombre_asignatura' => 'FILOSOFÍA Y ÉTICA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IAAE17',
                        'nombre_asignatura' => 'REALIDAD REGIONAL Y NACIONAL',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ]
                ];
                break;
            case 'INGENIERÍA AMBIENTAL':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AMAD11',
                        'nombre_asignatura' => 'MATEMÁTICA BÁSICA',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AMAD12',
                        'nombre_asignatura' => 'QUÍMICA GENERAL E INORGÁNICA',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AMAD13',
                        'nombre_asignatura' => 'BIOLOGÍA GENERAL',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AMAD14',
                        'nombre_asignatura' => 'INTRODUCCIÓN A LA INGENIERÍA AMBIENTAL',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AMAD15',
                        'nombre_asignatura' => 'TÉCNICAS DE APRENDIZAJE UNIVERSITARIO',
                        'seccion' => 'A',
                        'creditos' => 2,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AMAD16',
                        'nombre_asignatura' => 'REDACCIÓN Y COMPOSICIÓN',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'AMAD17',
                        'nombre_asignatura' => 'FILOSOFÍA',
                        'seccion' => 'A',
                        'creditos' => 2,
                    ]
                ];
                break;
            case 'INGENIERÍA DE SISTEMAS':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IIAD11',
                        'nombre_asignatura' => 'REDACCIÓN UNIVERSITARIA Y ORATORIA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IIAD12',
                        'nombre_asignatura' => 'INGLÉS',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IIAD13',
                        'nombre_asignatura' => 'REALIDAD REGIONAL Y NACIONAL',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IIAD14',
                        'nombre_asignatura' => 'EXPRESIÓN ARTÍSTICA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IIAD15',
                        'nombre_asignatura' => 'DIBUJO DE INGENIERÍA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IIAD16',
                        'nombre_asignatura' => 'MATEMÁTICA BÁSICA I',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'IIAD17',
                        'nombre_asignatura' => 'INTRODUCCIÓN A LA INGENIERÍA DE SISTEMAS',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ]
                ];
                break;
            case 'ENFERMERÍA':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA11',
                        'nombre_asignatura' => 'MATEMÁTICA I',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA12',
                        'nombre_asignatura' => 'LENGUAJE Y COMUNICACIÓN',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA13',
                        'nombre_asignatura' => 'HISTORIA DEL PERÚ CONTEMPORÁNEO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA14',
                        'nombre_asignatura' => 'CIUDADANÍA INTERCULTURAL Y ÉTICA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA15',
                        'nombre_asignatura' => 'INFORMÁTICA Y TECNOLOGÍAS EDUCATIVAS',
                        'seccion' => 'A',
                        'creditos' => 2,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA16',
                        'nombre_asignatura' => 'PENSAMIENTO ARGUEDIANO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA17',
                        'nombre_asignatura' => 'TALLER DE RELACIONES HUMANAS',
                        'seccion' => 'A',
                        'creditos' => 1,
                    ]
                ];
                break;
            case 'PSICOLOGÍA':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA11',
                        'nombre_asignatura' => 'MATEMÁTICA I',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA12',
                        'nombre_asignatura' => 'LENGUAJE Y COMUNICACIÓN',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA13',
                        'nombre_asignatura' => 'HISTORIA DEL PERÚ CONTEMPORÁNEO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA14',
                        'nombre_asignatura' => 'CIUDADANÍA INTERCULTURAL Y ÉTICA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA15',
                        'nombre_asignatura' => 'INFORMÁTICA Y TECNOLOGÍAS EDUCATIVAS',
                        'seccion' => 'A',
                        'creditos' => 2,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA16',
                        'nombre_asignatura' => 'PENSAMIENTO ARGUEDIANO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA17',
                        'nombre_asignatura' => 'TALLER DE RELACIONES HUMANAS',
                        'seccion' => 'A',
                        'creditos' => 1,
                    ]
                ];
                break;
            case 'INGENIERÍA CIVIL':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA11',
                        'nombre_asignatura' => 'MATEMÁTICA I',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA12',
                        'nombre_asignatura' => 'LENGUAJE Y COMUNICACIÓN',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA13',
                        'nombre_asignatura' => 'HISTORIA DEL PERÚ CONTEMPORÁNEO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA14',
                        'nombre_asignatura' => 'CIUDADANÍA INTERCULTURAL Y ÉTICA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA15',
                        'nombre_asignatura' => 'INFORMÁTICA Y TECNOLOGÍAS EDUCATIVAS',
                        'seccion' => 'A',
                        'creditos' => 2,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA16',
                        'nombre_asignatura' => 'PENSAMIENTO ARGUEDIANO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA17',
                        'nombre_asignatura' => 'TALLER DE RELACIONES HUMANAS',
                        'seccion' => 'A',
                        'creditos' => 1,
                    ]
                ];
                break;
            case 'MATEMÁTICAS Y ESTADÍSTICA APLICADAS':
                $asignaturas = [
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA11',
                        'nombre_asignatura' => 'MATEMÁTICA I',
                        'seccion' => 'A',
                        'creditos' => 4,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA12',
                        'nombre_asignatura' => 'LENGUAJE Y COMUNICACIÓN',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA13',
                        'nombre_asignatura' => 'HISTORIA DEL PERÚ CONTEMPORÁNEO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA14',
                        'nombre_asignatura' => 'CIUDADANÍA INTERCULTURAL Y ÉTICA',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA15',
                        'nombre_asignatura' => 'INFORMÁTICA Y TECNOLOGÍAS EDUCATIVAS',
                        'seccion' => 'A',
                        'creditos' => 2,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA16',
                        'nombre_asignatura' => 'PENSAMIENTO ARGUEDIANO',
                        'seccion' => 'A',
                        'creditos' => 3,
                    ],
                    [
                        'ciclo' => 'Primero',
                        'codigo' => 'EGAA17',
                        'nombre_asignatura' => 'TALLER DE RELACIONES HUMANAS',
                        'seccion' => 'A',
                        'creditos' => 1,
                    ]
                ];
                break;
            default:
                $asignaturas = [];
                break;
        }

        return $asignaturas;
    }

    public static function getPlanEstudios($escuela_profesional){
        $plan_estudios = '';

        switch ($escuela_profesional) {
            case 'ADMINISTRACIÓN DE EMPRESAS':
                $plan_estudios = 'AEAE';
                break;
            case 'CONTABILIDAD':
                $plan_estudios = 'CTAE';
                break;
            case 'EDUCACIÓN PRIMARIA INTERCULTURAL':
                $plan_estudios = 'EIAE';
                break;
            case 'INGENIERÍA AGROINDUSTRIAL':
                $plan_estudios = 'IAAE';
                break;
            case 'INGENIERÍA AMBIENTAL':
                $plan_estudios = 'AMAD';
                break;
            case 'INGENIERÍA DE SISTEMAS':
                $plan_estudios = 'IIAD';
                break;
            case 'ENFERMERÍA':
                $plan_estudios = 'EGAA';
                break;
            case 'PSICOLOGÍA':
                $plan_estudios = 'EGAA';
                break;
            case 'INGENIERÍA CIVIL':
                $plan_estudios = 'EGAA';
                break;
            case 'MATEMÁTICAS Y ESTADÍSTICA APLICADAS':
                $plan_estudios = 'EGAA';
                break;
                
                
            
            default:
                $plan_estudios = 'NINGUNO';
                break;
        }

        return $plan_estudios;
    }

    public static function obtenerDiferenciaFechasV2($object){
        // $fecha_ingreso,
        // $fecha_vencimiento_contrato,
        // fecha_inicio_temp,
        // fecha_fin_temp,
        // dias,
        // agno,
        // mes,
        // fecha_primer_dia,
        // fecha_ultimo_dia;

        if($object->fecha_ingreso) $fecha_ingreso = \Carbon\Carbon::parse($object->fecha_ingreso);
        if($object->fecha_vencimiento_contrato) $fecha_vencimiento_contrato = \Carbon\Carbon::parse($object->fecha_vencimiento_contrato);

        $fecha_primer_dia =  \Carbon\Carbon::now()->startofMonth();
        $fecha_ultimo_dia = \Carbon\Carbon::now()->endofMonth();

        if(isset($fecha_vencimiento_contrato)){
            if($fecha_vencimiento_contrato > $fecha_ultimo_dia)
                $fecha_vencimiento_contrato = $fecha_ultimo_dia;
        }else{
            $fecha_vencimiento_contrato = $fecha_ultimo_dia;
        }
        

        if($fecha_ingreso < $fecha_primer_dia){
          $fecha_ingreso = $fecha_primer_dia;
        }

        // console.log('fecha_ingreso: ',fecha_ingreso,' fecha_vencimiento_contrato: ',fecha_vencimiento_contrato);
        $dias = self::diferenciaFechas(
                                        \Carbon\Carbon::parse($fecha_vencimiento_contrato)->format('Y-m-d'),
                                        \Carbon\Carbon::parse($fecha_ingreso)->format('Y-m-d')
                                    );
        return $dias['df']->d + 1;
    }

    /**
     * _Devuelve la diferencia de dos fechas expresado en años, meses, dias, horas, minutos y segundos
     * $fecha 1 debe ser mayor que $fecha2
     * @param [type] $fecha1
     * @param [type] $fecha2
     * @return void
     */
    public static function diferenciaFechas($fecha1, $fecha2)
    {
        $date1 = new DateTime($fecha1);
        $date2 = new DateTime($fecha2);

        $diff = $date1->diff($date2);

        $result = self::get_format($diff);

        return $result;
    }

    public static function get_format($df)
    {
        $str = '';
        // $str .= ($df->invert == 1) ? ' - ' : '';
        if ($df->y > 0) {
            // years
            $str .= ($df->y > 1) ? $df->y . ' Años ' : $df->y . ' Año ';
        }
        if ($df->m > 0) {
            // month
            $str .= ($df->m > 1) ? $df->m . ' Meses ' : $df->m . ' Mes ';
        }
        if ($df->d > 0) {
            // days
            $str .= ($df->d > 1) ? $df->d . ' Dias ' : $df->d . ' Dia ';
        }
        if ($df->h > 0) {
            // hours
            $str .= ($df->h > 1) ? $df->h . ' Horas ' : $df->h . ' Hora ';
        }
        if ($df->i > 0) {
            // minutes
            $str .= ($df->i > 1) ? $df->i . ' Minutos ' : $df->i . ' Minuto ';
        }
        if ($df->s > 0) {
            // seconds
            $str .= ($df->s > 1) ? $df->s . ' Segundos ' : $df->s . ' Segundo ';
        }

        return [
            'df' => $df,
            'str' => $str
        ];
    }

    public static function sumarTiempos($tiempo1, $tiempo2){
        $tiempo = new stdClass();
        $tiempo->y = 0;
        $tiempo->m = 0;
        $tiempo->d = 0;
        $tiempo->h = 0;
        $tiempo->i = 0;
        $tiempo->s = 0;

        if(isset($tiempo1->d)) $tiempo->d += $tiempo1->d;
        if(isset($tiempo2->d)) $tiempo->d += $tiempo2->d;

        if($tiempo->d>=30){
            $tiempo->m += intval($tiempo->d / 30);
            $tiempo->d = $tiempo->d % 30;
        }

        if(isset($tiempo1->m)) $tiempo->m += $tiempo1->m;
        if(isset($tiempo2->m)) $tiempo->m += $tiempo2->m;

        if($tiempo->d>=12){
            $tiempo->y += intval($tiempo->m / 12);
            $tiempo->m = $tiempo->m % 12;
        }

        if(isset($tiempo1->y)) $tiempo->y += $tiempo1->y;
        if(isset($tiempo2->y)) $tiempo->y += $tiempo2->y;

        return $tiempo;
    }

    public static function setHeaderLandscape($pdf, $datos)
    {
        //Logo
        $pdf->SetXY(5,0);
        $pdf->Image(config('global.logo'), '', '', 50, 30, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        # Datos Emisor

        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(58, 5);
        $x = $pdf->getX();
        $pdf->SetFont('times', '', 8);

        $pdf->MultiCell(74, 4, $datos->razon_social, 'L', 'L', 0, 1, '', '', true, 0, false, true, 4, 'M');
        $pdf->SetX($x);
        $pdf->MultiCell(74, 4, $datos->direccion, 'L', 'L', 0, 1, '', '', true, 0, false, true, 4, 'M');
        $pdf->SetX($x);
        $pdf->MultiCell(74, 4, $datos->distrito, 'L', 'L', 0, 1, '', '', true, 0, false, true, 4, 'M');
        $pdf->SetX($x);
        $pdf->MultiCell(74, 4, 'Tel: '.$datos->telefono, 'L', 'L', 0, 1, '', '', true, 0, false, true, 4, 'M');
        $pdf->SetX($x);
        $pdf->MultiCell(74, 4, 'Email: '.$datos->email, 'L', 'L', 0, 1, '', '', true, 0, false, true, 4, 'M');

        # Datos Comprobante
        $pdf->SetXY(140, 5);
        $pdf->SetFont('times', '', 10);
        $pdf->MultiCell(65, 7, 'R.U.C. ' . $datos->ruc, 'LTR', 'C', 0, 1, '', '', true, 0, false, true, 7, 'M');
        $pdf->SetX(140);
        $pdf->SetFont('times', '', 12);
        $pdf->MultiCell(65, 8, $datos->tipo_comprobante, 'LR', 'C', 0, 1, '', '', true, 0, false, true, 8, 'M');
        $pdf->SetX(140);
        $pdf->SetFont('times', '', 10);
        $pdf->MultiCell(65, 7, $datos->serie . ' - ' . $datos->correlativo, 'LRB', 'C', false, 1, '','', true, 0, false, true, 7, 'M');

        # Detalle del cliente        
        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetXY(5, 29);
        $y = $pdf->GetY();

        $pdf->SetTextColor(255, 255, 255);
        $pdf->MultiCell(27, 4, 'SEÑOR (TITULAR)', 1, 'L', true, 1, '', '', true, 0, false, false, 7);

        $pdf->SetXY(32, $y);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->MultiCell(100, 4, $datos->cliente_razon_social, 'TR', 'L', false, 1, '', '', true, 0, false,false, 7);

        $pdf->SetXY(5, 33);
        $y = $pdf->GetY();
        $pdf->SetTextColor(255, 255, 255);
        $pdf->MultiCell(27, 4, 'DIRECCIÓN', 1, 'L', true);

        $pdf->SetXY(32, $y);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->MultiCell(100, 4, $datos->cliente_direccion, 'R', 'L', false, 1, '', '', true, 0, false, false,7);

        $pdf->SetXY(5, 37);
        $y = $pdf->GetY();
        $pdf->SetTextColor(255, 255, 255);
        $pdf->MultiCell(27, 4, strtoupper($datos->cliente_tipo_documento_cliente), 1, 'L', true);
        $pdf->SetXY(32, $y);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->MultiCell(100, 4, $datos->cliente_numero_documento, 'RB', 'L');

        # Detalle adicional del documento
        $pdf->SetXY(140, 29);
        $y = $pdf->GetY();
        $pdf->MultiCell(32, 4, 'TIPO DE MONEDA', 'TL', 'L');
        $pdf->SetXY(172, $y);
        $pdf->MultiCell(10, 4, ':', 'T', 'C');
        $pdf->SetXY(182, $y);
        $pdf->MultiCell(23, 4, $datos->tipo_moneda, 'TR', 'L');
        $pdf->SetXY(140, 33);

        $y = $pdf->GetY();
        $pdf->MultiCell(32, 4, 'FECHA DE EMISIÓN', 'L', 'L');
        $pdf->SetXY(172, $y);
        $pdf->MultiCell(10, 4, ':', '', 'C');
        $pdf->SetXY(182, $y);
        $pdf->MultiCell(23, 4, $datos->fecha_emision, 'R', 'L');
        $pdf->SetXY(140, 37);

        $y = $pdf->GetY();
        $pdf->MultiCell(32, 4, 'FECHA VENCIMIENTO', 'BL', 'L');
        $pdf->SetXY(172, $y);
        $pdf->MultiCell(10, 4, ':', 'B', 'C');
        $pdf->SetXY(182, $y);
        $pdf->MultiCell(23, 4, $datos->fecha_vencimiento, 'BR', 'L');

        # Fila descriptiva del clientes
        $pdf->Ln(1.5);
        $pdf->SetX(5);
        $y = $pdf->GetY();
        $pdf->SetTextColor(255, 255, 255);
        $pdf->MultiCell(32, 4, 'CÓDIGO CLIENTE', 1, 'C', true, 0);
        $pdf->MultiCell(28, 4, 'NÚMERO PEDIDO', 1, 'C', true, 0);
        $pdf->MultiCell(35, 4, 'ORDEN DE COMPRA', 1, 'C', true, 0);
        $pdf->MultiCell(40, 4, 'NUMERO DE GUÍA', 1, 'C', true, 0);
        $pdf->MultiCell(40, 4, 'CONDICIONES DE PAGO', 1, 'C', true, 0);
        $pdf->MultiCell(25, 4, (!is_null(null)) ? 'DCTO. ORIGEN' : '', 1, 'C', true, 1);

        $pdf->Ln(0);
        $pdf->SetX(5);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->MultiCell(32, 4, $datos->cliente_numero_documento, 1, 'C', false, 0);
        $pdf->MultiCell(28, 4, '', 1, 'C', false, 0);
        $pdf->MultiCell(35, 4, '', 1, 'C', false, 0);
        $pdf->MultiCell(40, 4, '', 1, 'C', false, 0);
        $pdf->MultiCell(40, 4, '', 1, 'C', false, 0);
        $pdf->MultiCell(25, 4, '', 1, 'C', false, 1);
    }

    public static function setHourPaginateLandscape($pdf, $fecha_hora, $pagina, $total_paginas)
    {
        $pdf->SetXY(165,1);
        $pdf->SetFont('times', '', 8);
        $pdf->MultiCell(45, 4, $fecha_hora.' - '.'Pág. : '.$pagina.' de '.$total_paginas, '', 'R', 0, 1, '', '', true, 0, false, true, 4, 'M');
        $pdf->SetXY(10,40);

    }

    public static function setFooter($pdf, $datos, $fecha_impresion)
    {
        $pdf->SetXY(15,280);
        $nimbusSans = TCPDF_FONTS::addTTFfont(public_path().'/fonts/NimbusSanL-Reg.ttf', 'TrueTypeUnicode', '', 96);
        $nimbusSansBold = TCPDF_FONTS::addTTFfont(public_path().'/fonts/NimbusSanL-Bol.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont($nimbusSans, '', 8, '', false);
        $pdf->MultiCell(100, 4, "Fecha : ".$fecha_impresion, '', 'L', 0, 1, '', '', true, 0, false, true, 4, 'M');
        $pdf->SetXY(180,280);
        $pdf->MultiCell(20, 4, "Pág: 1/1", '', 'R', 0, 1, '', '', true, 0, false, true, 4, 'M');
    }

    public static function setFooterLanscape($pdf,$datos)
    {
        $pdf->SetXY(30,250);
        $pdf->SetFont('times', '', 8);
        $pdf->MultiCell(100, 5.33, 'SON: '.$datos->leyenda.' SOLES', '', 'L', 0, 1, '', '', true, 0, false, true, 5.33, 'M');

        # Pie de página
        $pdf->SetFont('times', '', 9);
        $pdf->Ln(1);
        $pdf->SetTextColor(255, 255, 255);
        $y = $pdf->GetY();
        $x = $pdf->GetX();
        $pdf->SetXY(5, $y);
        
        $pdf->MultiCell(30, 4, 'OP. EXONERADA', '', 'C', 1, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(30, 4, 'OP. INAFECTA', '', 'C', 1, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(30, 4, 'OP. GRAVADA', '', 'C', 1, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(30, 4, 'TOT. DSCTO.', '', 'C', 1, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(20, 4, 'I.S.C.', '', 'C', 1, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(20, 4, 'I.G.V.', '', 'C', 1, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(40, 4, 'IMPORTE TOTAL', '', 'C', 1, 1, '', '', true, 0, false, true, 4, 'M');
        
        $pdf->SetX(5);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->MultiCell(30, 4, '0.00', 'LRB', 'R', 0, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(30, 4, '0.00', 'RB', 'R', 0, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(30, 4, static::formatNumber($datos->operacion_gravada), 'RB', 'R', 0, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(30, 4, '', 'RB', 'R', 0, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(20, 4, '', 'RB', 'R', 0, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(20, 4, static::formatNumber($datos->igv), 'RB', 'R', 0, 0, '', '', true, 0, false, true, 4, 'M');
        $pdf->MultiCell(40, 4, static::formatNumber($datos->importe_total), 'RB', 'R', 0, 1, '', '', true, 0, false, true, 4, 'M');

        # Dibujar 4 lineas separadoras verticales
        $pdf->Line(5, 62.66, 5, 255.33, '');
        $pdf->Line(30, 62.66, 30, 255.33, '');
        $pdf->Line(105, 62.66, 105, 255.33, '');
        $pdf->Line(130, 62.66, 130, 255.33, '');
        $pdf->Line(155, 62.66, 155, 255.33, '');
        $pdf->Line(180, 62.66, 180, 255.33, '');
        $pdf->Line(205, 62.66, 205, 255.33, '');

        # Dibujar 1 linea separadoras horizontal
        $pdf->Line(5, 255.33, 205, 255.33, '');
    }

    public static function setPersonImage($pdf, $imagen)
    {
        $pdf->SetXY(165, 15);
        $pdf->Image('images/'.$imagen, '', '', 30, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
        $pdf->SetXY(10,50);
    }

    public static function heightExceededPortrait($pdf, $altura = 0,$datos = null)
    {
        if($pdf->GetY() + $altura > 250){
            self::addPagePortrait($pdf);
            return true;
        }
    }

    public static function addPagePortrait($pdf)
    {
        $pdf->AddPage("P","A4");
        $pdf->SetXY(10,52);
    }

    public static function dateFormat1($date,$withoutTime=false){
        if($withoutTime)
            return \Carbon\Carbon::parse($date)->format("d-m-Y");
        else
            return \Carbon\Carbon::parse($date)->format("d-m-Y H:i:s");
    }

    public static function formatNumber($number){
        return number_format($number,2,'.',' ');
    }

    public static function getFechaLeida($fecha){
        $anio = \Carbon\Carbon::parse($fecha)->year;
        $_mes = \Carbon\Carbon::parse($fecha)->month;
        $dia = \Carbon\Carbon::parse($fecha)->day;

        switch ($_mes) {
            case '1':
                $mes = 'enero';
                break;
            case '2':
                $mes = 'febrero';
                break;
            case '3':
                $mes = 'marzo';
                break;
            case '4':
                $mes = 'abril';
                break;
            case '5':
                $mes = 'mayo';
                break;
            case '6':
                $mes = 'junio';
                break;
            case '7':
                $mes = 'julio';
                break;
            case '8':
                $mes = 'agosto';
                break;
            case '9':
                $mes = 'setiembre';
                break;
            case '10':
                $mes = 'octubre';
                break;
            case '11':
                $mes = 'noviembre';
                break;
            case '12':
                $mes = 'diciembre';
                break;
            
            default:
                $mes = '';
                break;
        }

        return 'Andahuaylas, '.str_pad($dia,  2, "0", STR_PAD_LEFT).' de '.$mes.' del '.$anio;
    }
}
