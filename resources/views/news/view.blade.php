@extends('layouts.app')

@section('content')

<div class="container">

 <div class="panel panel-default">
                <div class="panel-heading">{{$newspost->title}}</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!!$newspost->body!!}    
                </div>
            </div>

</div>

@endsection