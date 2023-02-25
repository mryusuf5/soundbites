<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\sounds;

class CategoriesController extends Controller
{
    public function create()
    {
        return view("createCategory");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $categorie = new categories();
        $categorie->name = $request->name;
        $categorie->save();

        return redirect()->route('home')->with('success', 'Categorie opgeslagen!');
    }
}
