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
            "Tell me about yourself ?",
            "What is most important in your life?",
            "What do you think are your two main defects?",
            "Your two main qualities?",
            "What do your hobbies bring to you ?",
            "What have you done since your last job?",
            "How do you organize your job search?",
            "Why did you leave your last job?",
            "What position would you like to occupy in 5 years?",
            "What are you most proud of in your career?",
            "What did your training bring you?",
            "Why did you respond to our announcement?",
            "What do you know about our company?",
            "Can you tell me what you understood about the job?",
            "Why do you think you are suitable for this job?",
            "Who are our main competitors?",
            "What do you think you bring to our society?",
            "What is your english level ?",
            "How do you work as a team?",
            "What kind of manager are you?",
            "What kind of difficulty do you have trouble managing?",
            "Are not you afraid of getting bored at this post?",
            "How will you organize to keep your children?",
            "Do you have other recruiting appointments, for which type of function?",
            "If you have two positive answers, which criteria will you choose?",
            "Do not you think that your (- / +) age will be a handicap for this job?",
            "How would you do the first 30 days of taking office?",
            "What is your availability?",
            "What are your salary expectations ?",
            "Do you have questions to ask me?",
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
