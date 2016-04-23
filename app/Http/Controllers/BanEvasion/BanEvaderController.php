<?php
namespace ModTools\Http\Controllers\BanEvasion;

use JAAulde\IP\V4\Address;
use ModTools\BanEvasion\BanEvader;
use ModTools\BanEvasion\BanEvaderIPRange;
use ModTools\BanEvasion\BanEvaderProfile;
use ModTools\Http\Controllers\Controller;

class BanEvaderController extends Controller
{

    public function findEvasionInformation($input)
    {
        if (str_contains($input, ".")) {
            return $this->findRanges($input);
        } else {
            return $this->findAccounts($input);
        }
    }
    public function findRanges($ip)
    {
        $range = BanEvaderIPRange::fromTagProRange($ip);
        $first = new Address($range['first_address']);
        $last = new Address($range['last_address']);

        $evaderIds = BanEvaderIPRange::where('first_address', '<=', $first->get())
            ->where('last_address', '>=', $first->get())
            ->where('first_address', '<=', $last->get())
            ->where('last_address', '>=', $last->get())->lists('ban_evader_id')->toArray();
        return response()->json($this->loadEvaders($evaderIds), 200);
    }

    public function findAccounts($id)
    {
        $account = BanEvaderProfile::where('profile_id', $id)->first();
        $evaderId = $account ? [$account->ban_evader_id] : [];
        return response()->json($this->loadEvaders($evaderId), 200);
    }

    private function loadEvaders($evaderIds)
    {
        if ($evaderIds instanceof Arrayable) {
            $evaderIds = [$evaderIds];
        }
        return BanEvader::whereIn('id', $evaderIds)->with(['profiles', 'ranges'])->get();
    }
}