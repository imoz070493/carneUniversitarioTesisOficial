<?php

use Illuminate\Database\Seeder;

class ExtractZipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $docentes_administracion = static::getDocentesAdministracion();
        static::extraerPorDepartamentos($docentes_administracion, '1.d_administracion');

        // $docentes_contabilidad = static::getDocentesContabilidad();
        // static::extraerPorDepartamentos($docentes_contabilidad, '2.d_contabilidad');

        // $docentes_educacion = static::getDocentesEducacion();
        // static::extraerPorDepartamentos($docentes_educacion, '3.d_educacion');

        // $docentes_agroindustrial = static::getDocentesAgroindustrial();
        // static::extraerPorDepartamentos($docentes_agroindustrial, '4.d_agroindustrial');

        // $docentes_ambiental = static::getDocentesAmbiental();
        // static::extraerPorDepartamentos($docentes_ambiental, '5.d_ambiental');

        // $docentes_sistemas = static::getDocentesSistemas();
        // static::extraerPorDepartamentos($docentes_sistemas, '6.d_sistemas');

        // $docentes_ciencias_basicas = static::getDocentesCienciasBasicas();
        // static::extraerPorDepartamentos($docentes_ciencias_basicas, '7.d_ciencias_basicas');

    }

    public static function extraerPorDepartamentos($docentes, $folder_departamento){
        
        $contador = 1;
        $cursos = [];
        for ($i=0; $i < count($docentes); $i++) {\Log::info("i: ".$i/* ." docente: ".$docentes[$i] */);
            $zip = new ZipArchive();
            $file_zip = "D:\IRVING\ACTAS\ACTAS 2023 - II\compressed/".$docentes[$i]."-ACTANOTAS.zip";
            if ($zip->open($file_zip) == TRUE) {
                for ($y = 0; $y < $zip->numFiles; $y++) {
                    $filename = $zip->getNameIndex($y);
                    static::extractFile($folder_departamento, $file_zip, $filename, $contador);
                    array_push($cursos, $contador.' '.$filename);
                    $contador++;
                    // \Log::info($filename);
                }
            }
        }
        // No juntarlo por el momento ya que baja la calidad del documento
        //static::mergePdf($cursos);
    }

    public static function mergePdf($cursos){
        $pdf = new \Jurosh\PDFMerge\PDFMerger;

        // add as many pdfs as you want
        for ($i=0; $i < count($cursos); $i++) { 
            $pdf->addPDF("C:\Users\RegAcad\Downloads\actas\actas_d/".$cursos[$i], 'all');
        }


        // call merge, output format `file`
        $pdf->merge('file', 'C:\Users\RegAcad\Downloads\actas/TODO.pdf');
    }

    public static function extractFile($folder_departamento, $file_zip, $filename, $numero){
        $zip = new ZipArchive;
        $res = $zip->open($file_zip);
        if ($res === TRUE) {
            $zip->extractTo('D:\IRVING\ACTAS\ACTAS 2023 - II/'.$folder_departamento, array($filename));
            $zip->close();
            echo 'ok';
        } else {
            echo 'failed';
        }
        $from = 'D:\IRVING\ACTAS\ACTAS 2023 - II/'.$folder_departamento.'/'.$filename;
        $to = 'D:\IRVING\ACTAS\ACTAS 2023 - II/'.$folder_departamento.'/'.$numero.' '.$filename;

        rename($from, $to);
    }

    public static function getDocentesAdministracion(){
        return [
            "AGREDA CERNA HENRRY WILFREDO",
            "AGUILAR SALAZAR ROLANDO FREDY",
            "AGUIRRE LANDA JOHN PETER",
            "ALARCON GUTIERREZ ROGER WILLIAM",
            "ALVAREZ SIGUAYRO RAQUEL",
            "ANCCO VIZCARRA THOMAS",
            "APAZA APAZA OSCAR",
            "APAZA APAZA RUBEN",
            "ARANGÜENA YLLANES MAGALY ROXANA",
            "ARESTEGUI FLORES YOAN KATHERINE",
            "AREVALO QUIJANO JOSE CARLOS",
            "ARONE PALOMINO DANNYA",
            "ARONI HUAMÁN JIMMY",
            "AROSTEGUI LÉON EDWARD",
            "ASCUE RUIZ ROSA NELIDA",
            "BARAZORDA CARRILLO JOSÉ GABRIEL",
            "BAZÁN RAMÍREZ ALDO",
            "BORDA ECHAVARRIA ANI MARY",
            "BORDA NAVEDOS WALTER",
            "BRAVO FRANCO EYNER YONEL",
            "BULEJE CAMPOS DIANETH",
            "BUSTINZA SALDIVAR DORIS",
            "CABEZAS MARTÍNEZ RUFINO ROSALES",
            "CABEZAS MORAN GRECIA ISABEL",
            "CAHUANA TAPIA ROGELIO DOMINGO",
            "CALLA CHUMPISUCA YANETH ROXANA",
            "CAMA FLORES SIMÓN JOSÉ",
            "CAMPOS DOMINGUEZ MARLENI",
            "CAMPOS PELÁEZ GODOFREDO EDUARDO",
            "CAMPOS PEÑA LISS MERLING",
            "CARBAJAL NAVARRO GAMANIEL",
            "CARHUARUPAY MOLLEDA BORIS FELIPE",
            "CARHUARUPAY MOLLEDA YAKOV FELIPE",
            "CARRIÓN ABOLLANEDA RICHARD",
            "CASTRO BULEJE CARLOS YINMEL",
            "CASTRO PANIAGUA WILLIAM GIL",
            "CATACORA FLORES NORMA LORENA",
            "CESPEDES RAMIREZ JACK MICHEL",
            "CHIQUILLAN ZAMBRANO YULY",
            "CHOQUE QUISPE DAVID",
            "CHOQUE QUISPE YUDITH",
            "CHURA YUPANQUI EDY",
            "CONDOR TINOCO ENRIQUE EDGARDO",
            "CONTRERAS REYNAGA KEVIN IRWING",
            "CORAL SURCO ROSA GABRIELA",
            "CORDOVA CUSIHUAMAN GAVINA FELICITAS",
            "CORREA CUBA ODILON",
            "CUELLAR QUISPE SERGIO",
            "DELGADO LAIME MARÍA DEL CARMEN",
            "DIAZ BARRERA YASMINE",
            "DIAZ BAZAN WILDOR MERARDO",
            "DUEÑAS VALCARCEL CARLOS EDUARDO",
            "ESTRADA PANTÍA JOSÉ LUIS",
            "FARFÁN INCA ROCA JESÚS",
            "FÉLIX BENITES EDWIN DANIEL",
            "FERNANDEZ ATHÓ MANUEL OCTAVIO",
            "FIGUEROA ECHAVARRÍA CLARA JANNETH",
            "FLORES CCORISAPRA YOVANA",
            "FUENTES BERNEDO FRIDA ESMERALDA",
            "GARCIA REYNAGA NICMAR NICO",
            "GÓMEZ CHIPANA EDWIN",
            "GOMEZ HUAYTA BERELSON",
            "GUILLEN CUBA SANDY",
            "GUTIERREZ APARCO JULIAN",
            "GUTIÉRREZ CENTENO ROLANDO",
            "GUTIÉRREZ MARTÍNEZ DENIS HERNÁN",
            "HANCO PICHUILLA NESTOR",
            "HERRERA CUMPA NÁTALY STÉFANIE",
            "HUAMAN MALLQUI YAISON",
            "HUAMANQUISPE APAZA CARLOS",
            "HUARACA APARCO ROSA",
            "HUARAYHUA CUTIPA JAIDER",
            "HUILLCEN BACA HERWIN ALAYN",
            "LANDEO MUÑOZ PABLO ANDRES",
            "LEGUÍA VALVERDE STEPHEN RONALD",
            "LIGARDA SAMANEZ CARLOS ALBERTO",
            "LIMA ROMÁN PERCY",
            "LLACCHUA QUINO FAVIOLA",
            "LOA BARRIENTOS LUCY SUSANA",
            "LOA NAVARRO ERIKA",
            "MACHACA MAMANI JULIO CESAR",
            "MACHACA REJAS JOAQUIN",
            "MAQUERA FLORES EDWING ALCIDES",
            "MAUCAYLLE SALCEDO SIMON",
            "MENDOZA MARÍN FLORENTINO LÁZARO",
            "MENDOZA PALOMINO BERTHA",
            "MENDOZA VALENZUELA JUBENAL",
            "MENEJES PALOMINO NEPTALÍ",
            "MERINO ASCUE ESTHER REYNA",
            "MERINO QUISPE ISAAC",
            "MESCCO CACERES EDWIN",
            "MINAYA GUTIERREZ DANIEL",
            "MONTESINOS PALOMINO ARTEMIO",
            "MORENO HUAMÁN MARGOTH",
            "MUJICA BERMUDEZ LUIS FELIPE",
            "NOLASCO CARBAJAL GUIDO",
            "ÑUFLO LEYVA TERESA",
            "OBREGON CAMPOS GUILLERMO VIDAL",
            "OBREGON YUPANQUI MIRIAN ESTEFANI",
            "OLIVARES RIVERA ORLANDO",
            "ORÉ CERRÓN JUAN JOSÉ",
            "ORTIZ AUCAPIÑA RENZO BORIS",
            "ORTIZ GUIZADO JULIA IRAIDA",
            "PALOMINO RINCON HENRY",
            "PALOMINO VALDIVIA FLOR DE LUZ",
            "PARDO GÓMEZ JOSÉ",
            "PERALTA GUEVARA DIEGO ELIO",
            "PEREZ ALVARADO JOSMELL IVAN",
            "PEREZ SALCEDO RONALD",
            "PONCE MARIN MARISOL GEORGINA",
            "POZO BULEJE ERIK",
            "QUICAÑO BELLIDO RAUL",
            "QUIROZ PARIONA RICHARD OSWALDO",
            "QUISPE CONDORI EDWIN",
            "QUISPE INFANTES REYNALDO RICARDO",
            "QUISPE LA TORRE ROSMERI",
            "QUISPE PERALES RICHARD",
            "QUISPE QUISPE ROBERTO",
            "QUIZA AÑAZCO CARMEN",
            "RAMIREZ ALTAMIRANO ERIKA BELINDA",
            "RAMIREZ CAJAMARCA JUAN CIELO",
            "RAMOS HUALLPARTUPA DAVID JUAN",
            "RAMOS PACHECO BETSY SURI",
            "REYNAGA MEDINA ALEXEI",
            "REYNOSO CANICANI DELMA DIANA",
            "RIPA CASAFRANCA ROMULO",
            "RIVAS LEGUIA JUVENAL",
            "RIVAS LOAYZA LUCIO ISAÍAS",
            "RODAS GUIZADO EFRAIN",
            "RODRIGUEZ PECEROS ROSMEL IVAN",
            "RODRIGUEZ RUELAS YELINA",
            "ROJAS BENITES ARTURO",
            "ROJAS BENITES YURY",
            "SALAS VILLANO TANIA SAYORI",
            "SAMANEZ INCA OSCAR",
            "SILVERA REYNAGA HUMBERTO",
            "SIMON TACURI MARGOTH",
            "SOLANO GUTIERREZ JUAN",
            "SOLANO REYNOSO AYDEE MARILU",
            "SORIA SOLIS IVAN",
            "SUAÑA DÍAZ OLINDA",
            "SURICHAQUI MATEO ABAD ANTONIO",
            "SURICHAQUI VIVANCO LUZ MARIBEL",
            "TAIPE FLORES YUBER",
            "TAIPE PARDO FREDY",
            "TAPIA TADEO FIDELIA",
            "TELLO FELIX NEYSER ADOLFO",
            "TELLO TACO BRYAN MANUEL",
            "TICONA MAMANI RUTH XIMENA",
            "TORO RODRIGUEZ GINA GENOVEVA",
            "VALLE DIAZ FELIPE RAFAEL",
            "VALREYMOND TACORA DARIO",
            "VALVERDE MAMANI GRECIA",
            "VARGAS CASTILLA FELIX",
            "VELASCO FALLA DEYVI CALAZAN",
            "YARLEQUÉ MORANTE FRANCISCO JAVIER",
            "YAURIS POLO WILLIAM CAMILO",
            "YAURIS SILVERA CELIA ROCIO"
        ];
    }

    public static function getDocentesContabilidad(){
        return [
            
            
        ];
    }

    public static function getDocentesEducacion(){
        return [
            
            
        ];
    }

    public static function getDocentesAgroindustrial(){
        return [
            
            
        ];
    }

    public static function getDocentesAmbiental(){
        return [
            
            
        ];
    }

    public static function getDocentesSistemas(){
        return [
            
            
        ];
    }

    public static function getDocentesCienciasBasicas(){
        return [
            
        ];
    }
}
