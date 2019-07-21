@extends('layouts.app')

@section('title', 'Answer')

@section('content')
    <h3>{{ $question->question }}</h1>
    <form action="/questions/{{ $question->id }}/answers" method="POST">
        @csrf
        <div>
            <div class="form-group has-feedback{{ ($errors->has('answer') ? ' has-error' : '') }}">
                <label for="answer">Provide an answer:</label>
                <br/>
                <input class="form-control" id="answer" name="answer" type="text"
                       value="{{ old('answer') }}"/>
                @if ($errors->has('answer'))
                    <span class="help-block"> <strong>{{ $errors->first('answer') }}</strong> </span>
                @endif
            </div>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
    <div>
        <table id="questions" class="table table-striped table-bordered" cellspacing="0">
            <tbody>
            @foreach($answers as $answer)
                <tr>
                    <td>{{ $answer->answer }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
