<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Response;

class QuestionsController extends Controller
{

    /**
     * Base path to the view of this controller
     */
    public static $view_folder = 'admin.questions.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view(self::$view_folder . 'index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(self::$view_folder . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'type' => 'required',
            'options' => 'required_if:type,select|json',
            'placeholder' => 'present',
            'pre_value' => 'present'
        ]);

        $question_exist = Question::whereLabel($request->label)->first();

        if ($question_exist) {
            return back()->withError("This question already exist !");
        }

        Question::create($request->except('_token', '_method'));

        return redirect()->route('admin.questions.index')->withSuccess('Question added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        // Can't edit question because the users's response will directly become no sense
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //first we delete all response of this questions
        Response::where('question_id', $id)->delete();

        //second we delete question
        Question::whereId($id)->delete();

        return back()->withSuccess("Question deleted successfully !");
    }
}
