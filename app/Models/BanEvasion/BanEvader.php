<?php
namespace ModTools\Models\BanEvasion;


use Illuminate\Database\Eloquent\Model;

class BanEvader extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function profiles()
    {
        return $this->hasMany('ModTools\Models\BanEvasion\BanEvaderProfile');
    }

    public function ranges()
    {
        return $this->hasMany('ModTools\Models\BanEvasion\BanEvaderIPRange');
    }
}