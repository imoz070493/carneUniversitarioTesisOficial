<?php
namespace App\Helpers;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Storage;
class Archivo{

    /*
    * Suma dos variables
    * @params number $a 
    * @params number $b 
    * @return number 
    * retorna el nombre del archivo
    */
	public static function suma(Persona $a,Persona $b){
		return $a->edad+$b->edad;
	}

    /*
    * Almacena documentos en un directorio
    * @params RequestFile
    * @return $fileName: retorna el nombre del archivo
    */
	public static function guardarDocumento($document, $name=''){
		$exploded = explode(',',$document);
        $decoded = base64_decode($exploded[1]);

        if(strpos($exploded[0],'pdf')){
            $extension = 'pdf';
        }else{
            $extension = '';
        }

        $names = explode('.pdf',$name);

        if($name){
            $fileName = Str::random().';'.$names[0].'.'.$extension;
        }else{
            $fileName = Str::random().';'.$names[0].'.'.$extension;
        }

        $path = public_path().'/document/'.$fileName;

        file_put_contents($path, $decoded);

        //INSERTAR MEDIANTE MODELO
        // DB::table("document")->insert('path')

        return $fileName;
	}

    public static function guardarImagen($document, $folder, $photo_name=''){
        $exploded = explode(',',$document);
        $decoded = base64_decode($exploded[1]);

        if(strpos($exploded[0],'jpeg')){
            $extension = 'jpg';
        }else{
            $extension = 'png';
        }

        if($photo_name){
            $fileName = $photo_name;
        }else{
            $fileName = Str::uuid();
            $fileName = $fileName.'.'.$extension;
        }

        // $path = public_path().'/images/'.$fileName;

        // file_put_contents($path, $decoded);
        Storage::disk('public')->put($folder.'/'.$fileName, $decoded);

        //INSERTAR MEDIANTE MODELO
        // DB::table("document")->insert('path')

        return $fileName;
    }

    public static function makeFolder($name){
        Storage::disk('public')->makeDirectory($name);
        Storage::disk('public')->makeDirectory($name.'/1_validado');
        Storage::disk('public')->makeDirectory($name.'/2_sin_validar');
        Storage::disk('public')->makeDirectory($name.'/3_comprimidos');
        Storage::disk('public')->makeDirectory($name.'/4_vouchers');
        Storage::disk('public')->makeDirectory($name.'/5_temps');
        return true;
    }

    public static function guardarXml($document){
        $exploded = explode(',',$document);
        $decoded = base64_decode($exploded[1]);

        if(strpos($exploded[0],'xml')){
            $extension = 'xml';
        }else{
            $extension = '';
        }

        $fileName = Str::random().'.'.$extension;

        $path = public_path().'/xml/'.$fileName;

        // file_put_contents($path, $decoded);
        self::file_force_contents($path, $decoded);

        return $fileName;
    }

    public static function getXml($fileName){
        $xml_string = "";

        $path = public_path().'/xml/'.$fileName;

        $myfile = fopen($path, "r") or die("Unable to open file!");
        // Output one line until end-of-file
        while(!feof($myfile)) {
            $xml_string .= fgets($myfile);
        }
        fclose($myfile);

        return $xml_string;
    }

    public static function eliminarDocumento($fileName){

        return unlink(public_path().'/document/'.$fileName);
    }

    public static function eliminarXml($fileName){

        return unlink(public_path().'/xml/'.$fileName);
    }

    public static function file_force_contents($fullPath, $contents, $flags = 0)
    {
        $parts = explode('/', $fullPath);
        array_pop($parts);
        $dir = implode('/', $parts);

        if (!is_dir($dir))
            mkdir(
                $dir,
                0777,
                true
            );

        file_put_contents($fullPath, $contents, $flags);
    }
}