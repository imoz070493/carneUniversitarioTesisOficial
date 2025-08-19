<?php
namespace App\Http\Controllers\ExportExcel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

class GenericExport
{
	public static function exportExcelTable($columns, $datos, $nombreTabla, $filename = false,$formateadores = [])
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

		$hoja = $documento->getActiveSheet();

		//Redimensiona el ancho de las columnas
		$letra = 'A';
		for ($i = 0; $i < count($columns); $i++) {
			$hoja->getColumnDimension($letra)->setAutoSize(true);
			$letra++;
		}

		//Asigna estilos al encabezado
		$hoja->getStyle("A1:" . $letra . "1")->applyFromArray($styleArray);


		$hoja->setTitle($nombreTabla);
		$hoja->setCellValue("A1", "N°");





		//Imprime los encabezados
		$letra = 'B';


        //en caso de ser los encabezados un array asociativo
        foreach ($columns as $key => $value) {
            $hoja->setCellValue($letra . "1", $value);
    
            $letra++;
        }
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

		for ($i = 0; $i < count($datos); $i++) {
			$letra = 'A';
			$hoja->setCellValue($letra . ($i + 2), ($i + 1));
			
			$letra = 'B';
            $hoja->setCellValue($letra . ($i + 2), ($i + 1));
            
            foreach ($columns as $key => $value) {
                if (array_key_exists($key, $formateadores)) {
					$valor = $formateadores[$key]($datos[$i]);
					$hoja->setCellValue($letra . ($i + 2),	$valor);
				} else {
					$valor = $datos[$i][$key];
					$hoja->setCellValue($letra . ($i + 2), $valor);
                }
                $letra++;
            }

			// for ($k = 0; $k < count($columns); $k++) {
			// 	if (in_array($columns[$k], $exclude)) continue;
			// 	$letra++;
			// 	$columna = $columns[$k];
				
			// }
		}
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

		$writer = new XlsxWriter($documento);

		// if ($empresa->ruta_logo) {
		// 	$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		// 	$drawing->setName('Logo');
		// 	$drawing->setDescription('Logo');
		// 	//LOG::info(boolval(file_exists(public_path() . '/images/' . $empresa->ruta_logo)));
		// 	if (file_exists(public_path() . '/images/' . $empresa->ruta_logo)) {
		// 		$drawing->setPath(public_path() . '/images/' . $empresa->ruta_logo);
		// 		$drawing->setHeight(80);
		// 		$drawing->setWorksheet($documento->getActiveSheet());
		// 	}
		// }

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
}