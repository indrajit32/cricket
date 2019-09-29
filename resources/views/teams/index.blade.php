@extends('layouts.app')
@section('content')
<div class = "panel panel-default">
   <div class = "panel-heading">
      <h3 class = "panel-title">
         Team List:
      </h3>
   </div>
   
   <div class = "panel-body">
      <ul class="list-group">
         @foreach($teams as $team)
        <li class="list-group-item">
         <a href="/teams/{{ $team->id }}">
            <img src="{{ asset('images/'.$team->logouri) }}" width="75px" class="img-rounded">
            <span style='margin-left: 20'>{{ $team->name }}</span>
         </a>
      </li>
         @endforeach
      </ul>
   </div>
</div>

@endsection