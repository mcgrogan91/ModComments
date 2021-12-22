<?php
/**
 * Created by PhpStorm.
 * User: kmcgrogan
 * Date: 4/8/16
 * Time: 10:18 PM
 */

namespace ModTools\Models\BanEvasion;


use Illuminate\Database\Eloquent\Model;
use JAAulde\IP\V4\Address;
use JAAulde\IP\V4\SubnetMask;

class BanEvaderIPRange extends Model
{

    protected $hidden = [
        'created_at',
        'updated_at',
        'ban_evader_id'
    ];

    protected $appends = [
        'tagpro'
    ];

    protected $table = 'ban_evader_ip_ranges';

    public function ban_evader()
    {
        return $this->belongsTo('ModTools\Models\BanEvasion\BanEvader');
    }

    public function getFirstAddressAttribute($value)
    {
        $address = new Address(intval($value));
        return $address->get(Address::FORMAT_DOTTED_NOTATION);
    }

    public function setFirstAddressAttribute($value)
    {
        $address = new Address($value);
        $this->attributes['first_address'] = $address->get();
    }

    public function getLastAddressAttribute($value)
    {
        $address = new Address(intval($value));
        return $address->get(Address::FORMAT_DOTTED_NOTATION);
    }

    public function setLastAddressAttribute($value)
    {
        $address = new Address($value);
        $this->attributes['last_address'] = $address->get();
    }

    public function getTagproAttribute()
    {
        return $this->toTagProRange($this->first_address, $this->last_address);
    }

    public static function toTagProRange($first, $last)
    {
        if ($first === $last) {
            return $first;
        }
        return preg_replace("/(\.0)+$/", '', $first) . '.';
    }

    public static function fromTagProRange($tpAddress)
    {
        $parts = explode('.', rtrim($tpAddress, '.'));

        return [
            'first_address' => implode('.', array_replace(['0','0','0','0'], $parts)),
            'last_address' => implode('.', array_replace(['255','255','255','255'], $parts))
        ];
    }
}