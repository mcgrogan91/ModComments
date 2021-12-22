<?php
namespace ModTools\Http\Controllers\BanEvasion;

use Illuminate\Support\Facades\Cache;
use JAAulde\IP\V4\Address;
use ModTools\Models\BanEvasion\BanEvader;
use ModTools\Models\BanEvasion\BanEvaderIPRange;
use ModTools\Models\BanEvasion\BanEvaderProfile;
use ModTools\Http\Controllers\Controller;

class BanEvaderController extends Controller
{

    public function ipList()
    {
        $evaderIPs = null;
        $evaderIPs = Cache::rememberForever('ip_list', function() {
            error_log('cache miss');
            $ranges = BanEvaderIPRange::whereRaw('first_address = last_address')->get();
            $ips = [];
            foreach ($ranges as $range) {
                $ips[] = $range->tagpro;
            }
            return json_encode($ips);
        });

        header('Content-type: application/json', true);
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        return $evaderIPs;
    }
    
    public function getSuspiciousLists($ip)
    {
        $suspicious = [];
        if (str_contains($ip, ".")) {
            $ips = explode(".", rtrim($ip, '.'));
            if (count($ips) > 1) {
                
                $curIP = sprintf("%d.%d.", $ips[0], $ips[1]);
                $range = BanEvaderIPRange::fromTagProRange($curIP);
                $first = new Address($range['first_address']);
                $last = new Address($range['last_address']);
                
                $ranges = BanEvaderIPRange::where('first_address', '>=', $first->get())
                    ->where('last_address', '<=', $last->get())->get();
                
                if (count($ranges) > 0) {
                    $pattern = $this->buildRegex($ips);
                    foreach ($ranges as $range) {
                        $matches = [];
                        $is_match = preg_match($pattern, $range->tagpro, $matches);
                        $suspicious[count($matches)][] = $range->tagpro;
                    }
                    
                }
            }
        }
        return $suspicious;
    }
    
    private function buildRegex($array)
    {
        $regex = "//";
        switch(count($array)) {
            case 1:
                $regex = sprintf('/%d(\.?$)/', $array[0]);
                break;
            case 2:
                $regex = sprintf('/%d\.(%d\.)?/', $array[0], $array[1]);
                break;
            case 3:
                $regex = sprintf('/%d\.(%d\.(%d\.)?)?/', $array[0], $array[1], $array[2]);
                break;
            case 4:
                $regex = sprintf('/%d\.(%d\.(%d\.(%d$)?)?)?/', $array[0], $array[1], $array[2], $array[3]);
                break;
        }
        return $regex;
    }
    
    public function clearCache()
    {
        Cache::forget('ip_list');
    }
    
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