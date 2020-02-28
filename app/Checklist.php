<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    public function attachments()
    {
        return $this->hasMany('App\Attachment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
