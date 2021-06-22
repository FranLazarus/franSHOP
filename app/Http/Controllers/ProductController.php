<?php

namespace App\Http\Controllers;

use App\Http\Models\size;
use App\Http\Models\photo;
use App\Http\Models\stock;
use Illuminate\Support\Str;
use App\Http\Models\pattern;
use App\Http\Models\product;
use Illuminate\Http\Request;
use App\Http\Models\category;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::orderby('timestamp','asc')->paginate(3);
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

        $messages=[
            'required' => ':attribute 為必填欄位！',
            'integer' => ':attribute 必須為整數！'
        ];

        $validator = Validator::make($request->all(),[
            'sub_category' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'pattern_id' => 'required',
            'size_id' => 'required'
        ],$messages);
        // 'file' => 'required|mimes:jpg,png,jpeg|max:10000' 多個file時不能這樣驗證
        
        if($validator->fails()){
            // return response($validator->errors(),400);
            return redirect()
                   ->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $validatordata = $validator->validate();


        $product = new product;
        //產生product_id
        $product->id = Str::random(10);
        $product->category_id = $validatordata['sub_category'];
        $product->name = $validatordata['product_name'];
        $product->description = $validatordata['description'];
        $product->price = $validatordata['price'];
        $product->sale_price = $validatordata['sale_price'];
        //新增商品資料(因為id為其它資料表FK的關係，必須先insert product資料)
        $product->save();

        //為何這樣寫就不行?好像是因為不會自動幫字串加引號?
        // product::create([ 'id' => $product->id,
        //                   'category_id' => $request->sub_category, 
        //                   'name' => $request->product_name,
        //                   'price' => $request->price,
        //                   'sale_price' => $request->sale_price ]);
    
        
        //配合ID存入此商品的花色、尺寸資訊
        $pattern_id = $request->pattern_id;
        $size_id = $request->size_id;
        $patterns = array();
        foreach($pattern_id as $p_id){
            foreach($size_id as $s_id){
                $stock = new stock;
                $stock->id = $product->id.$p_id.$s_id;
                $stock->product_id = $product->id;
                $stock->pattern_id = $p_id;
                $stock->size_id = $s_id;
                $stock->save();
            }
            $patterns[]=$p_id;
        }
        

        $i=0;
        $f=0;
        foreach($request->file as $file){
            //file的順序似乎與點選順序無關，不可控
            //圖片上傳數量不可超過花色數量
            if($f <= count($patterns)){
                $newFileName = time().'-'.$file->getClientOriginalName();        
                // $file_path = base_path().'/public/photos/'.$newFileName;
                $file_path = '/photos/'.$newFileName;
                $file_size = $file->getSize();
                $file->move(public_path('photos'),$newFileName);
                
                //儲存上傳的檔案
                $photo = new photo();
                $photo->product_id = $product->id;
                $photo->pattern_id = $patterns[$i++];
                $photo->photo_path = $file_path;
                $photo->photo_size = $file_size;
                $photo->save();
                $f++;
            }
        }

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
