<?php

use App\Inscrito;
use Illuminate\Database\Seeder;

class ActualizarNumerosReciboPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numeros_recibos = static::data();

        $convocatoria_id = 5;
        foreach ($numeros_recibos as $key => $value) {
            Inscrito::where('codigo_estudiante',$value['codigo_estudiante'])
                    ->where('convocatoria_id',$convocatoria_id)
                    ->update([
                        'numero_recibo' => $value['numero_recibo']
                    ]);
        }
    }

    public static function data(){
        return [
            [
                "codigo_estudiante" => "1010320242",
                "numero_recibo" => "2-39015"
            ],
            [
                "codigo_estudiante" => "1006520242",
                "numero_recibo" => "3-02840"
            ],
            [
                "codigo_estudiante" => "1001220242",
                "numero_recibo" => "2-39695"
            ],
            [
                "codigo_estudiante" => "1003320242",
                "numero_recibo" => "2-39680"
            ],
            [
                "codigo_estudiante" => "1003620242",
                "numero_recibo" => "3-02318"
            ],
            [
                "codigo_estudiante" => "1002020242",
                "numero_recibo" => "2-38832"
            ],
            [
                "codigo_estudiante" => "1111020211",
                "numero_recibo" => "2-44301"
            ],
            [
                "codigo_estudiante" => "1016120242",
                "numero_recibo" => "2-38780"
            ],
            [
                "codigo_estudiante" => "1017620242",
                "numero_recibo" => "1-03481"
            ],
            [
                "codigo_estudiante" => "1010120242",
                "numero_recibo" => "2-38795"
            ],
            [
                "codigo_estudiante" => "1006720242",
                "numero_recibo" => "2-39511"
            ],
            [
                "codigo_estudiante" => "1002320242",
                "numero_recibo" => "2-38932"
            ],
            [
                "codigo_estudiante" => "1001020242",
                "numero_recibo" => "3-02312"
            ],
            [
                "codigo_estudiante" => "1008920242",
                "numero_recibo" => "2-39099"
            ],
            [
                "codigo_estudiante" => "1017320242",
                "numero_recibo" => "2-38891"
            ],
            [
                "codigo_estudiante" => "1000920242",
                "numero_recibo" => "2-39149"
            ],
            [
                "codigo_estudiante" => "1004520242",
                "numero_recibo" => "2-38753"
            ],
            [
                "codigo_estudiante" => "1006620242",
                "numero_recibo" => "2-39102"
            ],
            [
                "codigo_estudiante" => "1119620242",
                "numero_recibo" => "2-38886"
            ],
            [
                "codigo_estudiante" => "1107820242",
                "numero_recibo" => "2-39221"
            ],
            [
                "codigo_estudiante" => "1109220242",
                "numero_recibo" => "2-39070"
            ],
            [
                "codigo_estudiante" => "1121120242",
                "numero_recibo" => "2-39175"
            ],
            [
                "codigo_estudiante" => "1111820242",
                "numero_recibo" => "2-39205"
            ],
            [
                "codigo_estudiante" => "1118520242",
                "numero_recibo" => "2-39235"
            ],
            [
                "codigo_estudiante" => "1119120242",
                "numero_recibo" => "2-39268"
            ],
            [
                "codigo_estudiante" => "1107020242",
                "numero_recibo" => "2-39240"
            ],
            [
                "codigo_estudiante" => "1110220242",
                "numero_recibo" => "2-38761"
            ],
            [
                "codigo_estudiante" => "1117920242",
                "numero_recibo" => "2-38899"
            ],
            [
                "codigo_estudiante" => "1108820242",
                "numero_recibo" => "3-02277"
            ],
            [
                "codigo_estudiante" => "1117820242",
                "numero_recibo" => "3-02245"
            ],
            [
                "codigo_estudiante" => "1107920242",
                "numero_recibo" => "1-03476"
            ],
            [
                "codigo_estudiante" => "1118420242",
                "numero_recibo" => "3-02265"
            ],
            [
                "codigo_estudiante" => "1101120242",
                "numero_recibo" => "2-38792"
            ],
            [
                "codigo_estudiante" => "1118320242",
                "numero_recibo" => "2-39140"
            ],
            [
                "codigo_estudiante" => "1119920242",
                "numero_recibo" => "2-38806"
            ],
            [
                "codigo_estudiante" => "1118920242",
                "numero_recibo" => "2-38813"
            ],
            [
                "codigo_estudiante" => "1100120242",
                "numero_recibo" => "2-38738"
            ],
            [
                "codigo_estudiante" => "1118620242",
                "numero_recibo" => "3-02282"
            ],
            [
                "codigo_estudiante" => "1120320242",
                "numero_recibo" => "1-03477"
            ],
            [
                "codigo_estudiante" => "1106620242",
                "numero_recibo" => "3-02227"
            ],
            [
                "codigo_estudiante" => "1110320242",
                "numero_recibo" => "3-02260"
            ],
            [
                "codigo_estudiante" => "1118120242",
                "numero_recibo" => "2-38928"
            ],
            [
                "codigo_estudiante" => "1111920242",
                "numero_recibo" => "2-38799"
            ],
            [
                "codigo_estudiante" => "1118220242",
                "numero_recibo" => "3-02275"
            ],
            [
                "codigo_estudiante" => "1120120242",
                "numero_recibo" => "2-38772"
            ],
            [
                "codigo_estudiante" => "1106720242",
                "numero_recibo" => "2-39197"
            ],
            [
                "codigo_estudiante" => "1101420242",
                "numero_recibo" => "2-38948"
            ],
            [
                "codigo_estudiante" => "1120820242",
                "numero_recibo" => "2-39052"
            ],
            [
                "codigo_estudiante" => "1119020242",
                "numero_recibo" => "2-38836"
            ],
            [
                "codigo_estudiante" => "1118720242",
                "numero_recibo" => "2-38874"
            ],
            [
                "codigo_estudiante" => "1118020242",
                "numero_recibo" => "2-38835"
            ],
            [
                "codigo_estudiante" => "1110820242",
                "numero_recibo" => "2-38804"
            ],
            [
                "codigo_estudiante" => "1118820242",
                "numero_recibo" => "2-38740"
            ],
            [
                "codigo_estudiante" => "1105920242",
                "numero_recibo" => "2-38862"
            ],
            [
                "codigo_estudiante" => "1111620242",
                "numero_recibo" => "2-38918"
            ],
            [
                "codigo_estudiante" => "1109820242",
                "numero_recibo" => "3-02262"
            ],
            [
                "codigo_estudiante" => "1104420242",
                "numero_recibo" => "2-39308"
            ],
            [
                "codigo_estudiante" => "1001720242",
                "numero_recibo" => "2-38771"
            ],
            [
                "codigo_estudiante" => "1005820242",
                "numero_recibo" => "3-02299"
            ],
            [
                "codigo_estudiante" => "1015620242",
                "numero_recibo" => "2-38837"
            ],
            [
                "codigo_estudiante" => "1008420242",
                "numero_recibo" => "2-39082"
            ],
            [
                "codigo_estudiante" => "1000620242",
                "numero_recibo" => "2-38999"
            ],
            [
                "codigo_estudiante" => "1015120242",
                "numero_recibo" => "2-38784"
            ],
            [
                "codigo_estudiante" => "1002520242",
                "numero_recibo" => "2-38852"
            ],
            [
                "codigo_estudiante" => "1007620242",
                "numero_recibo" => "2-38831"
            ],
            [
                "codigo_estudiante" => "1016820242",
                "numero_recibo" => "2-38805"
            ],
            [
                "codigo_estudiante" => "1001820242",
                "numero_recibo" => "1-03473"
            ],
            [
                "codigo_estudiante" => "1014920242",
                "numero_recibo" => "2-39143"
            ],
            [
                "codigo_estudiante" => "1015520242",
                "numero_recibo" => "2-38853"
            ],
            [
                "codigo_estudiante" => "1014720242",
                "numero_recibo" => "2-39195"
            ],
            [
                "codigo_estudiante" => "1009720242",
                "numero_recibo" => "1-03475"
            ],
            [
                "codigo_estudiante" => "1002420242",
                "numero_recibo" => "3-02300"
            ],
            [
                "codigo_estudiante" => "1015420242",
                "numero_recibo" => "2-38870"
            ],
            [
                "codigo_estudiante" => "1002720242",
                "numero_recibo" => "2-39016"
            ],
            [
                "codigo_estudiante" => "1005920242",
                "numero_recibo" => "3-02250"
            ],
            [
                "codigo_estudiante" => "1000320242",
                "numero_recibo" => "2-39051"
            ],
            [
                "codigo_estudiante" => "1015720242",
                "numero_recibo" => "2-38809"
            ],
            [
                "codigo_estudiante" => "1016020242",
                "numero_recibo" => "2-38872"
            ],
            [
                "codigo_estudiante" => "1009920242",
                "numero_recibo" => "2-38791"
            ],
            [
                "codigo_estudiante" => "1015320242",
                "numero_recibo" => "2-39074"
            ],
            [
                "codigo_estudiante" => "1003520242",
                "numero_recibo" => "2-38911"
            ],
            [
                "codigo_estudiante" => "1009820242",
                "numero_recibo" => "3-02246"
            ],
            [
                "codigo_estudiante" => "1009520242",
                "numero_recibo" => "2-38890"
            ],
            [
                "codigo_estudiante" => "1017020242",
                "numero_recibo" => "3-02317"
            ],
            [
                "codigo_estudiante" => "1015020242",
                "numero_recibo" => "2-38838"
            ],
            [
                "codigo_estudiante" => "1014820242",
                "numero_recibo" => "2-38824"
            ],
            [
                "codigo_estudiante" => "1015920242",
                "numero_recibo" => "2-39047"
            ],
            [
                "codigo_estudiante" => "1016720242",
                "numero_recibo" => "2-39187"
            ],
            [
                "codigo_estudiante" => "1001120242",
                "numero_recibo" => "2-39186"
            ],
            [
                "codigo_estudiante" => "1011620242",
                "numero_recibo" => "2-38785"
            ],
            [
                "codigo_estudiante" => "1004720242",
                "numero_recibo" => "2-39019"
            ],
            [
                "codigo_estudiante" => "1014620242",
                "numero_recibo" => "2-39202"
            ],
            [
                "codigo_estudiante" => "1008320242",
                "numero_recibo" => "1-03474"
            ],
            [
                "codigo_estudiante" => "1003020242",
                "numero_recibo" => "2-39291"
            ],
            [
                "codigo_estudiante" => "1015820242",
                "numero_recibo" => "2-38923"
            ],
            [
                "codigo_estudiante" => "1014520242",
                "numero_recibo" => "2-38800"
            ],
            [
                "codigo_estudiante" => "1014220242",
                "numero_recibo" => "2-38782"
            ],
            [
                "codigo_estudiante" => "1013620242",
                "numero_recibo" => "2-38942"
            ],
            [
                "codigo_estudiante" => "1013920242",
                "numero_recibo" => "2-38778"
            ],
            [
                "codigo_estudiante" => "1013820242",
                "numero_recibo" => "2-38807"
            ],
            [
                "codigo_estudiante" => "1009120242",
                "numero_recibo" => "2-39084"
            ],
            [
                "codigo_estudiante" => "1013320242",
                "numero_recibo" => "3-02239"
            ],
            [
                "codigo_estudiante" => "1017920242",
                "numero_recibo" => "2-38851"
            ],
            [
                "codigo_estudiante" => "1016520242",
                "numero_recibo" => "2-39081"
            ],
            [
                "codigo_estudiante" => "1013720242",
                "numero_recibo" => "2-38743"
            ],
            [
                "codigo_estudiante" => "1010520242",
                "numero_recibo" => "2-38907"
            ],
            [
                "codigo_estudiante" => "1016620242",
                "numero_recibo" => "2-38752"
            ],
            [
                "codigo_estudiante" => "1014020242",
                "numero_recibo" => "2-38860"
            ],
            [
                "codigo_estudiante" => "1000720242",
                "numero_recibo" => "2-38987"
            ],
            [
                "codigo_estudiante" => "1009420242",
                "numero_recibo" => "2-38925"
            ],
            [
                "codigo_estudiante" => "1017520242",
                "numero_recibo" => "2-38744"
            ],
            [
                "codigo_estudiante" => "1003820242",
                "numero_recibo" => "1-03466"
            ],
            [
                "codigo_estudiante" => "1004320242",
                "numero_recibo" => "2-39135"
            ],
            [
                "codigo_estudiante" => "1006820242",
                "numero_recibo" => "2-38938"
            ],
            [
                "codigo_estudiante" => "1007920242",
                "numero_recibo" => "2-38812"
            ],
            [
                "codigo_estudiante" => "1011520242",
                "numero_recibo" => "2-38796"
            ],
            [
                "codigo_estudiante" => "1007720242",
                "numero_recibo" => "2-38774"
            ],
            [
                "codigo_estudiante" => "1013520242",
                "numero_recibo" => "2-39294"
            ],
            [
                "codigo_estudiante" => "1011020242",
                "numero_recibo" => "2-39290"
            ],
            [
                "codigo_estudiante" => "1014120242",
                "numero_recibo" => "2-39065"
            ],
            [
                "codigo_estudiante" => "1017220242",
                "numero_recibo" => "2-38959"
            ],
            [
                "codigo_estudiante" => "1010620242",
                "numero_recibo" => "2-39077"
            ],
            [
                "codigo_estudiante" => "1016420242",
                "numero_recibo" => "2-39100"
            ],
            [
                "codigo_estudiante" => "1012520242",
                "numero_recibo" => "2-38882"
            ],
            [
                "codigo_estudiante" => "1017420242",
                "numero_recibo" => "2-39219"
            ],
            [
                "codigo_estudiante" => "1016920242",
                "numero_recibo" => "3-02311"
            ],
            [
                "codigo_estudiante" => "1014320242",
                "numero_recibo" => "2-38871"
            ],
            [
                "codigo_estudiante" => "1010820242",
                "numero_recibo" => "2-39064"
            ],
            [
                "codigo_estudiante" => "1000220242",
                "numero_recibo" => "2-39165"
            ],
            [
                "codigo_estudiante" => "1007820242",
                "numero_recibo" => "2-38922"
            ],
            [
                "codigo_estudiante" => "1004220242",
                "numero_recibo" => "2-38944"
            ],
            [
                "codigo_estudiante" => "1014420242",
                "numero_recibo" => "2-39198"
            ],
            [
                "codigo_estudiante" => "1016320242",
                "numero_recibo" => "2-38751"
            ],
            [
                "codigo_estudiante" => "1013420242",
                "numero_recibo" => "2-39274"
            ],
            [
                "codigo_estudiante" => "1012420242",
                "numero_recibo" => "2-38844"
            ],
            [
                "codigo_estudiante" => "1008720242",
                "numero_recibo" => "2-39030"
            ],
            [
                "codigo_estudiante" => "1008020242",
                "numero_recibo" => "2-39128"
            ],
            [
                "codigo_estudiante" => "1013220242",
                "numero_recibo" => "3-02229"
            ],
            [
                "codigo_estudiante" => "1010220242",
                "numero_recibo" => "2-38801"
            ],
            [
                "codigo_estudiante" => "1003220242",
                "numero_recibo" => "2-38905"
            ],
            [
                "codigo_estudiante" => "1004120242",
                "numero_recibo" => "2-38826"
            ],
            [
                "codigo_estudiante" => "1000420242",
                "numero_recibo" => "2-38827"
            ],
            [
                "codigo_estudiante" => "1006120242",
                "numero_recibo" => "3-02294"
            ],
            [
                "codigo_estudiante" => "1005520242",
                "numero_recibo" => "3-02263"
            ],
            [
                "codigo_estudiante" => "1004020242",
                "numero_recibo" => "2-38893"
            ],
            [
                "codigo_estudiante" => "1009620242",
                "numero_recibo" => "2-38808"
            ],
            [
                "codigo_estudiante" => "1010920242",
                "numero_recibo" => "3-02247"
            ],
            [
                "codigo_estudiante" => "1005720242",
                "numero_recibo" => "2-39076"
            ],
            [
                "codigo_estudiante" => "1012620242",
                "numero_recibo" => "2-38793"
            ],
            [
                "codigo_estudiante" => "1012820242",
                "numero_recibo" => "2-38819"
            ],
            [
                "codigo_estudiante" => "1011720242",
                "numero_recibo" => "2-39118"
            ],
            [
                "codigo_estudiante" => "1011920242",
                "numero_recibo" => "2-38810"
            ],
            [
                "codigo_estudiante" => "1012920242",
                "numero_recibo" => "2-38781"
            ],
            [
                "codigo_estudiante" => "1008620242",
                "numero_recibo" => "2-39004"
            ],
            [
                "codigo_estudiante" => "1000820242",
                "numero_recibo" => "2-38912"
            ],
            [
                "codigo_estudiante" => "1002820242",
                "numero_recibo" => "2-38842"
            ],
            [
                "codigo_estudiante" => "1017820242",
                "numero_recibo" => "2-38985"
            ],
            [
                "codigo_estudiante" => "1012120242",
                "numero_recibo" => "2-38924"
            ],
            [
                "codigo_estudiante" => "1012020242",
                "numero_recibo" => "3-02304"
            ],
            [
                "codigo_estudiante" => "1006920242",
                "numero_recibo" => "2-38903"
            ],
            [
                "codigo_estudiante" => "1002920242",
                "numero_recibo" => "2-38887"
            ],
            [
                "codigo_estudiante" => "1006420242",
                "numero_recibo" => "2-38892"
            ],
            [
                "codigo_estudiante" => "1001620242",
                "numero_recibo" => "2-38919"
            ],
            [
                "codigo_estudiante" => "1016220242",
                "numero_recibo" => "3-02231"
            ],
            [
                "codigo_estudiante" => "1017720242",
                "numero_recibo" => "2-38770"
            ],
            [
                "codigo_estudiante" => "1004820242",
                "numero_recibo" => "1-03483"
            ],
            [
                "codigo_estudiante" => "1012320242",
                "numero_recibo" => "2-38794"
            ],
            [
                "codigo_estudiante" => "1012720242",
                "numero_recibo" => "2-38802"
            ],
            [
                "codigo_estudiante" => "1007020242",
                "numero_recibo" => "1-03471"
            ],
            [
                "codigo_estudiante" => "1011120242",
                "numero_recibo" => "2-39098"
            ],
            [
                "codigo_estudiante" => "1011820242",
                "numero_recibo" => "2-39066"
            ],
            [
                "codigo_estudiante" => "1013120242",
                "numero_recibo" => "2-39040"
            ],
            [
                "codigo_estudiante" => "1005420242",
                "numero_recibo" => "3-02284"
            ],
            [
                "codigo_estudiante" => "1013020242",
                "numero_recibo" => "2-39158"
            ],
            [
                "codigo_estudiante" => "1003420242",
                "numero_recibo" => "2-38820"
            ],
            [
                "codigo_estudiante" => "1002620242",
                "numero_recibo" => "2-38846"
            ],
            [
                "codigo_estudiante" => "1006020242",
                "numero_recibo" => "2-38888"
            ],
            [
                "codigo_estudiante" => "1002120242",
                "numero_recibo" => "2-39063"
            ],
            [
                "codigo_estudiante" => "1007420242",
                "numero_recibo" => "2-38996"
            ],
            [
                "codigo_estudiante" => "1001920242",
                "numero_recibo" => "2-38885"
            ],
            [
                "codigo_estudiante" => "1011320242",
                "numero_recibo" => "2-39096"
            ],
            [
                "codigo_estudiante" => "1117220242",
                "numero_recibo" => "2-39061"
            ],
            [
                "codigo_estudiante" => "1120220242",
                "numero_recibo" => "2-39148"
            ],
            [
                "codigo_estudiante" => "1117720242",
                "numero_recibo" => "2-38764"
            ],
            [
                "codigo_estudiante" => "1120620242",
                "numero_recibo" => "2-39295"
            ],
            [
                "codigo_estudiante" => "1116720242",
                "numero_recibo" => "2-38783"
            ],
            [
                "codigo_estudiante" => "1116920242",
                "numero_recibo" => "3-02320"
            ],
            [
                "codigo_estudiante" => "1104720242",
                "numero_recibo" => "2-38867"
            ],
            [
                "codigo_estudiante" => "1116620242",
                "numero_recibo" => "2-39060"
            ],
            [
                "codigo_estudiante" => "1121320242",
                "numero_recibo" => "2-39421"
            ],
            [
                "codigo_estudiante" => "1111720242",
                "numero_recibo" => "1-03468"
            ],
            [
                "codigo_estudiante" => "1107520242",
                "numero_recibo" => "2-38896"
            ],
            [
                "codigo_estudiante" => "1117520242",
                "numero_recibo" => "3-02306"
            ],
            [
                "codigo_estudiante" => "1106220242",
                "numero_recibo" => "2-38856"
            ],
            [
                "codigo_estudiante" => "1117120242",
                "numero_recibo" => "2-38818"
            ],
            [
                "codigo_estudiante" => "1120020242",
                "numero_recibo" => "1-03470"
            ],
            [
                "codigo_estudiante" => "1110520242",
                "numero_recibo" => "3-02309"
            ],
            [
                "codigo_estudiante" => "1116820242",
                "numero_recibo" => "3-02251"
            ],
            [
                "codigo_estudiante" => "1102020242",
                "numero_recibo" => "2-38790"
            ],
            [
                "codigo_estudiante" => "1104820242",
                "numero_recibo" => "2-38848"
            ],
            [
                "codigo_estudiante" => "1100920242",
                "numero_recibo" => "2-38815"
            ],
            [
                "codigo_estudiante" => "1117620242",
                "numero_recibo" => "2-38758"
            ],
            [
                "codigo_estudiante" => "1117320242",
                "numero_recibo" => "2-38745"
            ],
            [
                "codigo_estudiante" => "1119420242",
                "numero_recibo" => "2-38847"
            ],
            [
                "codigo_estudiante" => "1117420242",
                "numero_recibo" => "2-38742"
            ],
            [
                "codigo_estudiante" => "1103320242",
                "numero_recibo" => "3-02241"
            ],
            [
                "codigo_estudiante" => "1120920242",
                "numero_recibo" => "2-38754"
            ],
            [
                "codigo_estudiante" => "1101020242",
                "numero_recibo" => "2-38755"
            ],
            [
                "codigo_estudiante" => "1120520242",
                "numero_recibo" => "2-38797"
            ],
            [
                "codigo_estudiante" => "1109320242",
                "numero_recibo" => "2-38947"
            ],
            [
                "codigo_estudiante" => "1105620242",
                "numero_recibo" => "2-38993"
            ],
            [
                "codigo_estudiante" => "1117020242",
                "numero_recibo" => "3-02238"
            ],
            [
                "codigo_estudiante" => "1119720242",
                "numero_recibo" => "1-03491"
            ],
            [
                "codigo_estudiante" => "1106520242",
                "numero_recibo" => "2-39487"
            ],
            [
                "codigo_estudiante" => "1116520242",
                "numero_recibo" => "2-39021"
            ],
            [
                "codigo_estudiante" => "1116120242",
                "numero_recibo" => "1-03467"
            ],
            [
                "codigo_estudiante" => "1115920242",
                "numero_recibo" => "3-02253"
            ],
            [
                "codigo_estudiante" => "1101220242",
                "numero_recibo" => "3-02286"
            ],
            [
                "codigo_estudiante" => "1115120242",
                "numero_recibo" => "2-38921"
            ],
            [
                "codigo_estudiante" => "1101520242",
                "numero_recibo" => "3-02298"
            ],
            [
                "codigo_estudiante" => "1107420242",
                "numero_recibo" => "3-02273"
            ],
            [
                "codigo_estudiante" => "1115220242",
                "numero_recibo" => "3-02230"
            ],
            [
                "codigo_estudiante" => "1104520242",
                "numero_recibo" => "3-02280"
            ],
            [
                "codigo_estudiante" => "1111020242",
                "numero_recibo" => "2-38880"
            ],
            [
                "codigo_estudiante" => "1115720242",
                "numero_recibo" => "2-38933"
            ],
            [
                "codigo_estudiante" => "1100820242",
                "numero_recibo" => "3-02248"
            ],
            [
                "codigo_estudiante" => "1108720242",
                "numero_recibo" => "2-38879"
            ],
            [
                "codigo_estudiante" => "1116420242",
                "numero_recibo" => "3-02272"
            ],
            [
                "codigo_estudiante" => "1110920242",
                "numero_recibo" => "3-02267"
            ],
            [
                "codigo_estudiante" => "1104220242",
                "numero_recibo" => "2-38803"
            ],
            [
                "codigo_estudiante" => "1115820242",
                "numero_recibo" => "2-38889"
            ],
            [
                "codigo_estudiante" => "1106020242",
                "numero_recibo" => "2-38748"
            ],
            [
                "codigo_estudiante" => "1115620242",
                "numero_recibo" => "3-02233"
            ],
            [
                "codigo_estudiante" => "1116320242",
                "numero_recibo" => "3-02264"
            ],
            [
                "codigo_estudiante" => "1106920242",
                "numero_recibo" => "3-02289"
            ],
            [
                "codigo_estudiante" => "1116220242",
                "numero_recibo" => "2-39086"
            ],
            [
                "codigo_estudiante" => "1109720242",
                "numero_recibo" => "2-39050"
            ],
            [
                "codigo_estudiante" => "1120720242",
                "numero_recibo" => "3-02319"
            ],
            [
                "codigo_estudiante" => "1111520242",
                "numero_recibo" => "1-03485"
            ],
            [
                "codigo_estudiante" => "1102220242",
                "numero_recibo" => "2-38829"
            ],
            [
                "codigo_estudiante" => "1100620242",
                "numero_recibo" => "2-38865"
            ],
            [
                "codigo_estudiante" => "1115520242",
                "numero_recibo" => "2-38786"
            ],
            [
                "codigo_estudiante" => "1119520242",
                "numero_recibo" => "2-38775"
            ],
            [
                "codigo_estudiante" => "1103820242",
                "numero_recibo" => "3-02287"
            ],
            [
                "codigo_estudiante" => "1115320242",
                "numero_recibo" => "3-02252"
            ],
            [
                "codigo_estudiante" => "1102820242",
                "numero_recibo" => "3-02293"
            ],
            [
                "codigo_estudiante" => "1121020242",
                "numero_recibo" => "2-38863"
            ],
            [
                "codigo_estudiante" => "1115420242",
                "numero_recibo" => "2-38897"
            ],
            [
                "codigo_estudiante" => "1102620242",
                "numero_recibo" => "2-38929"
            ],
            [
                "codigo_estudiante" => "1101720242",
                "numero_recibo" => "2-38777"
            ],
            [
                "codigo_estudiante" => "1100520242",
                "numero_recibo" => "2-38873"
            ],
            [
                "codigo_estudiante" => "1116020242",
                "numero_recibo" => "2-38861"
            ],
            [
                "codigo_estudiante" => "1103220242",
                "numero_recibo" => "2-38759"
            ],
            [
                "codigo_estudiante" => "1120420242",
                "numero_recibo" => "3-02232"
            ],
            [
                "codigo_estudiante" => "1119220242",
                "numero_recibo" => "2-38822"
            ],
            [
                "codigo_estudiante" => "1105020242",
                "numero_recibo" => "2-38830"
            ],
            [
                "codigo_estudiante" => "1108120242",
                "numero_recibo" => "2-38839"
            ],
            [
                "codigo_estudiante" => "1103120242",
                "numero_recibo" => "3-02243"
            ],
            [
                "codigo_estudiante" => "1114120242",
                "numero_recibo" => "2-39033"
            ],
            [
                "codigo_estudiante" => "1110720242",
                "numero_recibo" => "3-02266"
            ],
            [
                "codigo_estudiante" => "1103020242",
                "numero_recibo" => "2-38934"
            ],
            [
                "codigo_estudiante" => "1106320242",
                "numero_recibo" => "2-38991"
            ],
            [
                "codigo_estudiante" => "1103520242",
                "numero_recibo" => "2-38998"
            ],
            [
                "codigo_estudiante" => "1110020242",
                "numero_recibo" => "2-39048"
            ],
            [
                "codigo_estudiante" => "1105420242",
                "numero_recibo" => "2-38935"
            ],
            [
                "codigo_estudiante" => "1114220242",
                "numero_recibo" => "2-38894"
            ],
            [
                "codigo_estudiante" => "1109520242",
                "numero_recibo" => "2-39001"
            ],
            [
                "codigo_estudiante" => "1113720242",
                "numero_recibo" => "2-38741"
            ],
            [
                "codigo_estudiante" => "1101620242",
                "numero_recibo" => "2-38986"
            ],
            [
                "codigo_estudiante" => "1114320242",
                "numero_recibo" => "2-38814"
            ],
            [
                "codigo_estudiante" => "1119320242",
                "numero_recibo" => "2-38881"
            ],
            [
                "codigo_estudiante" => "1103420242",
                "numero_recibo" => "2-38760"
            ],
            [
                "codigo_estudiante" => "1109620242",
                "numero_recibo" => "2-38769"
            ],
            [
                "codigo_estudiante" => "1107120242",
                "numero_recibo" => "2-38779"
            ],
            [
                "codigo_estudiante" => "1105720242",
                "numero_recibo" => "2-38840"
            ],
            [
                "codigo_estudiante" => "1102320242",
                "numero_recibo" => "2-38900"
            ],
            [
                "codigo_estudiante" => "1119820242",
                "numero_recibo" => "2-38994"
            ],
            [
                "codigo_estudiante" => "1114820242",
                "numero_recibo" => "2-38904"
            ],
            [
                "codigo_estudiante" => "1111120242",
                "numero_recibo" => "2-38869"
            ],
            [
                "codigo_estudiante" => "1102920242",
                "numero_recibo" => "3-02276"
            ],
            [
                "codigo_estudiante" => "1115020242",
                "numero_recibo" => "1-03461"
            ],
            [
                "codigo_estudiante" => "1105520242",
                "numero_recibo" => "2-38766"
            ],
            [
                "codigo_estudiante" => "1110120242",
                "numero_recibo" => "2-38765"
            ],
            [
                "codigo_estudiante" => "1101320242",
                "numero_recibo" => "2-38864"
            ],
            [
                "codigo_estudiante" => "1110420242",
                "numero_recibo" => "3-02285"
            ],
            [
                "codigo_estudiante" => "1104120242",
                "numero_recibo" => "2-38854"
            ],
            [
                "codigo_estudiante" => "1113820242",
                "numero_recibo" => "2-38749"
            ],
            [
                "codigo_estudiante" => "1114720242",
                "numero_recibo" => "2-38787"
            ],
            [
                "codigo_estudiante" => "1114620242",
                "numero_recibo" => "1-03460"
            ],
            [
                "codigo_estudiante" => "1114920242",
                "numero_recibo" => "2-38773"
            ],
            [
                "codigo_estudiante" => "1103620242",
                "numero_recibo" => "2-38980"
            ],
            [
                "codigo_estudiante" => "1113920242",
                "numero_recibo" => "2-38850"
            ],
            [
                "codigo_estudiante" => "1114020242",
                "numero_recibo" => "2-38747"
            ],
            [
                "codigo_estudiante" => "1114520242",
                "numero_recibo" => "2-38739"
            ],
            [
                "codigo_estudiante" => "1105120242",
                "numero_recibo" => "2-38927"
            ],
            [
                "codigo_estudiante" => "1106420242",
                "numero_recibo" => "2-38841"
            ],
            [
                "codigo_estudiante" => "1103720242",
                "numero_recibo" => "2-38811"
            ],
            [
                "codigo_estudiante" => "1112120242",
                "numero_recibo" => "2-38906"
            ],
            [
                "codigo_estudiante" => "1113620242",
                "numero_recibo" => "3-02234"
            ],
            [
                "codigo_estudiante" => "1106120242",
                "numero_recibo" => "2-38908"
            ],
            [
                "codigo_estudiante" => "1112520242",
                "numero_recibo" => "2-38917"
            ],
            [
                "codigo_estudiante" => "1113020242",
                "numero_recibo" => "1-03472"
            ],
            [
                "codigo_estudiante" => "1113120242",
                "numero_recibo" => "2-38937"
            ],
            [
                "codigo_estudiante" => "1110620242",
                "numero_recibo" => "2-38920"
            ],
            [
                "codigo_estudiante" => "1100420242",
                "numero_recibo" => "2-39041"
            ],
            [
                "codigo_estudiante" => "1113420242",
                "numero_recibo" => "2-38949"
            ],
            [
                "codigo_estudiante" => "1108420242",
                "numero_recibo" => "2-38768"
            ],
            [
                "codigo_estudiante" => "1107320242",
                "numero_recibo" => "3-02228"
            ],
            [
                "codigo_estudiante" => "1112220242",
                "numero_recibo" => "3-02283"
            ],
            [
                "codigo_estudiante" => "1121220242",
                "numero_recibo" => "2-38878"
            ],
            [
                "codigo_estudiante" => "1102120242",
                "numero_recibo" => "3-02281"
            ],
            [
                "codigo_estudiante" => "1101920242",
                "numero_recibo" => "2-40141"
            ],
            [
                "codigo_estudiante" => "1112620242",
                "numero_recibo" => "2-39083"
            ],
            [
                "codigo_estudiante" => "1106820242",
                "numero_recibo" => "2-38876"
            ],
            [
                "codigo_estudiante" => "1108320242",
                "numero_recibo" => "2-38877"
            ],
            [
                "codigo_estudiante" => "1111420242",
                "numero_recibo" => "2-38798"
            ],
            [
                "codigo_estudiante" => "1113220242",
                "numero_recibo" => "2-38789"
            ],
            [
                "codigo_estudiante" => "1105320242",
                "numero_recibo" => "3-02261"
            ],
            [
                "codigo_estudiante" => "1113520242",
                "numero_recibo" => "3-02249"
            ],
            [
                "codigo_estudiante" => "1109120242",
                "numero_recibo" => "2-38757"
            ],
            [
                "codigo_estudiante" => "1104620242",
                "numero_recibo" => "2-38756"
            ],
            [
                "codigo_estudiante" => "1112920242",
                "numero_recibo" => "2-38750"
            ],
            [
                "codigo_estudiante" => "1100720242",
                "numero_recibo" => "3-02242"
            ],
            [
                "codigo_estudiante" => "1112820242",
                "numero_recibo" => "2-38776"
            ],
            [
                "codigo_estudiante" => "1103920242",
                "numero_recibo" => "2-38746"
            ],
            [
                "codigo_estudiante" => "1112420242",
                "numero_recibo" => "3-02274"
            ],
            [
                "codigo_estudiante" => "1107220242",
                "numero_recibo" => "3-02244"
            ],
            [
                "codigo_estudiante" => "1112720242",
                "numero_recibo" => "2-38788"
            ],
            [
                "codigo_estudiante" => "1109420242",
                "numero_recibo" => "3-02254"
            ],
            [
                "codigo_estudiante" => "1108020242",
                "numero_recibo" => "2-38845"
            ],
            [
                "codigo_estudiante" => "1107720242",
                "numero_recibo" => "2-38767"
            ],
            [
                "codigo_estudiante" => "1108620242",
                "numero_recibo" => "2-38737"
            ],
            [
                "codigo_estudiante" => "1105820242",
                "numero_recibo" => "2-39448"
            ],
            [
                "codigo_estudiante" => "1113320242",
                "numero_recibo" => "2-38763"
            ],
            [
                "codigo_estudiante" => "1108220242",
                "numero_recibo" => "2-39078"
            ],
            [
                "codigo_estudiante" => "1111220242",
                "numero_recibo" => "2-39151"
            ],
            [
                "codigo_estudiante" => "1112320242",
                "numero_recibo" => "2-38916"
            ],
            [
                "codigo_estudiante" => "1104320242",
                "numero_recibo" => "2-38979"
            ]
        ];
    }
}
