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
        // $notes = note::orderBy('id', 'desc')->get();
        // $notes = $user->notes;
        
        // $user = Auth::user();
        // $notes = $user ? $user->notes : NULL;
        // $total = $notes ? $notes->count() : 0;
        // return view('home', compact(['notes', 'total']));
        
        
        $user = Auth::user();
        
        // Memeriksa apakah pengguna telah login
        if ($user) {
            // Jika pengguna telah login, ambil catatan (notes) milik pengguna tersebut
            $notes = $user->notes;
            
            // Kirim data catatan (notes) ke view
            $total = note::count();
            return view('home', compact(['notes', 'total']));
        } else {
            // Jika pengguna belum login, kembalikan ke halaman login
            return redirect()->route('home');
        }

    }

    public function create()
    {
        return view('create');
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
            'text.required' => 'Masukkan isi Memo',

        ]);

        $note = new note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->date = NOW();
        $note->text = $request->text;
        $note->user_id = Auth::id(); // Set user_id to the currently logged-in user's ID
        $note->save();

        return redirect()->route('home')->with('success', 'Note created successfully.');

        // $data = note::create([
        //     'title'       => $request->title,
        //     'description' => $request->description,
        //     'date'        => NOW(),
        //     'text'        => $request->text,
        //     'user_id'     => $request->Auth::id()
        // ]);

        // // $data = note::create($validation);
        // if ($data) {
        //     session()->flash('success', 'Memo Add Successfully');
        //     return redirect(route('home'));
        // } else {
        //     session()->flash('error', 'Some problem occure');
        //     return redirect(route('create'));
        // }
    }

    public function show($id) 
    {
        $notes = note::findOrFail($id);
        return view('show', compact('notes'));
    }

    public function edit($id)
    {
        $notes = note::findOrFail($id);
        return view('edit', compact('notes'));
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
            'text.required' => 'Masukkan isi Memo',

        ]);


        $notes          = note::findOrFail($id);
        $title          = $request->title;
        $description    = $request->description;
        $text           = $request->text;
 
        $notes->title       = $title;
        $notes->description = $description;
        $notes->text        = $text;
        $notes->date        = NOW();
        // $notes->user_id = Auth::id();
        $data = $notes->save();
        if ($data) {
            session()->flash('success', 'Memo Update Successfully');
            return redirect(route('home'));
        }
    }

    public function delete($id)
    {
        $notes = note::findOrFail($id)->delete();
        if ($notes) {
            session()->flash('success', 'Memo Deleted Successfully');
            return redirect(route('home'));
        }
    }

}
