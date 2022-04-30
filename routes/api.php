<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

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

Route::get('/member_list/{member_area?}', [MemberController::class, 'showMemberList']);

Route::get('/member_detail/{member_id}', [MemberController::class, 'showMemberInfo']);

Route::post('/search_members', [MemberController::class, 'searchMembers']);

Route::get('/team_list/games', [GameController::class, 'showAllGames']);

Route::get('/team_list/{genre?}', [TeamController::class, 'showTeams']);

Route::post('/search_teams', [TeamController::class, 'searchTeams']);

Route::get('/team/practice',[PracticeController::class, 'showPracticesWithTeam']);

Route::get('/teams_members', [TeamController::class, 'showTeamsWithMembers']);

Route::post('/search_games', [GameController::class, 'searchGames']);

Route::post('/register/member',[MemberController::class, 'registerMember']);

Route::post('/edit/member',[MemberController::class, 'updateMember']);

Route::post('/delete/member',[MemberController::class,'deleteMember']);

Route::post('/register/team',[TeamController::class, 'registerTeam']);

Route::post('/edit/team',[TeamController::class, 'updateTeam']);

Route::post('/delete/team',[TeamController::class,'softDeleteTeam']);
