<?php
namespace App\Http\Controllers\ExportExcel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

class EntregasExport
{
	public static function exportExcelTable($data, $nombreTabla, $filename = false,$formateadores = [])
	{

		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("TICNOVATE")
			->setTitle($nombreTabla)
			->setSubject('Reporte ---')
			// ->setDescription('Este documento fue generado para DIAMIRE')
			// ->setKeywords(join(" ", [
			// 	'DIAMIRE',
			// 	$nombreTabla, 'REPORTE'
			// ]))
			->setCategory('reporte');

		

		$hoja = $documento->getActiveSheet();

		// Preparando variables dinamicas
		$columns = $data['columns'];
		$datos = $data['entregas'];
		$row_start = 7;
		$column_start = 'F';
		$column_finish = static::incrementarLetra('E',count($columns));

		//Redimensiona el ancho de las columnas
		$letra = 'E';
		for ($i = 0; $i < count($columns); $i++) {
			$hoja->getColumnDimension($letra)->setAutoSize(true);
			$letra++;
		}

		static::setHeader($documento, $row_start - 2, $column_start, $column_finish, $data, $nombreTabla);





		//Imprime los encabezados
		$letra = 'F';
		$ultima_columna = static::incrementarLetra('E',count($columns));


        
        // for ($i = 0; $i < count($columns); $i++) {
        // }
		// if (self::isArrayAssoc($columns)) {
		// 	foreach ($columns as $key => $title) {
		// 		if (in_array($key, $exclude)) continue;
		// 		$hoja->setCellValue($letra . "5", strtoupper($title));
		// 		$letra++;
		// 	}
		// 	$columns = array_keys($columns);
		// } else {
		// 	for ($i = 0; $i < count($columns); $i++) {
		// 		$hoja->setCellValue($letra . "5", strtoupper($columns[$i]));

		// 		$letra++;
		// 	}
		// }

		//Imprime las columnas

		$row = $row_start;
		foreach($datos as $key => $entrega) {
			$letra = 'A';
			$hoja->setCellValue($letra . $row, $entrega->nombre_articulo);
			
			$letra = 'B';
			$hoja->setCellValue($letra . $row, $entrega->cantidad);
			$letra = 'C';
			$hoja->setCellValue($letra . $row, $entrega->precio_venta);
			$letra = 'F';
            // $hoja->setCellValue($letra . $i, ($i + 1));
            
            foreach ($entrega->detalle_entrega as $key => $value) {
				$hoja->setCellValue($letra . $row, ($value->cantidad)?$value->cantidad:'');
                // if (array_key_exists($key, $formateadores)) {
				// 	$valor = $formateadores[$key]($datos[$i]);
				// 	$hoja->setCellValue($letra . $i,	$valor);
				// } else {
				// 	$valor = $datos[$i][$key];
				// 	$hoja->setCellValue($letra . $i, $valor);
                // }
                $letra++;
            }

			$row++;
		}

		$letra_entregado = 'D';
		$letra_saldo = 'E';
		$primera_columna = 'F';
		$ultima_columna = $ultima_columna;

		$row = $row_start;
		foreach ($datos as $key => $entrega) {
			$hoja->setCellValue($letra_entregado . $row, '=SUM('.$primera_columna.$row.':'.$ultima_columna.$row.')');
			$hoja->setCellValue($letra_saldo . $row, '='.'B'.$row.'-D'.$row);
			$row++;
		}

		static::resizeColumns($documento, 'E', $columns);

		//Paginas que se repiten
		$documento->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 5);

		$documento->getActiveSheet()->getHeaderFooter()
			->setOddFooter('&L&B' . $documento->getProperties()->getTitle() . '&RPage &P of &N');

		//Bordes de celda
		// $styleBorder = [
		// 	'borders' => [
		// 		'allBorders' => [
		// 			'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		// 			'color' => ['argb' => '000000'],
		// 		],
		// 	],
		// ];

