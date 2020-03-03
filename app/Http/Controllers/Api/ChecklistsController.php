<?php

namespace App\Http\Controllers\Api;

use App\Checklist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ChecklistsController extends Controller
{
    public function index()
    {
        if (empty(Input::get('name'))) return [];

        $name = Input::get('name');
        return Checklist::select('id', 'name')
            ->where('name', 'LIKE', "%$name%")
            ->limit(10)->get();
    }
}
