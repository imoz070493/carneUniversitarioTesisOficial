<?php
namespace App\Helpers\Import;

use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use Illuminate\Support\Facades\Log;
use DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PersonaDniImport{
    public static function guardarExcel($document_excel){
		$exploded = explode(',',$document_excel);
        $decoded = base64_decode($exploded[1]);

        if(strpos($exploded[0],'vnd.openxmlformats-officedocument.spreadsheetml.sheet')){
            $extension = 'xlsx';
        }else{
            $extension = '';
        }

        $fileName = Str::random().'.'.$extension;

		// if (!file_exists(Storage::disk('imports')) {
        //     mkdir(Storage::disk('imports'), 0777);
        // }
		// $path = public_path().'/document/imports/'.$fileName;

        // file_put_contents($path, $decoded);
        Storage::disk('imports')->put($fileName, $decoded);

        //INSERTAR MEDIANTE MODELO
        // DB::table("document")->insert('path')

        return $fileName;
	}

    public static function guardarDatos($fileName){
		// LOG::info("Filename: ".$fileName);

		$path = public_path().'/storage/imports/'.$fileName;
        // $path = Storage::url('app/public/imports/'.$fileName);

		$reader = new Xlsx();
		$spreadsheet = $reader->load($path);
		$objWorksheet = $spreadsheet->getActiveSheet();
		$highestRow = $objWorksheet->getHighestRow();
		
		$name_sheet = $objWorksheet->getTitle();
		// $exploded = explode('-',$name_sheet);
		// $agno = $exploded[0];
		// $mes = $exploded[1];

		// Log::info("Nombre Hoja: ".$objWorksheet->getTitle());
		// $numero_dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $agno) + 10;

		$errors = []; $data=[];
		for ($row = 2; $row <= $highestRow; $row++) {
			//Numero Documento
			if(!self::validarNumeroDocumento($objWorksheet->getCellByColumnAndRow(2, $row)->getFormattedValue())){
				array_push($errors,"El valor: ".$objWorksheet->getCellByColumnAndRow(2, $row)." numero de documento de la fila: ".$row." es invalido.");
			}
			
            array_push($data,$objWorksheet->getCellByColumnAndRow(2, $row)->getFormattedValue());
		}

        $documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("IMOZ")
			->setLastModifiedBy('Irving') // última vez modificado por
			// ->setTitle($nombreTabla)
			->setSubject('Reporte DNI')
			->setDescription('Este documento fue generado para IMOZ')
			->setKeywords(join(" ", [
				'IMOZ',
				'REPORTE'
			]))
			->setCategory('reporte');

		if(count($errors)>0){
	    	return $errors;
		}

        $writer = new XlsxWriter($documento);

        $columns = [
            'Nro',
            'DNI',
            'Apellido Paterno',
            'Apellido Materno',
            'Nombres',
        ];

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
            if($i<count($columns)-1)
			    $letra++;
		}
        $letra--;
        \Log::info("Letra: ".$letra);
        //Asigna estilos al encabezado
		$hoja->getStyle("A1:" . $letra . "1")->applyFromArray($styleArray);


		$hoja->setTitle("Reporte DNI");
		// $hoja->setCellValue("A1", "N°");

        $letra = 'A';
        //en caso de ser los encabezados un array asociativo
        foreach ($columns as $key => $value) {
            $hoja->setCellValue($letra . "1", $value);
    
            $letra++;
        }
        \Log::info('Cantidad: '.count($data));
        foreach ($data as $key => $dni) {

            $nro = $key + 1;
            $row = $key + 2;
            \Log::info($key);
            $datos = \App\Documento::obtenerDocumento('dni',$dni);
            // if(isset($datos->apellidoPaterno))
            //     \Log::info($datos->apellidoPaterno);
            // else
            //     \Log::info($datos);
            // $datos = new \stdClass();
            $apellido_paterno = isset($datos->apellidoPaterno)?$datos->apellidoPaterno:'-';
            $apellido_materno = isset($datos->apellidoMaterno)?$datos->apellidoMaterno:'-';
            $nombres = isset($datos->nombres)?$datos->nombres:'-';
            \Log::info($apellido_paterno);
            // Nro
            $hoja->setCellValue('A' . $row, $nro);

            // DNI
            $hoja->setCellValue('B' . $row, $dni);

            // Apellido Paterno
            $hoja->setCellValue('C' . $row, $apellido_paterno);

            // Apellido Materno
            $hoja->setCellValue('D' . $row, $apellido_materno);

            // Nombres
            $hoja->setCellValue('E' . $row, $nombres);
        }

		//Imprime los encabezados
		$letra = 'B';

		$response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="ExportScan.xls"');
        $response->headers->set('Cache-Control', 'max-age=0');
        return $response;
	}

    public static function validarNumeroDocumento($numero_documento){
        if(strlen($numero_documento)!=8)
            return false;
        
        if(!is_numeric($numero_documento))
            return false;
        
        return true;
    }
}