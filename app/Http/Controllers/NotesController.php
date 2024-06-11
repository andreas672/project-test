<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\note;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


class NotesController extends Controller
{
    //
    public function index()
    {
        // $user = Auth::user();
        // $notes = $user->notes;
        $user = Auth::user();
        $notes = $user->notes()->latest()->paginate(3);
    
        return view('home', compact(['notes']));
        
    }

    public function create()
    {
        return view('crud.create');
    }
 
    public function save(Request $request)
    {

        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'text'        => 'required',
        ],
        [
            'title.required' => 'judul harus diisi',
            'description.required' => 'deskripsi tidak boleh kosong',
            'text.required' => 'Masukkan isi Note',

        ]);

        $note = new note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->date = NOW();
        $note->text = $request->text;
        $note->user_id = Auth::id();
        $note->save();

        return redirect()->route('home')->with('success', 'Note created successfully.');

    }

    public function show($id) 
    {
        $notes = note::findOrFail($id);
        return view('crud.show', compact('notes'));
    }

    public function edit($id)
    {
        $notes = note::findOrFail($id);
        return view('crud.edit', compact('notes'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'text'        => 'required',
        ],
        [
            'title.required' => 'judul harus diisi',
            'description.required' => 'deskripsi tidak boleh kosong',
            'text.required' => 'Masukkan isi note',

        ]);


        $notes          = note::findOrFail($id);
        $title          = $request->title;
        $description    = $request->description;
        $text           = $request->text;
 
        $notes->title       = $title;
        $notes->description = $description;
        $notes->text        = $text;
        $notes->date        = NOW();
        $data = $notes->save();
        if ($data) {
            session()->flash('success', 'Note Update Successfully');
            return redirect(route('home'));
        }
    }

    public function delete($id)
    {
        $notes = note::findOrFail($id)->delete();
        if ($notes) {
            session()->flash('success', 'Note Deleted Successfully');
            return redirect(route('home'));
        }
    }

}
