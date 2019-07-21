<?php

Route::get('/', function () {
    return redirect('questions');
});

Route::resource('questions', 'QuestionController')->only([
    'index', 'store', 'show'
]);

Route::post('/questions/{id}/answers', 'AnswerController@store');
