@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to your Backend, {{Auth::user()->name}}</div>
            </div>
             @if (session('success'))
            <div class="alert alert-info">
                {{session('success')}}
            </div>
        @endif
            <div class="row">
                <div class="col-md-6">
                
                     <div class="panel panel-default">
                        <div class="panel-heading">News Posts <a href="/news/create" class="btn btn-primary btn-xs pull-right">Create a News Post</a></div>
                        <ol>
                            @forelse ($newsposts as $newspost)
                            
                                <li><a href="/news/{{$newspost->slug}}">{{$newspost->title}}</a><br/>
                                <a href="/news/edit/{{$newspost->slug}}" class="btn btn-info btn-xs">Edit News Post</a>
                                <a href="/news/delete/{{$newspost->slug}}" class="btn btn-danger btn-xs">Delete News Post</a>
                                <br/>
                                    <strong>{{$newspost->created_at}}</strong>
                                </li>
                                <br/>
                            @empty
                                No news posts. <a href="/news/create" class="btn btn-primary btn-xs">Create a News Post</a>
                            @endforelse
                        </ol>
                    </div>
                </div>

                 <div class="col-md-6">
                     <div class="panel panel-default">
                        <div class="panel-heading">Event Entries <a href="/event/create" class="btn btn-primary btn-xs pull-right">Create a New Event</a></div>
                         <ol>
                            @forelse ($events as $event)
                            
                                <li>{{$event->title}}<br/>
                                <a href="/event/edit/{{$event->slug}}" class="btn btn-info btn-xs">Edit Event</a>
                                <a href="/event/delete/{{$event->slug}}" class="btn btn-danger btn-xs">Delete Event</a>
                                <br/>
                                    <strong>{{$event->created_at}}</strong>
                                </li>
                                <br/>
                            @empty
                                No events. <a href="/event/create" class="btn btn-primary btn-xs">Create an Event</a>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
