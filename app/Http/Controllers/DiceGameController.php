<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiceGame;
use App\Models\User;

class DiceGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $game= new DiceGame();
        $game->dice_one=rand(1, 6);
        $game->dice_two=rand(1, 6);
        $game->success_result='';
        $game->result=$game->dice_one+$game->dice_two;
        $game->average_ranking=0;
        $game->user_id=$request->user()->id;

        if ($game->result==7){
            $game->success_result='You win!';
        }else{
            $game->success_result='You lose!';
        }

        $game->save();

        return response()->json($game);

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $player=$request->user();
        $player->name->$request->get('name');
        $player->save();

        return response()->json([
            'message' => 'User updated successfully'
        ], 200);
    }

    public function ranking(Request $request){
        $player=$request->user();
        $getMatches=$player->diceGames()->get()->all();
        $nPlays=0;

        for($i=0; $i<count($getMatches); $i++){
            $nPlays=$nPlays+$i;
        }

        $average_ranking=$getMatches/$nPlays;

        return response()->json([
            'average_ranking' => $average_ranking
        ], 200);

    }

    public function rankingAll(Request $request){
        $players=User::all();
        $ranking=$players;
        $ranking->$players=$request->user()->diceGames()->get()->all();

        return response()->json([
            'ranking' => $ranking
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $player=$request->user()->id();
        $player = DiceGame::where('user_id', $request->id)->delete();

        return response()->json([

            'user' => $player,
            'message' => 'User deleted successfully'
        ], 200);

    }
}
