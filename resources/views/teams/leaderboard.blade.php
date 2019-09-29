@extends('layouts.app')
@section('content')

   <div>
     <h2>Leaderboard</h2>
   </div>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Flag</th>
        <th>Country</th>
        <th>Rank</th>
        <th>Score</th>
      </tr>
    </thead>
    <tbody>
   @foreach( $leaderboard as $key => $data )
      <tr>
         <td><img src="{{ asset('images/'.$data->logouri) }}" width="75px" class="img-rounded"></td>
        <td>{{ $data->name }}</td>
        <td>{{ ++$key }}</td>   
        <td>{{ $data->total_score }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection