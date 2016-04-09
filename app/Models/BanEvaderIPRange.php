<?php
/**
 * Created by PhpStorm.
 * User: kmcgrogan
 * Date: 4/8/16
 * Time: 10:18 PM
 */

namespace ModTools\BanEvasion;


use Illuminate\Database\Eloquent\Model;

class BanEvaderIPRange extends Model
{

    protected $table = 'ban_evader_ip_ranges';

    public function ban_evader()
    {
        return $this->belongsTo('ModTools\BanEvasion\BanEvader');
    }
}