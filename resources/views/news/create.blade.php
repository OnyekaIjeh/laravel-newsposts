@extends('layouts.app')

@section('content')

<div class="container">

 <div class="panel panel-default">
                <div class="panel-heading">Create New News Post</div>
            </div>

            @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{!! Form::open([
    'url' => 'news/create'
]) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:', ['class' => 'control-label']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'mdeditor']) !!}
</div>


{!! Form::submit('Create New News Post', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

</div>

@endsection