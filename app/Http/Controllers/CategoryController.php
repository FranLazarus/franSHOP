<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\category;

class CategoryController extends Controller
{
    public function findSub(Request $request)
    {
        //dd($request);  //雖然還是沒有dd出甚麼
        $category = $request->get('category');
        $sub_category = category::where('father_id',$category)->get();
        return response()->json($sub_category);
    }
    
}
