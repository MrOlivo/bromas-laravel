<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Broma;

class PageController extends Controller
{
    public function bromas()
    {
        $bromas = Broma::with('user')->simplePaginate();
        return view('welcome', compact('bromas'));
    }
}
