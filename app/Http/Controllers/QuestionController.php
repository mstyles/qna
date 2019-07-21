<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the Questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $placeholder = Arr::random([
            'Where does cheese come from?',
            'How do you milk an almond?',
            'I have canines. Does that mean it is my destiny to be a carnivore?',
        ]);
        $questions = DB::table('questions')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('questions', ['questions' => $questions, 'placeholder' => $placeholder]);
    }

    /**
     * Store a newly created Question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['question' => 'required|min:5|ends_with:?']);

        $question = new Question();

        $question->question = $request->question;

        $question->save();

        return redirect()->back();
    }
}
