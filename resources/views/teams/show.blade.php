@extends('layouts.app')
@section('content')

   <div>
      <img src="{{ asset('images/'.$team->logouri) }}" width="75px" class="img-rounded">
     <h2>{{ $team->name }}</h2>
   </div>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th> Image </th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Player History</th>
      </tr>
    </thead>
    <tbody>
   @foreach( $team->players as $player )
      <tr>
         <td><img src="{{ asset('images/'.$player->imageuri) }}" width="75px" class="img-rounded"></td>
        <td>{{ $player->first_name }}</td>
        <td>{{ $player->last_name }}</td>   
        <td>{{ $player->player_history }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection