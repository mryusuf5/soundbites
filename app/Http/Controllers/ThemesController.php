<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\themes;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    public function change(Request $request)
    {
        themes::where('selected', 1)->update(['selected' => 0]);
        $theme = themes::where('id', $request->theme)->first();

        $theme->selected = 1;
        $theme->save();

        return redirect()->route('home');
    }
}
