<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provincia::insert([
            //provincia amazonas
            ['name'=>'CHACHAPOYAS','departamento_id'=>1],
            ['name'=>'BAGUA','departamento_id'=>1],
            ['name'=>'BONGARÁ','departamento_id'=>1],
            ['name'=>'CONDORCANQUI','departamento_id'=>1],
            ['name'=>'LUYA','departamento_id'=>1],
            ['name'=>'RODRÍGUEZ DE MENDOZA','departamento_id'=>1],
            ['name'=>'UTCUBAMBA','departamento_id'=>1],
            //provincia ancash
            ['name'=>'HUARAZ','departamento_id'=>2],
            ['name'=>'AIJA','departamento_id'=>2],
            ['name'=>'ANTONIO RAYMONDI','departamento_id'=>2],
            ['name'=>'ASUNCIÓN','departamento_id'=>2],
            ['name'=>'BOLOGNESI','departamento_id'=>2],
            ['name'=>'CARHUAZ','departamento_id'=>2],
            ['name'=>'CARLOS FERMÍN FITZCARRALD','departamento_id'=>2],
            ['name'=>'CASMA','departamento_id'=>2],
            ['name'=>'CORONGO','departamento_id'=>2],
            ['name'=>'HUARI','departamento_id'=>2],
            ['name'=>'HUARMEY','departamento_id'=>2],
            ['name'=>'HUAYLAS','departamento_id'=>2],
            ['name'=>'MARISCAL LUZURIAGA','departamento_id'=>2],
            ['name'=>'OCROS','departamento_id'=>2],
            ['name'=>'PALLASCA','departamento_id'=>2],
            ['name'=>'POMABAMBA','departamento_id'=>2],
            ['name'=>'RECUAY','departamento_id'=>2],
            ['name'=>'SANTA','departamento_id'=>2],
            ['name'=>'SIHUAS','departamento_id'=>2],
            ['name'=>'YUNGAY','departamento_id'=>2],
            //provincia apurimac
            ['name'=>'ABANCAY','departamento_id'=>3],
            ['name'=>'ANDAHUAYLAS','departamento_id'=>3],
            ['name'=>'ANTABAMBA','departamento_id'=>3],
            ['name'=>'AYMARAES','departamento_id'=>3],
            ['name'=>'COTABAMBAS','departamento_id'=>3],
            ['name'=>'CHINCHERO','departamento_id'=>3],
            ['name'=>'GRAU','departamento_id'=>3],
            //provincia arequipa
            ['name'=>'AREQUIPA','departamento_id'=>4],
            ['name'=>'CAMANÁ','departamento_id'=>4],
            ['name'=>'CARAVELÍ','departamento_id'=>4],
            ['name'=>'CASTILLA','departamento_id'=>4],
            ['name'=>'CAYLLOMA','departamento_id'=>4],
            ['name'=>'CONDESUYOS','departamento_id'=>4],
            ['name'=>'ISLAY','departamento_id'=>4],
            ['name'=>'LA UNIÓN','departamento_id'=>4],
            //provincia ayacucho
            ['name'=>'HUAMANGA','departamento_id'=>5],
            ['name'=>'CANGALLO','departamento_id'=>5],
            ['name'=>'HUANCA SANCOS','departamento_id'=>5],
            ['name'=>'HUANTA','departamento_id'=>5],
            ['name'=>'LA MAR','departamento_id'=>5],
            ['name'=>'LUCANAS','departamento_id'=>5],
            ['name'=>'PARINACOCHA','departamento_id'=>5],
            ['name'=>'PÁUCAR DEL SARA','departamento_id'=>5],
            ['name'=>'SUCRE','departamento_id'=>5],
            ['name'=>'VÍCTOR FAJARDO','departamento_id'=>5],
            ['name'=>'VILCAS HUAMÁN','departamento_id'=>5],
            //provincia cajamarca
            ['name'=>'CAJAMARCA','departamento_id'=>6],
            ['name'=>'CAJABAMBA','departamento_id'=>6],
            ['name'=>'CELENDÍN','departamento_id'=>6],
            ['name'=>'CHOTA','departamento_id'=>6],
            ['name'=>'CONTUMAZÁ','departamento_id'=>6],
            ['name'=>'CUTERVO','departamento_id'=>6],
            ['name'=>'HUALGAYOC','departamento_id'=>6],
            ['name'=>'JAÉN','departamento_id'=>6],
            ['name'=>'SAN IGNACIO','departamento_id'=>6],
            ['name'=>'SAN MARCOS','departamento_id'=>6],
            ['name'=>'SAN MIGUEL','departamento_id'=>6],
            ['name'=>'SAN PABLO','departamento_id'=>6],
            ['name'=>'SANTA CRUZ','departamento_id'=>6],
            

            //provincia cusco
            ['name'=>'CUSCO','departamento_id'=>7],
            ['name'=>'ACOMAYO','departamento_id'=>7],
            ['name'=>'AANTA','departamento_id'=>7],
            ['name'=>'CALCA','departamento_id'=>7],
            ['name'=>'CANAS','departamento_id'=>7],
            ['name'=>'CANCHIS','departamento_id'=>7],
            ['name'=>'CHUMBIVILCA','departamento_id'=>7],
            ['name'=>'ESPINAR','departamento_id'=>7],
            ['name'=>'LA CONVENCIÓN','departamento_id'=>7],
            ['name'=>'PARURO','departamento_id'=>7],
            ['name'=>'PAUCARTAMBO','departamento_id'=>7],
            ['name'=>'QHISPICANCHI','departamento_id'=>7],
            ['name'=>'URUBAMBA','departamento_id'=>7],
            //provincia huancavelica
            ['name'=>'HUANCAVELICA','departamento_id'=>8],
            ['name'=>'ACOBAMBA','departamento_id'=>8],
            ['name'=>'ANGARAES','departamento_id'=>8],
            ['name'=>'CASTROVIRREYNA','departamento_id'=>8],
            ['name'=>'CHURCAMPA','departamento_id'=>8],
            ['name'=>'HUAYTARÁ','departamento_id'=>8],
            ['name'=>'TAYACAJA','departamento_id'=>8],
            //provincia huanuco
            ['name'=>'HUÁNUCO','departamento_id'=>9],
            ['name'=>'AMBO','departamento_id'=>9],
            ['name'=>'DOS DE MAYO','departamento_id'=>9],
            ['name'=>'HUACAYBAMBA','departamento_id'=>9],
            ['name'=>'HUAMALÍES','departamento_id'=>9],
            ['name'=>'LEONCIO PRADO','departamento_id'=>9],
            ['name'=>'MARAÑÓN','departamento_id'=>9],
            ['name'=>'PACHITEA','departamento_id'=>9],
            ['name'=>'PUERTO INCA','departamento_id'=>9],
            ['name'=>'LAURICOCHA ','departamento_id'=>9],
            ['name'=>'YAROWILCA','departamento_id'=>9],
            //provincia ica
            ['name'=>'ICA','departamento_id'=>10],
            ['name'=>'CHINCHA','departamento_id'=>10],
            ['name'=>'NAZCA','departamento_id'=>10],
            ['name'=>'PALPA ','departamento_id'=>10],
            ['name'=>'PISCO','departamento_id'=>10],
            //provincia junin
            ['name'=>'HUANCAYO','departamento_id'=>11],
            ['name'=>'CONCEPCIÓN','departamento_id'=>11],
            ['name'=>'CHANCHAMAYO','departamento_id'=>11],
            ['name'=>'JAUJA','departamento_id'=>11],
            ['name'=>'JUNÍN','departamento_id'=>11],
            ['name'=>'SATIPO','departamento_id'=>11],
            ['name'=>'TARMA','departamento_id'=>11],
            ['name'=>'YAULI','departamento_id'=>11],
            ['name'=>'CHUPACA','departamento_id'=>11],
            //provincia la libertad
            ['name'=>'TRUJILLO ','departamento_id'=>12],
            ['name'=>'ASCOPE ','departamento_id'=>12],
            ['name'=>'BOLÍVAR','departamento_id'=>12],
            ['name'=>'CHEPÉN','departamento_id'=>12],
            ['name'=>'JUNÍN','departamento_id'=>12],
            ['name'=>'JULCÁN ','departamento_id'=>12],
            ['name'=>'OTUZCO','departamento_id'=>12],
            ['name'=>'PACASMAYO','departamento_id'=>12],
            ['name'=>'PATAZ','departamento_id'=>12],
            ['name'=>'SÁNCHEZ CARRIÓN','departamento_id'=>12],
            ['name'=>'SANTIAGO DE CHUCO','departamento_id'=>12],
            ['name'=>'GRAN CHIMÚ','departamento_id'=>12],
            ['name'=>'VIRÚ','departamento_id'=>12],
            //provincia la lambayeque
            ['name'=>'CHICLAYO','departamento_id'=>13],
            ['name'=>'FERREÑAFE','departamento_id'=>13],
            ['name'=>'LAMBAYEQUE','departamento_id'=>13],
            //provincia la lima
            ['name'=>'LIMA','departamento_id'=>14],
            ['name'=>'BARRANCA','departamento_id'=>14],
            ['name'=>'CAJATAMBO','departamento_id'=>14],
            ['name'=>'CANTA','departamento_id'=>14],
            ['name'=>'CAÑETE','departamento_id'=>14],
            ['name'=>'HUARAL','departamento_id'=>14],
            ['name'=>'HUAROCHIRÍ','departamento_id'=>14],
            ['name'=>'HUAURA','departamento_id'=>14],
            ['name'=>'OYÓN','departamento_id'=>14],
            ['name'=>'YAUYOS','departamento_id'=>14],
            //provincia la loreto
            ['name'=>'MAYNAS','departamento_id'=>15],
            ['name'=>'AALTO AMAZONAS','departamento_id'=>15],
            ['name'=>'LORETO','departamento_id'=>15],
            ['name'=>'MARISCAL RAMÓN CASTILLA','departamento_id'=>14],
            ['name'=>'REQUENA','departamento_id'=>15],
            ['name'=>'UCAYALÍ','departamento_id'=>15],
            ['name'=>'DATEM DEL MARAÑÓN','departamento_id'=>15],
            ['name'=>'PUTUMAYO','departamento_id'=>15],
            //provincia la madre de dios
            ['name'=>'TAMBOPATA','departamento_id'=>16],
            ['name'=>'MANU','departamento_id'=>16],
            ['name'=>'TAHUAMANU','departamento_id'=>16],
            //provincia la moquegua
            ['name'=>'MARISCAL NIETO','departamento_id'=>17],
            ['name'=>'GENERAL SÁMCHEZ CERRO','departamento_id'=>17],
            ['name'=>'ILO','departamento_id'=>17],
            //provincia la pasco
            ['name'=>'PASCO','departamento_id'=>18],
            ['name'=>'DANIEL ALCIDES CARRIÓN','departamento_id'=>18],
            ['name'=>'OXAPAMPA ','departamento_id'=>18],
            //provincia la piura
            ['name'=>'PIURA','departamento_id'=>19],
            ['name'=>'AYABACA','departamento_id'=>19],
            ['name'=>'HUANCABAMBA','departamento_id'=>19],
            ['name'=>'MORROPÓN','departamento_id'=>19],
            ['name'=>'PAITA','departamento_id'=>19],
            ['name'=>'SULLANA','departamento_id'=>19],
            ['name'=>'TALARA','departamento_id'=>19],
            ['name'=>'SECHURA','departamento_id'=>19],
            //provincia la puno
            ['name'=>'PUNO','departamento_id'=>20],
            ['name'=>'AZÁNGARO','departamento_id'=>20],
            ['name'=>'CARABAYA','departamento_id'=>20],
            ['name'=>'CHUCUITO','departamento_id'=>20],
            ['name'=>'EL CALLAO','departamento_id'=>20],
            ['name'=>'HUANCANÉ','departamento_id'=>20],
            ['name'=>'LAMPA','departamento_id'=>20],
            ['name'=>'MELGAR','departamento_id'=>20],
            ['name'=>'MOHO','departamento_id'=>20],
            ['name'=>'SAN AANTONIO DE PUTINA','departamento_id'=>20],
            ['name'=>'SAN RAMÓN','departamento_id'=>20],
            ['name'=>'SANDIA','departamento_id'=>20],
            ['name'=>'YUNGUYO','departamento_id'=>20],
              //provincia san martin
            ['name'=>'MOYOBAMBA','departamento_id'=>21],
            ['name'=>'BELLAVISTA','departamento_id'=>21],
            ['name'=>'EL DORADO','departamento_id'=>21],
            ['name'=>'HUALLAGA','departamento_id'=>21],
            ['name'=>'LAMAS','departamento_id'=>21],
            ['name'=>'HUANCANÉ','departamento_id'=>21],
            ['name'=>'LAMPA','departamento_id'=>21],
            ['name'=>'MARISCAL CÁCERES','departamento_id'=>21],
            ['name'=>'PICOTA','departamento_id'=>21],
            ['name'=>'RIOJA','departamento_id'=>21],
            ['name'=>'SAN MARTÍN','departamento_id'=>21],
            ['name'=>'TOCACHE','departamento_id'=>21],
            //provincia san martin
            ['name'=>'TACNA','departamento_id'=>22],
            ['name'=>'CANDARAVE','departamento_id'=>22],
            ['name'=>'JORGE BASADRE','departamento_id'=>22],
            ['name'=>'TARATA','departamento_id'=>22],
            //provincia tumbes
            ['name'=>'TUMBES','departamento_id'=>23],
            ['name'=>'CONTRALMIRANTE VILLAR','departamento_id'=>23],
            ['name'=>'ZARUMILLA','departamento_id'=>23],
            //provincias de ucayali
            ['name'=>'CORONEL PORTILLO','departamento_id'=>24],
            ['name'=>'ATALAYA','departamento_id'=>24],
            ['name'=>'PADRE ABAD','departamento_id'=>24],
            ['name'=>'PURÚS','departamento_id'=>24],
            //PROVINCIAS DEL CALLAO
            ['name'=>'CALLAO','departamento_id'=>25],


        ]);


        // Provincia::create([
        //     'name'=>'Huancayo',
        // ]);
        // Provincia::create([
        //     'name'=>'Concepción',
        // ]);
        // Provincia::create([
        //     'name'=>'Chanchamayo',
        // ]);
        // Provincia::create([
        //     'name'=>'Jauja',
        // ]);
        // Provincia::create([
        //     'name'=>'Junín',
        // ]);
        // Provincia::create([
        //     'name'=>'Satipo',
        // ]);
        // Provincia::create([
        //     'name'=>'Tarma',
        // ]);
        // Provincia::create([
        //     'name'=>'Yauli',
        // ]);
        // Provincia::create([
        //     'name'=>'Chupaca',
        // ]);
    }
}
