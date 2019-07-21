<?php

Route::get('/', function () {
    return redirect('questions');
});

Route::resource('questions', 'QuestionController')->only([
    'index', 'store'
]);
