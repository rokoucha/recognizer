<?php

namespace App\Http\Controllers\Api;

use App\Checklist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistsController extends Controller
{
    private $searchLimit = 5;

    public function index(request $request)
    {
        $name = $request->input('name');
        if (empty($name)) {
            return [
                "data" => [],
            ];
        }

        return Checklist::select('id', 'name')
            ->where('name', 'LIKE', "%$name%")
            ->paginate($this->searchLimit)
            ->appends(['name' => $name]);
    }
}