		// $hoja->getStyle('B2:G8')->applyFromArray($styleBorder);

		static::setLogo($documento);

		$writer = new XlsxWriter($documento);

		

		// self::setTitulo($documento, $empresa, $nombreTabla);

		if ($filename == 'php://output') {
			$response =  new StreamedResponse(
				function () use ($writer) {
					$writer->save('php://output');
				}
			);
			$response->headers->set('Content-Type', 'application/vnd.ms-excel');
			$response->headers->set('Content-Disposition', 'attachment;filename="ExportScan.xls"');
			$response->headers->set('Cache-Control', 'max-age=0');
			return $response;
		} else {

			if (!file_exists(public_path() . '/document/exports')) {
				mkdir(public_path() . "/document/exports", 0777);
			}

			if ($filename) {
				$document_name = "/document/exports/" . $filename . ".xlsx";
			} else {
				$document_name = "/document/exports/" . $nombreTabla . "-" . date("Y-m-d-H-i-s") . ".xlsx";
			}

			# Le pasamos la ruta de guardado
			$writer->save(public_path() . $document_name);

			return $document_name;
		}
	}

	public static function setTitulo($documento, $empresa, $nombreTabla)
	{

		$richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
		$payable1 = $richText->createTextRun("REPORTE DE " . strtoupper($nombreTabla) . "\n");
		$payable1->getFont()->setBold(true);
		$payable1->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKGREEN));
		$payable1->getFont()->setSize(16);
		$payable1->getFont()->setName("Arial");
		$payable1->getFont()->setUnderline(2);

		$payable2 = $richText->createTextRun(config('global.razon_social') . "\n");
		$payable2->getFont()->setBold(true);
		$payable2->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
		$payable2->getFont()->setSize(10);
		$payable2->getFont()->setName("Arial");

		$payable3 = $richText->createTextRun("RUC: " . config('global.ruc') . "\n");
		$payable3->getFont()->setBold(true);
		$payable3->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
		$payable3->getFont()->setSize(10);
		$payable3->getFont()->setName("Arial");

		$payable4 = $richText->createTextRun("Direccion: " . config('global.direccion') . " - Telefono:" . config('global.telefono') . " - Correo: " . config('global.correo') . "\n");
		$payable4->getFont()->setBold(true);
		$payable4->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
		$payable4->getFont()->setSize(7);
		$payable4->getFont()->setItalic(true);

		$documento->getActiveSheet()->mergeCells('A1:G4');

		$documento->getActiveSheet()->getCell('A1')->setValue($richText);
		$documento->getActiveSheet()->getStyle('A1')->getAlignment()
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setWrapText(true);
	}

	public static function setHeader($documento, $row_start, $column_start, $column_finish, $data, $nombreTabla){
		$hoja = $documento->getActiveSheet();
		$letra = $column_start;
		$columns = $data['columns'];
		$nombre_cliente = $data['nombre_cliente'];
		$direccion = $data['direccion'];
		$comprobante = $data['comprobante'];
		$column_finish = count($data['columns']) > 0 ? $column_finish : 'F';

		$hoja->setTitle($nombreTabla);

		$hoja->setCellValue("B1", "Cliente:");
		$hoja->setCellValue("B2", "Dirección:");
		$hoja->setCellValue("B3", "Comp:");

		$hoja->setCellValue("C1", $nombre_cliente);
		$hoja->setCellValue("C2", $direccion);
		$hoja->setCellValue("C3", $comprobante);

		$hoja->setCellValue("A".$row_start, "Materiales");
		$hoja->setCellValue("B".$row_start, "Cantidad");
		$hoja->setCellValue("C".$row_start, "Precio Venta");
		$hoja->setCellValue("D".$row_start, "Entregado");
		$hoja->setCellValue("E".$row_start, "Saldo");
		$hoja->setCellValue("F".$row_start, "Fechas");

		$hoja->mergeCells('A' . $row_start . ':' . 'A' . ($row_start + 1));
		$hoja->mergeCells('B' . $row_start . ':' . 'B' . ($row_start + 1));
		$hoja->mergeCells('C' . $row_start . ':' . 'C' . ($row_start + 1));
		$hoja->mergeCells('D' . $row_start . ':' . 'D' . ($row_start + 1));
		$hoja->mergeCells('E' . $row_start . ':' . 'E' . ($row_start + 1));
		$hoja->mergeCells($column_start . $row_start . ':' . $column_finish . $row_start);

		//en caso de ser los encabezados un array asociativo
		$row = $row_start + 1;
        foreach ($columns as $key => $value) {
            $hoja->setCellValue($letra . $row, $value);
    
            $letra++;
        }

		$styleArray = array(
			'font'  => array(
				'bold'  => true,
				'color' => array('rgb' => 'FFFFF0'),
				'size'  => 10,
				'name'  => 'Arial',
			),
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
				'rotation' => 90,
				'startColor' => [
					'rgb' => '000000',
					// 'argb' => '000000',
				],
				// 'endColor' => [
				// 	'argb' => 'FFFFFFFF',
				// ],
			],
		);

		//Asigna estilos al encabezado
		$hoja->getStyle("A$row_start:" . $column_finish . ($row_start + 1))->applyFromArray($styleArray)
					->getAlignment()
					->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
					->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
					->setWrapText(true);
		$hoja->getStyle("B1:B3")->applyFromArray($styleArray);
	}

	public static function setLogo($documento){
		// if ($empresa->ruta_logo) {
			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('Logo');
			$drawing->setDescription('Logo');
			//LOG::info(boolval(file_exists(public_path() . '/images/' . $empresa->ruta_logo)));
			if (file_exists(public_path() . '/'.config('global.logo') /* . $empresa->ruta_logo */)) {
				$drawing->setPath(public_path() . '/'.config('global.logo') /* . $empresa->ruta_logo */);
				$drawing->setHeight(80);
				$drawing->setWorksheet($documento->getActiveSheet());
			}
		// }
	}

	public static function resizeColumns($documento, $letra, $columns){
		$hoja = $documento->getActiveSheet();
		// $hoja->getColumnDimension('A')->setAutoSize(true);
		$hoja->getColumnDimension('A')->setWidth(45);
		$hoja->getColumnDimension('B')->setAutoSize(true);
		$hoja->getColumnDimension('C')->setAutoSize(true);
		$hoja->getColumnDimension('D')->setAutoSize(true);
		$hoja->getColumnDimension('E')->setAutoSize(true);

		$letra++;
		for ($i = 0; $i < count($columns); $i++) {
			$hoja->getColumnDimension($letra)->setAutoSize(true);
			$letra++;
		}
	}

	static function isArrayAssoc(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
		}
		
		static function get_val($obj, $key, $default = null, $subPathSeparator = false)
    {
        if ($subPathSeparator) {
            if (is_string($key)) {
                $key = explode('.', $key);
            }
            if (count($key) <= 1)
                return get_val($obj, $key[0], $default, false);
            else {
                $key0 = array_shift($key);
                if (is_array($obj)) {
                    if (array_key_exists($key0, $obj)) {
                        return get_val($obj[$key0], $key, $default, true);
                    }
                } elseif (is_object($obj)) {
                    if (property_exists($obj, $key0)) {
                        return get_val($obj->$key0, $key, $default, true);
                    }
                }
            }
        } else {
            if (is_array($obj)) {
                if (array_key_exists($key, $obj)) {
                    return $obj[$key];
                }
            } elseif (is_object($obj)) {
                if (property_exists($obj, $key)) {
                    return $obj->$key;
                }
            }
        }
        return $default;
    }

	public static function incrementarLetra($letra,$numero){
		for ($i=0; $i < $numero; $i++) {
			$letra++;
		}
		return $letra;
	}
}