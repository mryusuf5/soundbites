<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\sounds;
use Illuminate\Http\Request;

class SoundsController extends Controller
{
    public function index(Request $request)
    {
        $categories = categories::latest()->get();

        if($request->categorie)
        {
            $sounds = sounds::where('category_id', $request->categorie)->get();

            return view('welcome', compact('categories', 'sounds'));
        }
        else
        {
            $sounds = sounds::latest()->get();

            return view('welcome', compact('categories', 'sounds'));
        }
    }

    public function create()
    {
        $categories = categories::latest()->get();

        return view('createSound', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required',
            'files' => 'required'
        ]);

        $files = $request->file('files');

        foreach($files as $file)
        {
            $name = str_replace(' ', '_', $file->getClientOriginalName());
            $originalName = explode('.', $file->getClientOriginalName());
            $file->move('sounds/', $name);

            $sound = new sounds();
            $sound->name = $originalName[0];
            $sound->category_id = $request->categorie;
            $sound->file_name = $name;
            $sound->save();
        }

        return redirect()->route('home')->with('success', 'Geluiden opgeslagen.');
    }

    public function destroy(Request $request)
    {
        sounds::destroy($request->sound);

        return redirect()->route('home')->with('success', 'Geluid verwijderd');
    }
}
