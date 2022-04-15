<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/member_list/{member_area?}',[MemberController::class,'showMemberList']);

Route::get('/member_detail/{member_id}',[MemberController::class,'showMemberInfo']);

Route::post('/search_members',[MemberController::class,'searchMembers']);

Route::get('/team_list/{genre?}',[TeamController::class,'showTeams']);

Route::post('/search_teams', [TeamController::class, 'searchTeams']);

//リレーション02.step1
Route::get('/team_members',[TeamController::class,'showTeamWithMembers']);

 //リレーション02.step4
Route::get('/teams_members',[TeamController::class,'showTeamsWithMembers']);
