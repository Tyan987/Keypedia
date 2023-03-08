<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;

class ManageCategoryController extends Controller
{
    public function manageCategory()
    {
        $categories = Categories::all();
        return view('Category.manageCategory', ['categories' => $categories]);
    }

    public function deleteCategory($id){
        $categories = Categories::find($id);

        Storage::delete('public/' .$categories);
        $categories->delete();

        return redirect()->back();
    }
}
