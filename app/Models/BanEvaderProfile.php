<?php
namespace ModTools\BanEvasion;


use Illuminate\Database\Eloquent\Model;

class BanEvaderProfile extends Model
{

    public function ban_evader()
    {
        return $this->belongsTo('ModTools\BanEvasion\BanEvader');
    }
}