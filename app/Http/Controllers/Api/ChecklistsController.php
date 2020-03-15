<?php

namespace App\Http\Controllers\Api;

use App\Checklist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistsController extends Controller
{
    private $searchLimit = 10;

    public function index(request $request)
    {
        $name = $request->input('name');
        if (empty($name)) {
            return [];
        }

        return Checklist::select('id', 'name')
            ->where('name', 'LIKE', "%$name%")
            ->limit($this->searchLimit)->get();
    }
}
