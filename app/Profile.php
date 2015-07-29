<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = ['tagpro_identifier'];

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }
}
