<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Log;
use Exception;

class TeamController extends Controller
{
    public function showTeams(Team $team, $genre = null)
    {
        try {
            if (isset($genre)) {
                $locatedTeams = $team->searchTeamsByGenre($genre);
                Log::info(json_encode($locatedTeams, JSON_UNESCAPED_UNICODE));
            } else {
                $allTeams = $team->getAllTeams();
                Log::info(json_encode($allTeams, JSON_UNESCAPED_UNICODE));
            }
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    public function searchTeams(Team $team, Request $request)
    {

        try {
            $minFee = $request->input('minFee');
            $maxFee = $request->input('maxFee');
            $genre = $request->input('genre');

            // if(isset($minFee)||isset($maxFee)){
            // $searchedTeams = $team->searchTeamsByFee($minFee,$maxFee);
            // }

            // if(isset($genre)){
            // $searchedTeams = $team->searchTeamsByGenre($genre);
            // }

            // return $searchedTeams;

            return $team->searchTeamsByFeeAndGenre($minFee, $maxFee, $genre);
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }

}
