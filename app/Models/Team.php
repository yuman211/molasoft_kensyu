<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function practices()
    {
        return $this->belongsToMany(Practice::class, 'teams_practices', 'team_id', 'practice_id');
    }

    public function rank()
    {
        return $this->hasOne(Rank::class, 'id', 'rank');
    }

    public function member()
    {
        return $this->hasMany(Member::class,'team_id','id');
    }

    public function members()
    {
        return $this->belongsToMany(Member::class,'teams_members','team_id','member_id');
    }

    public function getTeamWithMembers()
    {

        try {
            return $this->with('member')->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function getAllTeams()
    {
        try {
            return $this->whereNull('deleted_at')->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function getAllTeamsWithRanks()
    {
        try {
            return $this->with('rank')->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function getAllTeamsWithPractice(){

        try {
            return $this->with('practices.members')->get();

        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function searchTeamsByGenre($genre)
    {

        try {

            $query = $this->query();

            if (isset($genre)) {
                $query->where('genre', $genre);
            }

            return $query->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function searchTeamsByFeeAndGenre($minFee, $maxFee, $genre)
    {

        try {

            $query = $this->query();

            if (isset($minFee)) {
                $query->where('fee', '>=', $minFee);
            }

            if (isset($maxFee)) {
                $query->where('fee', '<=', $maxFee);
            }

            if (isset($genre)) {
                $query->where('genre', $genre);
            }

            return $query->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function insertTeam($postData)
    {
        try {
            $this->insert($postData);
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function updateTeam($postData)
    {
        try {
            $this->where('id', '=', $postData['id'])->update($postData);
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function softDeleteTeam($postData)
    {
        try {
            $this->where('id', '=', $postData)->delete($postData);
            // $this->where('id', '=', $postData)->update(['deleted_at' => Carbon::now()]);

        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
