@extends('layouts.app')

@section('content')

<div class="container">

 <div class="panel panel-default">
                <div class="panel-heading">Edit Event</div>
            </div>

            @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{!! Form::open([
    'url' => 'event/edit/'.$event->slug
]) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', $event->title, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Date and Time for Event:', ['class' => 'control-label']) !!}
    {!! Form::text('date', $event->date, ['class' => 'form-control', 'id' => 'datepicker']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:', ['class' => 'control-label']) !!}
    {!! Form::textarea('body', $event->body, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Save Event', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

</div>

@endsection