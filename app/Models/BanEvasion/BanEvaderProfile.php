<?php
namespace ModTools\Models\BanEvasion;


use Illuminate\Database\Eloquent\Model;

class BanEvaderProfile extends Model
{

    protected $hidden = [
        'created_at',
        'updated_at',
        'ban_evader_id'
    ];

    public function ban_evader()
    {
        return $this->belongsTo('ModTools\Models\BanEvasion\BanEvader');
    }
}