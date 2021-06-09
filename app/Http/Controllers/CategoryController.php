<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    /* 呈現分類樹
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //將類別撈出並轉成陣列(以str_id當key值)
        $categoryWithKey = array();
        $categories = category::orderby('category_order')->get()->toArray();
        foreach($categories as $category){
            $categoryWithKey[$category['str_id']] = $category;
        }

        //將各類別對應組織起來
        $categoryTree = array();
        foreach($categoryWithKey as $key => $category){

            $stridLength = strlen($category['str_id']);
            //去除尾兩碼可得到該類別的父層str_id
            $fatherStrid = substr($category['str_id'], 0, $stridLength - 2);
            
            if (isset($categoryWithKey[$fatherStrid])) {
                //將子項加入父項的['children']內
                $categoryWithKey[$fatherStrid]['children'][] = &$categoryWithKey[$key];
            }else{
                //無父項，直接加入$categoryTree[](不用&的話，'children'會加不進來。&是發揮傳址的功能嗎?)
                $categoryTree[] = &$categoryWithKey[$key];
            }

        }

        //將php陣列轉成json
        $json_string = json_encode($categoryTree,true);

        return view('back.categories', [
            'json_string' => $json_string
        ]);

    }
    
    /**
     * 儲存分類樹並整理結構(學了遞迴)
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
   {
       
        //檢查使用者是否有重設用以編str_id的字符
        //與其用ord、chr轉換，不如用陣列好寫，而且還可自定義字符
        if(isset($request->customChar)){    //檢查一下格式是否為'A','B','C','D'以免出事
            $char = explode(",",$request->customChar);
        }else{
            $char = ['A','B','C','D'];
        }
        $char_length = count($char);

        
        $json_data =  json_decode($request->nestable,true);
        //表category的category_order
        $order = 1;  
        $son_order = 1;
        //使用$char內第幾個字元?
        $c1 = 0;
        $c2 = 0;

        //重新整理階層的str_id與category_order
        foreach($json_data as $father){
            
            $order = $son_order;    //接從子層回來的order值，然後繼續編下去
            $father_id = (string)$father['id']; //不能直接用，要先string化
            
            if($c1<$char_length && $c2<$char_length){
                
                $str_f = (string)($char[$c1].$char[$c2]);   //父層分類的str_id
                DB::update("UPDATE categories SET str_id = ?,category_order = ? WHERE id = ? AND status = ?", [$str_f,$order,$father_id,1]);
                $order++;
                $c2++;
                // var_dump('father_id:'.$father_id.'    str_f: '.$str_f.'         order:'.$order.'         c1:'.$c1.'         c2:'.$c2);
                
            }else if($c1<$char_length && $c2>=$char_length){
                
                $c1++;
                $c2=0;
                $str_f = (string)($char[$c1].$char[$c2]);
                DB::update("UPDATE categories SET str_id = ?,category_order = ? WHERE id = ? AND status = ?", [$str_f,$order,$father_id,1]);
                $order++;
                $c2++;
                // var_dump('father_id:'.$father_id.'     str_f: '.$str_f.'         order:'.$order.'         c1:'.$c1.'         c2:'.$c2);
                
            }else if($c1>=$char_length){
                
                //如果字符真的不夠排，就把那一個分類先停用吧~
                DB::update("UPDATE categories SET status = ?,category_order = ? WHERE id = ?", [0,1000,$father_id]);
                $order++;
                
            }
            
            if(isset($father['children'])){
                $son_order = $this->category_decode($father,$str_f,$order,$char);
            }
            
        }
        return redirect('/categories');
       
   }
   
   
   //分類整理遞迴
   public function category_decode($obj,$str_id,$order,$char)
   {
       
       $char_length = count($char);
       $c3 = 0;
       $c4 = 0;

       foreach($obj['children'] AS $son){
           
           $son_id = (string)$son['id'];
           $son_id = substr($son_id, 2, -1);   //因為nestable會給children的id的值，前面加上='，後面加上'，故手動處理掉。
           if($son_id==''){                    //因為有的children如果還有children的話，nestable又不會給它加東西，所以經過上一行會變為空。
               $son_id = (string)$son['id'];
           }
           
           if($c3<$char_length && $c4<$char_length){
               
               $str_s = (string)($str_id.$char[$c3].$char[$c4]);   //子層分類的str_id
               DB::update("UPDATE categories SET str_id = ?,category_order = ? WHERE id = ? AND status = ?", [$str_s,$order,$son_id,1]);                    
               $order++;
               $c4++;
               // var_dump('son_id:  '.$son_id.'     str_s:  '.$str_s.'         order:'.$order.'         c3:'.$c3.'         c4:'.$c4);
               
           }else if($c3<$char_length && $c4>=$char_length){
               
               $c3++;
               $c4=0;
               $str_s = (string)($str_id.$char[$c3].$char[$c4]);
               DB::update("UPDATE categories SET str_id = ?,category_order = ? WHERE id = ? AND status = ?", [$str_s,$order,$son_id,1]);
               $order++;
               $c4++;
               // var_dump('son_id:  '.$son_id.'     str_s:  '.$str_s.'         order:'.$order.'         c3:'.$c3.'         c4:'.$c4);
               
           }else if($c3>=$char_length){
               DB::update("UPDATE categories SET status = ?,category_order = ? WHERE id = ?", [0,1000,$son_id]);
               $order++;
           }
           
           if(isset($son['children'])){
               $c1 = $this->category_decode($son,$str_s,$order,$char);
               $order = $c1;
           }
           
       }
       return $order;
       
   }

    /**
     * 新增分類
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * 修改分類名稱
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * 刪除分類
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * 依據father_id撈出子分類以回傳
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findSub(Request $request)
    {
        //dd($request);  //雖然還是沒有dd出甚麼
        $category = $request->get('category');
        $sub_category = category::where('father_id',$category)->get();
        //laravel的物件轉json
        return response()->json($sub_category);
    }

}