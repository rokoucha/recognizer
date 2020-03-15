<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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

        $this->authorize('edit', $checklist);

        return view('checklist/edit', compact('checklist'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'checks' => ['required', 'json'],
            'description' => ['required', 'string'],
        ]);

        $checklist = Checklist::findOrFail($id);

        $this->authorize('edit', $checklist);

        $checklist->checks = $request->checks;
        $checklist->description = $request->description;
        $checklist->name = $request->name;
        $checklist->save();

        return redirect("/checklist");
    }

    public function destroy($id)
    {
        $checklist = Checklist::findOrFail($id);

        $this->authorize('edit', $checklist);

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
        $request->validate([
            'name' => ['required', 'max:255'],
            'checks' => ['required', 'json'],
            'description' => ['required', 'string'],
        ]);

        $checklist = new Checklist();
        $checklist->checks = $request->checks;
        $checklist->description = $request->description;
        $checklist->name = $request->name;
        $checklist->user_id = $request->user()->id;
        $checklist->save();

        return redirect("/checklist");
    }
}
