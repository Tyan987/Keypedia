<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class HomeController extends Controller
{
    public function home()
    {
        $category = Categories::all();
        return view('home', ['categories' => $category]);
    }
}
