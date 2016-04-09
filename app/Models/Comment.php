<?php

namespace ModTools\Comments;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['profile_id', 'comment_text', 'mod_name'];

    public function profile()
    {
      return $this->belongsTo('ModTools\Comments\Profile');
    }
}
