<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AttachmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($id)
    {
        $attachment = Attachment::findOrFail($id);

        return $attachment;
    }

    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);

        $this->authorize('edit', $attachment);

        Storage::delete($attachment->path);

        $attachment->delete();
    }

    public function store(Request $request)
    {
        $request->validate([
            'attachment' => ['required', 'file', 'image', 'max:2048'],
            'checklist_id' => ['required', 'integer', 'exists:App\Checklist,id'],
        ]);

        $storedPath = Storage::putFile('public/attachments', $request->file('attachment'));

        $attachment = new Attachment();
        $attachment->checklist_id = $request->checklist_id;
        $attachment->name = $request->file('attachment')->getClientOriginalName();
        $attachment->path = $storedPath;
        $attachment->url = Storage::url($storedPath);
        $attachment->user_id = $request->user()->id;
        $attachment->save();

        return $attachment;
    }
}
