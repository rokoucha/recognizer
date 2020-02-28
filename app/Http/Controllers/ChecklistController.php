<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::simplePaginate(10);

        return view('checklist/index', compact('checklists'));
    }

    public function show($id)
    {
        $checklist = Checklist::findOrFail($id);

        return view('checklist/show', compact('checklist'));
    }

    public function edit($id)
    {
        $checklist = Checklist::findOrFail($id);

        $auth = Auth::user();

        return view('checklist/edit', compact('checklist', 'auth'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'checks' => ['required'],
            'description' => ['required'],
        ]);

        $checklist = Checklist::findOrFail($id);
        $checklist->checks = $validated->checks;
        $checklist->description = $validated->description;
        $checklist->name = $validated->name;
        $checklist->save();

        return redirect("/checklist");
    }

    public function destroy($id)
    {
        $checklist = Checklist::findOrFail($id);
        $checklist->delete();

        return redirect("/checklist");
    }

    public function create()
    {
        $checklist = new Checklist();
        return view('checklist/create', compact('checklist'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'checks' => ['required'],
            'description' => ['required'],
        ]);

        $checklist = new Checklist();
        $checklist->checks = $validated->checks;
        $checklist->description = $validated->description;
        $checklist->name = $validated->name;
        $checklist->user_id = $request->user()->id;
        $checklist->save();

        return redirect("/checklist");
    }
}
