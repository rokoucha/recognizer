<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Checklist;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::all();

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

        return view('checklist/edit', compact('checklist'));
    }

    public function update(Request $request, $id)
    {
        $checklist = Checklist::findOrFail($id);
        $checklist->checks = $request->checks;
        $checklist->description = $request->description;
        $checklist->name = $request->name;
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
        $checklist = new Checklist();
        $checklist->checks = $request->checks;
        $checklist->description = $request->description;
        $checklist->name = $request->name;
        $checklist->save();

        return redirect("/checklist");
    }
}
