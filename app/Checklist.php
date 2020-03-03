<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $attributes = [
        'checks' => '{"ordered":true,"children":[]}',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
