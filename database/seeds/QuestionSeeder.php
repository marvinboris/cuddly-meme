<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->delete();

        $questions = [
            "Parlez-moi de vous ?",
            "Qu’est-ce qui est le plus important dans votre vie ?",
            "Quels sont d’après vous vos deux principaux défauts ?",
            "Vos deux principales qualités ?",
            "Que vous apportent vos loisirs ?",
            "Qu’avez-vous fait depuis votre dernier emploi ?",
            "Comment organisez-vous votre recherche d’emploi ?",
            "Pourquoi avez-vous quitté votre dernier emploi ?",
            "Quel poste aimeriez-vous occuper dans 5 ans ?",
            "De quoi êtes-vous le plus fier dans votre carrière ?",
            "Que vous a apporté votre formation ?",
            "Pourquoi avez-vous répondu à notre annonce ?",
            "Que connaissez-vous de notre entreprise ?",
            "Pouvez-vous me définir ce que vous avez compris du poste ?",
            "Pourquoi pensez-vous convenir à ce poste ?",
            "Qui sont nos principaux concurrents ?",
            "Que pensez-vous apporter à notre société ?",
            "Quel est votre niveau d’anglais ?",
            "Comment travaillez-vous en équipe ?",
            "Quel type de manager êtes-vous ?",
            "Quel type de difficulté avez-vous du mal à gérer ?",
            "N’avez-vous pas peur de vous ennuyer à ce poste ?",
            "Comment vous organiserez-vous pour faire garder vos enfants ?",
            "Avez-vous d’autres RDV de recrutement ? Pour quel type de fonction ?",
            "Si vous avez deux réponses positives, sur quels critères choisirez-vous ?",
            "Ne pensez-vous pas que votre (-/+) âge sera un handicap pour ce poste ?",
            "Comment occuperiez-vous les 30 premiers jours de votre prise de fonction ?",
            "Quelle est votre disponibilité ?",
            "Quelles sont vos prétentions salariales ?",
            "Avez-vous des questions à me poser ?"
        ];

        foreach($questions as $question){
            DB::table('questions')->insert([
                'label' => $question,
                'type' => 'textarea',
                'options' => null,
                'placeholder' => null,
                'pre_value' => null,
            ]);

        }
    }
}
