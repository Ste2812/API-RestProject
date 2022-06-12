<?php
namespace App\Classes;

//use App\Models\DiceGame;


class DiceGameAux
{


    //private $diceOne;
    private $dice;
    private $result;
    private $averageRanking;
    //private $getUser;
    //private $getAllresult;

    public function __construct()
    {
        //$diceOne=0;
        $dice=array();
        $result=null;
        //$averageRanking=null;
        //$getAllResult=ModelsDiceGame::all();

    }

    static function diceHandThrow()
    {
        $arrayHandThrow=array();
        $diceOne=$dice=[0];
        $diceTwo=$dice=[1];

        $diceOne=rand(1,6);
        $diceTwo=rand(1,6);

        $arrayHandThrow=array($diceOne, $diceTwo);

        return $arrayHandThrow=array($diceOne, $diceTwo);
    }

    static function resultHandDices()
    {

        $result=self::diceHandThrow();
        $probabilityToWin=null;

        $resultSum=$result(0)+$result(1);
        //$arrayToDB=array();

        if ($result==7) {
            $probabilityToWin="won!";
        }else{
            $probabilityToWin="lost!";
        }

        return $arrayToDB=array($result(0), $result(1), $resultSum, $probabilityToWin);

    }

    public function startGame()
    {
        $count=0;
        $out=false;
        $input='';
        $datos=array();

        while($out!=false)
        {
            if ($out==false) {

            echo "tirada dados: ".$count;

            $gamePlay=array();
            $gamePlay= self::resultHandDices();
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
        return $datos[$gamePlay];
        }
    }


/*
    public function getAverageRankingForPlayer()
    {
        $countThrows=0;
        $getHandsThrows=self::diceHandThrow();
        //$getAllResults=DiceGame::all();
        $getUser=User::user()->id();

        while (!$countThrows) {



        }



    }

    public function getAllAverageRanking()
    {

    }
*/

}




?>
