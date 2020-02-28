<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function checklist()
    {
        return $this->belongsTo('App\Checklist');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
