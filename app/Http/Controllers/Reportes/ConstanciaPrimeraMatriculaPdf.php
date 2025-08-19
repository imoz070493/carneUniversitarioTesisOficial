<?php
namespace App\Http\Controllers\Reportes;

use stdClass;

use TCPDF;
use DateTime;
use Symfony\Component\HttpFoundation\StreamedResponse;
use TCPDF_FONTS;

class ConstanciaPrimeraMatriculaPdf
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
        $pdf->AddPage("P","A4");

        //Insertar encabezado
        // self::setHeaderLandscape($pdf);
        //Insertar foto del personal
        // self::setPersonImage($pdf, $datos['personal']->imagen);

        /**
         * Dibuja lineas de prueba
         */
        // $pdf->Line(5, 55 + $alturas_agrupadas[0][2], 180, 55 + $alturas_agrupadas[0][2], '');
        // $pdf->Line(5, $pdf->GetY(), 180, $pdf->GetY(), '');

        //Logo
        $pdf->SetXY(25,20);
        $pdf->Image(public_path().'/images/encabezado.png', '', '', 160, 35, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $pdf->SetXY(160,230);
        $pdf->Image(public_path().'/images/iso.png', '', '', 30, 40, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // $pdf->SetXY(10,52);
        // self::encabezadoReporteGeneral($pdf,$datos);

        $numero = $datos['data']->num_correlativo;
        $anio = $datos['data']->anio;

        $pdf->SetXY(175,10);
        $fontname = TCPDF_FONTS::addTTFfont(public_path().'/fonts/ROCC____.TTF', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont($fontname, '', 14, '', false);
        $text_numero = 'N° '.$numero.'-'.$anio;
        $altura_z = $pdf->GetStringHeight(30, $text_numero) + 3;
        $pdf->MultiCell(30, $altura_z, $text_numero, 'LRBT', 'C', 0, 0, '', '', true, 0, false, true, $altura_z, 'M');

        $pdf->SetXY(20,60);
        $fontname = TCPDF_FONTS::addTTFfont(public_path().'/fonts/ARLRDBD.TTF', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont($fontname, '', 22, '', false);
        // $pdf->SetFont('times', '', 20, '', false);
        $pdf->MultiCell(170, 20, '<u>C O N S T A N C I A</u>', '', 'C', 0, 1, '', '', true, 0, true, true, 20, 'M');
        // $pdf->MultiCell(170, 20, '<div style="font-family:arialbi;">C O N S T A N C I A</div>', '', 'C', 0, 1, '', '', true, 0, true, true, 20, 'M');
        
        $fontname = TCPDF_FONTS::addTTFfont(public_path().'/fonts/ariali.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont($fontname, '', 12, '', false);
        $pdf->SetX(25);
        $la_oficina_de_registros = '<div style="text-align:justify;">La Oficina de Registros Académicos de la Universidad Nacional José María Arguedas, hace constar:</div>';
        $pdf->setCellHeightRatio(1.8);//Interlineado
        $altura_a = $pdf->GetStringHeight(160, $la_oficina_de_registros) + 0.5;
        $pdf->MultiCell(160, $altura_a, $la_oficina_de_registros, '', '', 0, 0, '', '', true, 0, true, true, $altura_a, 'M');
        $pdf->Ln(18);

        $nombre_completo = strtoupper(trim($datos['data']->apellido_paterno)." ".trim($datos['data']->apellido_materno)." ".trim($datos['data']->nombres));
        $dni = $datos['data']->dni;
        $codigo_estudiante = $datos['data']->codigo_estudiante;
        $escuela_profesional = $datos['data']->escuela_profesional;

        if( $escuela_profesional=='ADMINISTRACION DE EMPRESAS' ||
            $escuela_profesional=='EDUCACIÓN PRIMARIA INTERCULTURAL' ||
            $escuela_profesional=='CONTABILIDAD' ||
            $escuela_profesional=='INGENIERÍA AMBIENTAL' ||
            $escuela_profesional=='INGENIERÍA DE SISTEMAS'
        ){
            $sede = 'Ccoyahuacho';
        }elseif($escuela_profesional=='INGENIERÍA AGROINDUSTRIAL'){
            $sede = 'Santa Rosa';
        }
        
        $ciclo = $datos['data']->ciclo;
        $periodo = $datos['data']->periodo;
        $semestre = static::getSemestre($datos['data']->codigo_estudiante);
        $fecha_leida2 = static::getFechaLeidaTipo2($datos['data']->fecha_primera_matricula);
        $de_la = $datos['data']->sexo=='MASCULINO'?'del interesado':($datos['data']->sexo=='FEMENINO'?'de la interesada':' del interesado');
        // $body = 'Que el(la) estudiante: <strong style="font-family: arialbi;">'.$nombre_completo.'</strong>; identificado con DNI: $dni y código: $codigo_estudiante, perteneciente a la Escuela Profesional de $escuela_profesional, con Sede - $sede, ha registrado matricula en el $ciclo Ciclo, en el semestre académico $periodo, así consta en el Sistema Integrado de Gestión Académica Universitaria (SIGAU – UNAJMA).<br>Se expide la presente constancia, a solicitud $de_la, para los fines que estime pertinente.';
        $body = 'Que el(la) estudiante: <strong style="font-family: arialbi;">'.$nombre_completo.'</strong>, con código de matrícula N° '.$codigo_estudiante.', de la Escuela Profesional de <strong style="font-family: arialbi;">'.$escuela_profesional.', ha registrado matrícula en el Semestre Académico '.$semestre.'</strong>, correspondiente al I Semestre Académico, el mismo que según calendario académico realizó su matrícula el día '.$fecha_leida2.', tal como consta en los archivos de la Oficina Registros Académicos de esta Universidad, al cual me remito en caso necesario.';

        $fontname = TCPDF_FONTS::addTTFfont(public_path().'/fonts/arialbi.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->AddFont($fontname);
        // $pdf->SetFont($fontname, '', 12, '', false);
        // $pdf->SetFont('times', '', 9);
        $pdf->SetX(25);
        $pdf->setCellHeightRatio(1.8);//Interlineado
        $altura = $pdf->GetStringHeight(160, $body) + 0.5;
        $pdf->MultiCell(160, $altura, $body, '', 'J', 0, 1, '', '', true, 0, true, true, $altura, 'M');
        
        $nota = "Se expide la presente constancia, a solicitud $de_la, para los fines que estime pertinente.";
        $fontname = TCPDF_FONTS::addTTFfont(public_path().'/fonts/ariali.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont($fontname, '', 12, '', false);
        $pdf->SetX(25);
        $pdf->setCellHeightRatio(1.8);//Interlineado
        $altura_c = $pdf->GetStringHeight(160, $nota) + 0.5;
        $pdf->MultiCell(160, $altura_c, $nota, '', 'J', 0, 1, '', '', true, 0, true, true, $altura_c, 'M');
        $pdf->Ln(5);

        $fecha_leida = static::getFechaLeidaTipo1($datos['data']->fecha_procesado);
        $fontname = TCPDF_FONTS::addTTFfont(public_path().'/fonts/ariali.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont($fontname, '', 12, '', false);
        $pdf->SetX(25);
        $pdf->setCellHeightRatio(1.8);//Interlineado
        $altura_d = $pdf->GetStringHeight(160, $fecha_leida) + 0.5;
        $pdf->MultiCell(160, $altura_d, $fecha_leida, '', 'R', 0, 1, '', '', true, 0, false, true, $altura_d, 'M');
        $pdf->Ln(30);

        $pdf->setCellHeightRatio(1);//Interlineado
        $pdf->SetFont('times', '', 9);
        $cc = "C.c. Archivo.";
        $pdf->SetX(25);
        $pdf->MultiCell(14, 80, $cc, '', 'L', 0, 1, '', '', true, 0, false, true, 80, 'M');
        $pdf->SetX(25);
        $pdf->MultiCell(160, 1, '', 'T', 'R', 0, 0, '', '', true, 0, false, true, 20, 'M');
        $html = '<div style="text-align: center; padding-top: 0px;">
            <strong>Sede Administrativa Central:</strong> Jr. Juan Francisco. Ramos Nº 380 - Andahuaylas,  Tf.: 083-421992<br>
            <strong>Sede Académica - Centro Pre Universitario:</strong> Av. Sol Naciente s7n – Totoral - San Jerónimo, Tf.: 083-422258<br>
            <strong>Escuela Profesional de Ingeniería Agroindustrial:</strong> Av. 28 de Julio Nº 1103 – Talavera, Tf.: 083-424099<br>
            <strong>Escuela Profesional de Ingeniería de Sistemas y Administración de Empresas:</strong> Av. José María Arguedas s/n –  Ccoyahuacho - San Jerónimo
        </div>';

        // output the HTML content
        $pdf->SetX(25);
        $pdf->MultiCell(160, 40, $html, '', 'R', 0, 1, '', '', true, 0, true, true, 40, 'M');
        //  $pdf->writeHTML($html, true, false, true, false, '');
        // foreach ($datos['data'] as $key => $item) {

        //     //Obtenemos el numero mayor y le incrementamos 0.5 para que pinten completo el texto
        //     $max = max(array(
        //         $pdf->GetStringHeight(75, $item->nombre_articulo),
        //         $pdf->GetStringHeight(25, $item->nombre_unidad_medida),
        //     )) + 0.5;

        //     $salta_reporte_general = self::heightExceededPortrait($pdf, $max);
        //     if($salta_reporte_general)
        //         self::encabezadoReporteGeneral($pdf,$datos);

        //     $pdf->SetX(5);
        //     $pdf->SetFont('times', '', 9);
        //     $pdf->MultiCell(25, $max, $item->codigo, '', 'L', 0, 0, '', '', true, 0, false, true, $max, 'M');
        //     $pdf->MultiCell(75, $max, $item->nombre_articulo, '', 'L', 0, 0, '', '', true, 0, false, true, $max, 'M');
        //     $pdf->MultiCell(25, $max, $item->nombre_unidad_medida, '', 'C', 0, 0, '', '', true, 0, false, true, $max, 'M');
        //     $pdf->MultiCell(25, $max, $item->cantidad, '', 'R', 0, 0, '', '', true, 0, false, true, $max, 'M');
        //     $pdf->MultiCell(25, $max, static::formatNumber($item->precio_unitario), '', 'R', 0, 0, '', '', true, 0, false, true, $max, 'M');
        //     $pdf->MultiCell(25, $max, static::formatNumber($item->subtotal), '', 'R', 0, 1, '', '', true, 0, false, true, $max, 'M');
        //     $pdf->Ln(1);

        // }

        /**
         * Paint Header
         */
        $total_paginas = $pdf->getPage();
        for ($i=1; $i <= $total_paginas ; $i++) { 
            $pdf->setPage($i);
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

        $pdf->SetX(5);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('helvetica', '', 9);

        $fontname = TCPDF_FONTS::addTTFfont(public_path().'/fonts/CHILLER.TTF', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont($fontname, '', 14, '', false);
        $pdf->MultiCell(25, 10, "CHILLER", '', 'L', 0, 0, '', '', true, 0, false, true, 10, 'M');

        $pdf->MultiCell(25, 10.66, 'CÓDIGO', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        $pdf->MultiCell(75, 10.66, 'DESCRIPCION DEL ARTICULO', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        $pdf->MultiCell(25, 10.66, 'U.M.', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        $pdf->MultiCell(25, 10.66, 'CANTIDAD', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        $pdf->MultiCell(25, 10.66, 'P.U.', 1, 'C', 1, 0, '', '', true, 0, false, true, 10.66, 'M');
        $pdf->MultiCell(25, 10.66, 'SUBTOTAL', 1, 'C', 1, 1, '', '', true, 0, false, true, 10.66, 'M');


        $pdf->SetTextColor(0, 0, 0);
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

    public static function getFechaLeidaTipo1($fecha){
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

    public static function getFechaLeidaTipo2($fecha){
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

        return str_pad($dia,  2, "0", STR_PAD_LEFT).' de '.$mes.' del año '.$anio;
    }

    public static function getSemestre($codigo_estudiante){
        if(substr($codigo_estudiante,0,5)=="00000"){
            $anio = "200".substr($codigo_estudiante,5,1);
            if(substr($codigo_estudiante,6,1)==1)
                $periodo = 'I';
            if(substr($codigo_estudiante,6,1)==2)
                $periodo = 'II';
        }else{
            $anio = substr($codigo_estudiante,5,4);
            if(substr($codigo_estudiante,-1)==1)
                $periodo = 'I';
            if(substr($codigo_estudiante,-1)==2)
                $periodo = 'II';
        }


        return $anio." - ".$periodo;
    }
}
