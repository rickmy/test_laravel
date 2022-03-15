<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
  public function notes()
  {
    $notes = Note::paginate(4);
    return view('notes', compact('notes'));
  }

  public function notesDetail($id)
  {
    $note = Note::findOrFail($id);
    return view('notes.detailNote', compact('note'));
  }

  public function notesEdit($id)
  {
    $note = Note::findOrFail($id);
    return view('notes.editNote', compact('note'));
  }

  public function save(Request $request)
  {

    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'user' => 'required',
    ]);

    $newNote = new Note();
    $newNote->name = $request->name;
    $newNote->description = $request->description;
    $newNote->user = $request->user;

    $newNote->save();

    return back()->with('msg', 'Note agreement complete');
  }

  public function update($id, Request $request)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required'
    ]);

    $noteDB = Note::findOrFail($id);

    $noteDB->name = $request->name;
    $noteDB->description = $request->description;
    $noteDB->user = $request->user;

    $noteDB->save();

  return back()->with('msg','Note update complete!!.');
  }

  public function delete( $id)
  {
    $noteDB = Note::findOrFail($id);
    $noteDB->delete();

    return back()->with('msg','Note delete complete!!.');
  }

}
