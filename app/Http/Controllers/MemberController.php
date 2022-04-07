<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Member;

class MemberController extends Controller
{
    public function showMemberList(Member $member)
    {
        // $value = [
        //     'a' => 'ika',
        //     'b' => 'ikura',
        //     'c' => 'maguro'
        // ];
        // Log::info('test');
        // Log::info(json_encode($value));
        // $id1 = $member->find(1);
        // Log::info($id1);

        // $area1 = $member->where('area', '東京')->get();
        // Log::info($area1);
        // $ageUnder30 = $member->where('age', '<=', 30)->get();
        // Log::info($ageUnder30);

        $allMember = $member->all();
        // Log::info($allMember);
        // $tokyoUser = $allMember->firstWhere('area','東京');
        // Log::info($tokyoUser);

        //05.Step3・4
        $filtered = $allMember->filter(function($member){
            return $member['age'] >=25;
        });

        $filtered2 = $allMember->filter(function ($member) {
            return $member['age'] <= 20;
        });

        if(!empty($filtered))
        {
            Log::info('25歳以上がいます。');
        }elseif(!empty($filtered2)){
            Log::info('20歳以下がいます');
        }

        //05.step5
        Log::info($allMember->count());

        //05.step6
        $tokyoMembers = $allMember->map(function ($member) {
            if($member['area'] == '東京'){
                return $member;
            }
        });

        Log::info($tokyoMembers);

        //05.step7
        $areas = $allMember->pluck('area');
        Log::info($areas);

        //05.step 8
        $sortMembers = $allMember->sortByDesc(function($member){
            return $member['age'];
        });
        Log::info($sortMembers);

        return 'test';
    }
}
