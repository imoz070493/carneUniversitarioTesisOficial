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
use App\Ingreso;
use App\DetalleIngreso;
use App\Articulo;
use App\Periodo;
use App\MovimientoArticulo;
use App\PrecioVenta;

class IngresanteImport{
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

		$errors = [];
		for ($row = 2; $row <= $highestRow; $row++) {
            //Validar CODIGO si es unico
            if(!self::validarCodigo($objWorksheet->getCellByColumnAndRow(1, $row)->getFormattedValue())){
                array_push($errors,"El codigo: ".$objWorksheet->getCellByColumnAndRow(1, $row)." de la fila: ".$row." ya existe.");
            }

            //Validar Dni si existe
            if(!self::validarDni($objWorksheet->getCellByColumnAndRow(2, $row)->getFormattedValue())){
                array_push($errors,"Los datos: ".$objWorksheet->getCellByColumnAndRow(2, $row)." de la fila: ".$row." ya existe.");
            }

            //Validar Apellidos y Nombres si existe
            if(!self::validarApellidosyNombres($objWorksheet->getCellByColumnAndRow(3, $row)->getFormattedValue())){
                array_push($errors,"Los datos: ".$objWorksheet->getCellByColumnAndRow(3, $row)." de la fila: ".$row." ya existe.");
            }

            //Validar Escuela Profesional si existe
            if(!self::validarEscuelaProfesional($objWorksheet->getCellByColumnAndRow(5, $row)->getFormattedValue())){
                array_push($errors,"Los datos: ".$objWorksheet->getCellByColumnAndRow(5, $row)." de la fila: ".$row." ya existe.");
            }

            //Validar Facultad si existe
            if(!self::validarFacultad($objWorksheet->getCellByColumnAndRow(6, $row)->getFormattedValue())){
                array_push($errors,"Los datos: ".$objWorksheet->getCellByColumnAndRow(6, $row)." de la fila: ".$row." ya existe.");
            }
		}
        

        if(count($errors)>0){
            return $errors;
        }

        //guardar datos
        //\Log::info("Dias Mes: ".$numero_dias_mes);

        $array_ingresantes = [];
        for ($row = 3; $row <= $highestRow; $row++) {
            //Obtenemos una fila de datos del excel
            $codigo = $objWorksheet->getCellByColumnAndRow(1, $row)->getFormattedValue();
            $dni = $objWorksheet->getCellByColumnAndRow(2, $row)->getFormattedValue();
            $apellidos_nombres = $objWorksheet->getCellByColumnAndRow(3, $row)->getFormattedValue();
            $escuela_profesional = $objWorksheet->getCellByColumnAndRow(5, $row)->getFormattedValue();
            $facultad = $objWorksheet->getCellByColumnAndRow(6, $row)->getFormattedValue();
            
            array_push($array_ingresantes,[
                'codigo' => $codigo,
                'dni' => $dni,
                'apellidos_nombres' => $apellidos_nombres,
                'escuela_profesional' => $escuela_profesional,
                'facultad' => $facultad,
            ]);
        }

        // Validamos codigo duplicados
        $codigo_old;
        for ($i=0; $i < count($array_ingresantes); $i++) {
            $codigo_old = $array_ingresantes[$i]['codigo'];
            for ($j=0; $j < count($array_ingresantes); $j++) {
                if($i!=$j){
                    if($codigo_old == $array_ingresantes[$j]['codigo']){
                        array_push($errors,"El codigo: ".$codigo_old." se duplica en  la fila: ".($i+1)." y ".($j+1));
                    }
                }
            }
        }

        if(count($errors)>0){
            return $errors;
        }

        if(count($errors)==0 && count($array_ingresantes)==0){
            throw new \Exception("excel_vacio");
        }

        // \Log::info($array_ingresantes);

        return $array_ingresantes;

