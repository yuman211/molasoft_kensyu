<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Exception;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'teams_members', 'member_id', 'team_id');
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

    public function insertMember($postData)
    {
        try {
            $member_id = $this->insertGetId($postData);
            return $member_id;
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function tagTeamWithMember($member_id, $team_id)
    {
        $this->teams()->attach(
            ['team_id' => $team_id],
            ['member_id' => $member_id]
        );
    }

    public function updateMember($postData)
    {
        try {
            $this->where('id', '=', $postData['id'])->update($postData);
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function deleteMember($postData)
    {
        try {
            $this->where('id', '=', $postData)->delete($postData);
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
