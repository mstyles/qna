<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Store a newly created Answer in storage.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $this->validate($request, ['answer' => 'required|min:5']);

        $question = Question::findOrFail($id);

        $answer = new Answer();

        $answer->answer = $request->answer;
        $answer->question_id = $id;

        $answer->save();

        return redirect()->back();
    }
}
