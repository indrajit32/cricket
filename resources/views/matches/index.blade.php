@extends('layouts.app')
@section('content')


<div class="row" >
  <form method="post" action="{{ route('matches.store') }}">
      {{csrf_field()}}
    <div class="col-sm-6 col-md-6 col-lg-6 text-center">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Team A</label>
        <select class="form-control" name="team_a"  >
         @foreach($teams as $team)

            @if( Session::get('team_a') == $team->id )
              <option value= {{$team->id}} selected > {{$team->name}} </option>
            @else
              <option value= {{$team->id}} > {{$team->name}} </option>
            @endif
          @endforeach
        </select>
      </div>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6 text-center">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Team B</label>
        <select class="form-control" name="team_b">
         @foreach($teams as $team)

             @if( Session::get('team_b') == $team->id )
              <option value= {{$team->id}} selected > {{$team->name}} </option>
            @else
              <option value= {{$team->id}} > {{$team->name}} </option>
            @endif

          @endforeach
        </select>
      </div>
    </div>
    
    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
      <div class="form-group">
         <button type="submit" class="btn btn-primary">Start Play</button>
      </div>
  </div>
  </form>
</div>

@endsection