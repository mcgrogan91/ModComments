<?php
namespace ModTools\Http\Controllers\BanEvasion;

use Illuminate\Support\Facades\Input;
use ModTools\BanEvasion\BanEvader;
use ModTools\BanEvasion\BanEvaderProfile;
use ModTools\Http\Controllers\Controller;

class BanEvaderProfileController extends Controller
{

    public function index()
    {
        return response("Not supported", 501, array('Access-Control-Allow-Origin' => '*'));
    }

    public function store()
    {
        $account = Input::get('account_id');

        $existingProfile = Input::get('existing_id');

        $profile = BanEvaderProfile::where('profile_id', $account)->first();

        if (!$profile) {

            if (isset($existingProfile)) {
                $existing = BanEvaderProfile::where('profile_id', $existingProfile)->first();
                if ($existing) {
                    $evader = $existing->ban_evader;
                }
            }

            if (!isset($evader)) {
                $evader = BanEvader::create();
            }

            $profile = new BanEvaderProfile();
            $profile->profile_id = $account;
            $profile->ban_evader_id = $evader->id;
            $profile->save();
        }

        return response()->json($profile, 200, array('Access-Control-Allow-Origin' => '*'), JSON_PRETTY_PRINT);;
    }

    public function show($id)
    {
        return response()->json(BanEvaderProfile::find($id), 200, array('Access-Control-Allow-Origin' => '*'), JSON_PRETTY_PRINT);
    }

    public function update($id)
    {
        $response = response("Not Found.", 404);

        $profile = BanEvaderProfile::find($id);

        if ($profile) {
            $account = Input::get('account_id');
            $profile->profile_id = $account;
            $profile->save();

            $response = response()->json($profile, 200, array('Access-Control-Allow-Origin' => '*'), JSON_PRETTY_PRINT);
        }
        return $response;
    }

    public function destroy($id)
    {
        $profile = BanEvaderProfile::find($id);

        if ($profile) {
            $profile->delete();
        }

        return response("OK", 200, array('Access-Control-Allow-Origin' => '*'));
    }
}