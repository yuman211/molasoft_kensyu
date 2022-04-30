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
                // Log::info(json_encode($locatedTeams, JSON_UNESCAPED_UNICODE));
                return $locatedTeams;
            } else {
                $allTeams = $team->getAllTeamsWithPractice();
                // Log::info(json_encode($allTeams, JSON_UNESCAPED_UNICODE));
                return $allTeams;
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
    //リレーション02.step4
    public function showTeamsWithMembers(Team $team)
    {
        Log::info(json_encode($team->getTeamWithMembers(),JSON_UNESCAPED_UNICODE));
    }


    public function registerTeam(Team $team, Request $request)
    {
        try {
            $postData = $request->only(['name', 'explain', 'genre', 'fee', 'rank']);
            $team->insertTeam($postData);
            return '登録OK';
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    public function updateTeam(Team $team, Request $request)
    {
        try {
            $postData = $request->all();
            $team->updateTeam($postData);
            return '更新OK';
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    public function softDeleteTeam(Team $team, Request $request)
    {
        try {
            $postData = $request->only('id');
            $team->softDeleteTeam($postData);

            return '削除OK';
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }

}
