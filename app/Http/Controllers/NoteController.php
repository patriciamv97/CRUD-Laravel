<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    // public function index($id=25){

    //     return view('note.index',compact('id'));
    // }

        public function index() : View {

            $notes = Note::all();
            return view ('note.index',compact('notes'));

        }

        public function create() {
            return view ('note.create');

        }

        public function store(NoteRequest $request) : RedirectResponse {
            // $note = new Note;

            // $note->title = $request->title;
            // $note->name = $request->description;

            // $note->save();
            // Note::create([
            //     'title'=> $request->title,
            //     'description'=> $request->description
            // ]);
            Note::create($request->all());
            return redirect()->route('note.index')->with('success','Note create');

        }

        // public function edit($note){
        //     $note = Note::find($note);
        //     return view();
        // }
 public function edit(Note $note): View{


            return view('note.edit',compact('note'));
        }

public function update(NoteRequest $request,Note $note): RedirectResponse{
    $note->update($request->all());
    // $note->title=$request->title;
    // $note->description=$request->description;
    // $note->save();
     return redirect()->route('note.index')->with('success','Note update');
}

public function show(Note $note) : View {
    return  view('note.show',compact('note'));
}

public function destroy(Note $note) :RedirectResponse {
    $note->delete();
    return redirect()->route('note.index')->with('danger','Note delete');
}

}
