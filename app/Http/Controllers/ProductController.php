<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\category;
use App\Http\Models\pattern;
use App\Http\Models\photo;
use App\Http\Models\product;
use App\Http\Models\size;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::paginate(3);
        $photos = photo::all();

        return view('back.products_list', [
            'products' => $products,
            'photos' => $photos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.products_add', [
            'categories' => category::where('father_id',0)->get(),
            'patterns' => pattern::all(),
            'sizes' => size::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('back.products_add', [
            'categories' => category::where('father_id',0)->get(),
            'patterns' => pattern::all(),
            'sizes' => size::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function uploadImage(Request $request)
    {
        return "HI，upload";
    }
}
