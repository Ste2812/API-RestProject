<?php

namespace App\Http\Controllers;

use App\Models\DiceGame;
use Illuminate\Http\Request;
use App\Models\User;

class PlayersGamesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $game=new DiceGame();
        $user= User::all();
        $user= $user->id();
        //$game=$request->all();


        $count=0;
        $out=false;
        $input='';

        while($out!=false)
        {
            if ($out==false) {

            echo "tirada dados: ".$count;

            $diceOne=rand(1,6);
            $diceTwo=rand(1,6);

            echo $diceOne+" "+$diceTwo;
            $resultSum=$diceOne+$diceTwo;

            if ($resultSum==7) {
                $probabilityToWin="won!";
            }else{
                $probabilityToWin="lost!";
            }

        }else{
            echo "¿lanzar otra jugada?(s/n)";
            sscanf($input, "%d");
            if ($input==stristr($input, "n")) {
                $out==false;
            }else{
                $out==true;
            }
        }

        $count++;
    }

    $game->dice_one=$request->$diceOne;
    $game->dice_two=$request->$diceTwo;
    $game->result=$request->$resultSum;
    $game->success_result=$request->$probabilityToWin;
    $game->user_id=$request->$user;

    $game->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
