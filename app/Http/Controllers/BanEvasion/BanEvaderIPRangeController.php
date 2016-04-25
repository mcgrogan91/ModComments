<?php
/**
 * Created by PhpStorm.
 * User: kmcgrogan
 * Date: 4/9/16
 * Time: 1:08 AM
 */

namespace ModTools\Http\Controllers\BanEvasion;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use JAAulde\IP\V4\Address;
use ModTools\BanEvasion\BanEvader;
use ModTools\BanEvasion\BanEvaderIPRange;
use ModTools\BanEvasion\BanEvaderProfile;
use ModTools\Http\Controllers\Controller;

class BanEvaderIPRangeController extends Controller
{
    public function index()
    {
        return response("Not supported", 501, array('Access-Control-Allow-Origin' => '*'));
    }

    public function store()
    {
        $ip = Input::get('account_id');

        $existingProfile = Input::get('existing_id');

        if (isset($existingProfile)) {
            $existing = BanEvaderProfile::where('profile_id', $existingProfile)->first();
            if ($existing) {
                $evader = $existing->ban_evader;
            } else {
                return response("Could not find existing profile.", 404);
            }
        } else {
            //We don't want to create a new blank profile if one already exists
            $range = BanEvaderIPRange::fromTagProRange($ip);
            $first = new Address($range['first_address']);
            $last = new Address($range['last_address']);

            $exists = BanEvaderIPRange::where('first_address', $first->get())
                ->where('last_address', $last->get())->first();

            if ($exists) {
                return response()->json($exists, 200);
            }
        }



        if (!isset($evader)) {
            $evader = BanEvader::create();
        }

        $range = new BanEvaderIPRange();
        $rangeIPs = BanEvaderIPRange::fromTagProRange($ip);
        $range->first_address = $rangeIPs['first_address'];
        $range->last_address = $rangeIPs['last_address'];
        $range->ban_evader_id = $evader->id;
        $range->save();

        Cache::forget('ip_list');
        
        return response()->json($range, 200);
    }

    public function show($id)
    {
        return response()->json(BanEvaderIPRange::find($id), 200);
    }

    public function update($id)
    {
        $response = response("Not Found.", 404);

        $range = BanEvaderIPRange::find($id);

        if ($range) {

            $ip = Input::get('ip');
            $account = Input::get('account_id');
            $rangeIPs = BanEvaderIPRange::fromTagProRange($ip);
            $range->first_address = $rangeIPs['first_address'];
            $range->last_address = $rangeIPs['last_address'];
            $range->ban_evader_id = $account;
            $range->save();

            $response = response()->json($range, 200, array('Access-Control-Allow-Origin' => '*'), JSON_PRETTY_PRINT);
        }

        Cache::forget('ip_list');
        
        return $response;
    }

    public function destroy($id)
    {
        BanEvaderIPRange::find($id)->delete();

        Cache::forget('ip_list');
        
        return response("OK", 200, array('Access-Control-Allow-Origin' => '*'));
    }
}