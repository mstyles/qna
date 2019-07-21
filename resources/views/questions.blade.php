@extends('layouts.app')

@section('title', 'Questions')

@section('content')
    <form action="{{ URL::current() }}" method="POST">
        @csrf
        <div>
            <div class="form-group has-feedback{{ ($errors->has('question') ? ' has-error' : '') }}">
                <label for="question">Ask a question:</label>
                <br/>
                <input class="form-control" id="question" name="question" type="text"
                       placeholder="{{ $placeholder }}" value="{{ old('question') }}"/>
                @if ($errors->has('question'))
                    <span class="help-block"> <strong>{{ $errors->first('question') }}</strong> </span>
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
            @foreach($questions as $question)
                <tr>
                    <td>
                        <a href="/questions/{{ $question->id }}"
                           title="{{ $question->question }}">{{ $question->question }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