        try{

            DB::beginTransaction();

            

            DB::commit();
            return 2;
        }catch(\Exception $e){
			DB::rollback();
            \Log::info($e->getMessage());
            throw ($e);
            // return response()->json([
            //     'message' => $e->getMessage(),
            //     'error' => $e
            // ], 500);
    	}
	}

    public static function guardarPrecioVenta($detalle_ingreso, $articulo_id, $ingreso_id, $periodo_id){
        //Registro de Precio Venta
        $precios_ventas = PrecioVenta::actualizarPrecios($articulo_id);

        $data_precio_venta['fecha_inicio'] = \Carbon\Carbon::now();
        $data_precio_venta['precio_venta'] = $detalle_ingreso['precio_venta'];
        $data_precio_venta['articulo_id'] = $articulo_id;
        $data_precio_venta['ingreso_id'] = $ingreso_id;
        $data_precio_venta['periodo_id'] = $periodo_id;
        $precio_venta = PrecioVenta::guardarDatos($data_precio_venta);

        return;
    }

    public static function guardarMovimiento($articulo_id, $data_ingreso, $detalle_ingreso, $ingreso_id){

        $data_detalle = [
            'articulo_id' => $articulo_id,
            'cantidad' => $detalle_ingreso['stock'],
            'precio_compra' => $detalle_ingreso['precio_compra'],
        ];
        $tipo_comprobante = $data_ingreso['tipo_comprobante'];
        $serie_comprobante = $data_ingreso['serie_comprobante'];
        $num_comprobante = $data_ingreso['num_comprobante'];
        $fecha_registro = \Carbon\Carbon::now();

        //Registro de MovimientoArticulo
        $ultimo_mov_art = MovimientoArticulo::obtenerUltimoMovimientoArticulo($data_detalle['articulo_id']);

        if($ultimo_mov_art){
            $saldo_cantidad = $ultimo_mov_art->saldo_cantidad;
            $saldo_precio_total = $ultimo_mov_art->saldo_cantidad * $ultimo_mov_art->saldo_precio_unitario;
        }else{
            $saldo_cantidad = 0;
            $saldo_precio_total = 0;
        }

        if($data_detalle['cantidad'] > 0){
            $data_movimiento_articulo['tipo_operacion'] = 'entrada';
            $data_movimiento_articulo['tipo_comprobante'] = $tipo_comprobante;
            $data_movimiento_articulo['serie_comprobante'] = $serie_comprobante;
            $data_movimiento_articulo['num_comprobante'] = $num_comprobante;
            $data_movimiento_articulo['fecha_registro'] = $fecha_registro;
    
            $data_movimiento_articulo['entrada_cantidad'] = $data_detalle['cantidad'];
            $data_movimiento_articulo['entrada_precio_unitario'] = $data_detalle['precio_compra'];
    
            $data_movimiento_articulo['salida_cantidad'] = 0;
            $data_movimiento_articulo['salida_precio_unitario'] = 0;
    
            $data_movimiento_articulo['saldo_cantidad'] = $saldo_cantidad + $data_detalle['cantidad'];
            $data_movimiento_articulo['saldo_precio_unitario'] = ($saldo_precio_total + ($data_detalle['cantidad'] * $data_detalle['precio_compra'])) / ($saldo_cantidad + $data_detalle['cantidad']);
    
            $data_movimiento_articulo['estado'] = 'activo';
            $data_movimiento_articulo['articulo_id'] = $data_detalle['articulo_id'];
            $data_movimiento_articulo['ingreso_id'] = $ingreso_id;
            $movimiento_articulo = MovimientoArticulo::guardarDatos($data_movimiento_articulo);
        }

    }

    public static function guardarDetalleIngreso($data, $articulo_id, $ingreso_id, $periodo_id){
        $detalle_ingreso = DetalleIngreso::guardarDatos([
            'cantidad' => $data['stock'],
            'precio_compra' => $data['precio_compra'],
            'precio_venta' => $data['precio_venta'],
            'stock_temporal' => $data['stock'],
            'estado' => 'activo',
            'articulo_id' => $articulo_id,
            'ingreso_id' => $ingreso_id,
            'periodo_id' => $periodo_id,
        ]);

        return $detalle_ingreso;
    }

    public static function guardarArticulos($data){
        $articulo = Articulo::guardarDatos([
            'codigo' => $data['codigo'],
            'nombre' => $data['nombre'],
            'stock' => $data['stock'],//Cuando todavia no esta creado el articulo, no se puede ejecutar el trrigers de incremento
            'estado' => 'activo',
            'categoria_id' => $data['categoria_id'],
            'unidad_medida_id' => $data['unidad_medida_id'],
        ]);

        return $articulo;
    }

    public static function calcularTotalCompra($datos){
        $total_compra = 0;

        foreach ($datos as $key => $value) {
            $total_compra += floatval($value['stock'])*floatval($value['precio_compra']);
        }

        return $total_compra;
    }

    public static function validarCategoria($categoria_id){

        $categoria = \App\Categoria::where('id',$categoria_id)->first();

        if($categoria)
            return true;
        else
            return false;
    }

    public static function validarCodigo($codigo_articulo){
        // $articulo = \App\Articulo::where('codigo',$codigo_articulo)->first();

        if(!$codigo_articulo)
            return false;
        else
            return true;
    }

    public static function validarDni($dni){

        // $articulo = \App\Articulo::where('codigo',$dni)->first();

        if(!$dni)
            return false;
        else
            return true;
    }

    public static function validarApellidosyNombres($apellidos_nombres){

        // $articulo = \App\Articulo::where('codigo',$apellidos_nombres)->first();

        if(!$apellidos_nombres)
            return false;
        else
            return true;
    }

    public static function validarEscuelaProfesional($escuela_profesional){

        // $articulo = \App\Articulo::where('codigo',$escuela_profesional)->first();

        if(!$escuela_profesional)
            return false;
        else
            return true;
    }

    public static function validarFacultad($facultad){

        // $articulo = \App\Articulo::where('codigo',$facultad)->first();

        if(!$facultad)
            return false;
        else
            return true;
    }

    public static function validarNombreArticulo($nombre_articulo){

        if(strlen($nombre_articulo) > 2 && strlen($nombre_articulo) <=100)
            return true;
        else
            return false;
    }

    public static function validarDescripcion($descripcion){

        if($descripcion){
            if(strlen($descripcion) <= 300)
                return true;
            else
                return false;
        }

        return true;
    }

    public static function validarEstado($estado){

        if(strtolower($estado)=='activo' || strtolower($estado)=='inactivo')
            return true;
        else
            return false;
    }

    public static function validarUnidadMedida($unidad_medida_id){

        $u_m = \App\UnidadMedida::where('id',$unidad_medida_id)->first();

        if($u_m)
            return true;
        else
            return false;
    }

    public static function validarStock($stock){

        if($stock || $stock==0){
            if(floatval($stock)==$stock && intval($stock)==$stock)
                return true;
            else
                return false;
        }else{
            return false;
        }
    }

    public static function validarPrecioCompra($precio_compra){

        if($precio_compra){
            if(floatval($precio_compra)==$precio_compra)
                return true;
            else
                return false;
        }else{
            return false;
        }
    }

    public static function validarPrecioVenta($precio_venta){

        if($precio_venta){
            if(floatval($precio_venta)==$precio_venta)
                return true;
            else
                return false;
        }else{
            return false;
        }
    }
}