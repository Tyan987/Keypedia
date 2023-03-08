<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UpdateCategoryController extends Controller
{

    public function index($id)
    {
        $category = Categories::where('id', $id)->first();
        $categories = Categories::all();
        return view('Category.updateCategory', ['categories' => $categories], ['category' => $category]);
    }

    public function updateCategory(Request $request, $id)
    {
        $categories = Categories::find($id);

        $rules = [
            "name" => 'required|min:5',
        ];

        $request->validate($rules);

        $file = $request->file('image');

        if($file != null){
            Storage::delete('public/'.$categories->image);
            $imageName = time().'_'.$file->getClientOriginalName();

            Storage::putFileAs('public/images/categories', $file, $imageName);
            $imagePath = 'images/categories/'.$imageName;
            $categories->image = $imagePath;
        }

        else{
            $categories->image = $categories->image;
        }

            $categories->name = $request->name != null ? $request->name: $categories->name;
            $categories->image = $request->image != null ? $imagePath: $categories->image;

            $categories->update();

            return redirect('/manageCategory');
    }
}
