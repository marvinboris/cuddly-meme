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

        for($i =0; $i < 30; ++$i){
            $type = rand(0,2) == 0 ? 'select' : 'text';
            $options = null;
            if($type == 'select'){
                $options = [];
                $n = rand(2,10);
                for($j = 0; $j < $n; ++$j){
                    array_push($options, str_random());
                }
            }
            DB::table('questions')->insert([
                'label' => 'Question du label #'.$i,
                'type' => $type,
                'options' => json_encode($options),
                'placeholder' => rand(0,2) > 0 ? null: 'Placeholder du champ #'.$i,
                'pre_value' => ($type != 'select') && rand(0,3) > 0 ? null: 'pre-value du champ #'.$i,
            ]);
            
        }
    }
}
