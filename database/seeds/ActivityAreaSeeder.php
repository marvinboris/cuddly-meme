<?php

use Illuminate\Database\Seeder;

class ActivityAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_areas')->delete();
        $activity_areas = [
            "Agroalimentaire",
            "Banque / Assurance",
            "Bois / Papier / Carton / Imprimerie",
            "BTP / Matériaux de construction",
            "Chimie / Parachimie",
            "Commerce / Négoce / Distribution",
            "Édition / Communication / Multimédia",
            "Électronique / Électricité",
            "Études et conseils",
            "Industrie pharmaceutique",
            "Informatique / Télécoms",
            "Machines et équipements / Automobile",
            "Métallurgie / Travail du métal",
            "Plastique / Caoutchouc",
            "Services aux entreprises",
            "Textile / Habillement / Chaussure",
            "Transports / Logistique",
        ];

        foreach($activity_areas as $item){
            DB::table('activity_areas')->insert(['name' => $item]);
        }
    }
}
