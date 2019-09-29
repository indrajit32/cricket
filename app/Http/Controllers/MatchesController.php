<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;
use DB;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('matches.index',['teams'=>$teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( $request->input('team_a') != $request->input('team_b') )
        {
            $arr['team_a']['id'] = $request->input('team_a');
            $arr['team_a']['score'] = rand(0,10);

            $arr['team_b']['id'] = $request->input('team_b');
            $arr['team_b']['score'] = rand(0,10);

            if( $arr['team_a']['score'] > $arr['team_b']['score'] )
            {
                $arr['team_b']['point'] = 0;
                $arr['team_a']['point'] = 4;

                $match_id = DB::table('matches')->insertGetId(['team_one' => $arr['team_a']['id'], 'team_two' => $arr['team_b']['id'] , 'team_won' => $arr['team_a']['id']]);
            }
            else if( $arr['team_a']['score'] == $arr['team_b']['score'] )
            {
                $arr['team_a']['point'] = 2;
                $arr['team_a']['point'] = 2;

                $match_id = DB::table('matches')->insertGetId(['team_one' => $arr['team_a']['id'], 'team_two' => $arr['team_b']['id'] , 'team_won' => '']);
            }
            else
            {
                $arr['team_a']['point'] = 0;
                $arr['team_b']['point'] = 4;

                try
                {
                    $match_id = DB::table('matches')->insertGetId(['team_one' => $arr['team_a']['id'], 'team_two' => $arr['team_b']['id'] , 'team_won' => $arr['team_b']['id']]);
                }
                catch(\Exception $e){
                    // do task when error
                    echo $e->getMessage();
                }
            }

            if( NULL != $match_id )
            {
                try
                {
                    DB::table('points')->insert(['score' => $arr['team_a']['point'],'team_id'=>$arr['team_a']['id'],'match_id' => $match_id]);
                    DB::table('points')->insert(['score' => $arr['team_b']['point'], 'team_id'=>$arr['team_b']['id'], 'match_id' => $match_id]);
                }
                catch(\Exception $e){
                        // do task when error
                        echo $e->getMessage();
                }

                if( $arr['team_a']['point'] > $arr['team_b']['point'] )
                {
                return redirect()->route('matches.index')->with(['success'=>'Team A won the match', 'team_a'=>$arr['team_a']['id'], 'team_b'=>$arr['team_b']['id']]);
                }
                else if( $arr['team_a']['point'] == $arr['team_b']['point'] )
                {
                    return redirect()->route('matches.index')->with(['success'=>'Match Draw', 'team_a'=>$arr['team_a']['id'], 'team_b'=>$arr['team_b']['id'] ]);
                }
                else
                {
                    return redirect()->route('matches.index')->with(['success'=>'Team B won the match' , 'team_a'=>$arr['team_a']['id'], 'team_b'=>$arr['team_b']['id'] ]);
                }
            }
        } 
        else
        {
            return redirect()->route('matches.index')->with('error','Both the teams cannot be same');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
