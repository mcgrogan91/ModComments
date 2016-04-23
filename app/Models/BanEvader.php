<?php
namespace ModTools\BanEvasion;


use Illuminate\Database\Eloquent\Model;

class BanEvader extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function profiles()
    {
        return $this->hasMany('ModTools\BanEvasion\BanEvaderProfile');
    }

    public function ranges()
    {
        return $this->hasMany('ModTools\BanEvasion\BanEvaderIPRange');
    }
}