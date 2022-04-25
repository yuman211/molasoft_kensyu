<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Exception;

class Member extends Model
{
    use HasFactory;


    public function team()
    {
        return $this->belongsTo(Team::class,'teamId', 'id');
    }

    public function getMembersWithTeams($member_id)
    {
        try {
            return $this->with('team')->find($member_id);
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function searchMembersByArea($member_area)
    {
        try {
            $query = $this->query();

            if (isset($member_area)) {
                $query->where('area', $member_area)->get();
            }
            return $query->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }


    public function searchMembersByAge($minAge, $maxAge)
    {
        try {
            $query = $this->query();

            if (isset($minAge)) {
                $query->where('age', '>=', $minAge);
            }

            if (isset($maxAge)) {
                $query->where('age', '<=', $maxAge);
            }

            return $query->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
