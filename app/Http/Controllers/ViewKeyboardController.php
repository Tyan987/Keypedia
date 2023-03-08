<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keyboards;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;

class ViewKeyboardController extends Controller
{
    public function viewKeyboard($id)
    {
        $keyboards = Keyboards::where('category_id', $id)->simplePaginate(8);
        $category = Categories::all();
        return view('Keyboard.viewKeyboard', ['keyboard' => $keyboards], ['categories' => $category]);
    }

    public function viewSearch(Request $request)
    {
        if($request->filter == 'Name'){
            $keyboards = Keyboards::where('name', 'LIKE', "%$request->search%")->simplePaginate(8);
        }
        else{
            $keyboards = Keyboards::where('price', 'LIKE', "$request->search")->simplePaginate(8);
        }

        $category = Categories::all();
        return view('Keyboard.viewKeyboard', ['keyboard' => $keyboards], ['categories' => $category]);
    }

    public function deleteKeyboard($id){
        $keyboards = Keyboards::find($id);

        Storage::delete('public/' .$keyboards);
        $keyboards->delete();

        return redirect()->back();
    }
}
