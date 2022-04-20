<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\Log;


class Practice extends Model
{
    use HasFactory;

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'teams_practices', 'practice_id', 'team_id');
    }

    public function members()
    {
        return $this->belongsToMany(Member::class, 'practices_members', 'practice_id', 'member_id');
    }

    public function getAllPractices()
    {
        try {
            return $this->with('teams')->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function getPastPractices($today)
    {
        try {
            return $this->whereDate('date', '<=', $today)->with('teams')->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function getFuturePractices($today)
    {
        try {
            return $this->whereDate('date', '>', $today)->with('teams')->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
