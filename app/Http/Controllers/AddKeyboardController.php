<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\keyboards;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;

class AddKeyboardController extends Controller
{
    public function index()
    {
        $category = Categories::all();
        return view('Keyboard.addKeyboard', ['categories' => $category]);
    }

    public function addKeyboard(Request $request)
    {
        $rules = [
            "name" => 'required|min:5|unique:keyboards',
            "price" => 'required|integer|min:30',
            "description" => 'required|min:20',
            "image" => 'required',
            "category" => 'required',
        ];

        $request->validate($rules);

        $file = $request->file('image');

        $imageName = time().'_'.$file->getClientOriginalName();

        Storage::putFileAs('public/images/keyboards', $file, $imageName);
        $imagePath = 'images/keyboards/'.$imageName;

        $keyboard = new Keyboards;
        $keyboard->name = $request->name;
        $keyboard->price = $request->price;
        $keyboard->description = $request->description;
        $keyboard->image = $imagePath;
        $keyboard->category_id = $request->category;;

        $keyboard->save();
        return redirect('/');
    }
}
