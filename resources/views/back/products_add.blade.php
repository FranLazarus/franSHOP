@extends('back.layouts.app')

@section('link')
    <link href="{{ asset('css/products_form.css') }}" rel="stylesheet">
@endsection

@section('title','商品新增')

@section('content')
<main class="col-10 p-5" id="content">
    <h2>@yield('title')</h2>
    <form class="content" id="add_form" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="block">
            <div class="small-block col-5">
                <label class="small-title" for="category">主分類</label>
                <select class="form-control" name="category" id="category" onchange="findSubCategory(this.value);">
                    @foreach ($categories as $category)
                        <option label="{{ $category->name }}" value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="small-block col-5">
                <label class="small-title" for="sub_category">次分類</label>
                <select class="form-control" name="sub_category" id="sub_category" required>
                </select>
            </div>
        </div>
        <div class="block small-block col-7">
            <label class="small-title" for="product_name">商品名稱</label>
            <input class="form-control" name="product_name" id="product_name" type="text">
        </div>
        <div class="block block-flex col-10">
            <div class="small-block">
                <label class="small-title" for="price">定價</label>
                <input class="form-control inline-input" name="price" id="price" type="number" min="0" onkeyup="PositiveInteger('price',0)">
                <span class="">TWD</span>
            </div>
            <div class="small-block">                
                <label class="small-title" for="sale_price">售價</label>
                <input class="form-control inline-input" name="sale_price" id="sale_price" type="number" min="0" onkeyup="PositiveInteger('sale_price',0)">
                <span class="">TWD</span>
            </div>
            <div class="small-block">                
                <label class="small-title" for="pattern">花色</label>
                <select class="form-control inline-input" name="pattern" id="pattern" required>
                    @foreach ($patterns as $pattern)
                        <option value="{{ $pattern->id }}">  {{ $pattern->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="small-block">                
                <label class="small-title" for="size">尺寸</label>
                <select class="form-control inline-input" name="size" id="size" required>
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}">  {{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="block col-10">
            <label class="small-title" for="editor">商品介紹</label>
            <textarea name="description" id="editor" type="text"></textarea>
        </div>
        <div class="block">
            <label class="small-title">商品圖片</label>
            <input type="hidden" name="have_uploaded" value=''>
            <input name="file" id="file" style="display:none;" type="file" multiple>
            <span id="file_text">未選擇任何檔案</span>               
            <label class="small_btn">
                <label for="file" onclick="uploadFiles()">上傳</label>
            </label>
		</div>
        <div class="block">
            <label class="small-title" for="status">狀態</label>
            <span id="status">
                <input name="status" id="onshelf" type="radio" value="1">
                <label for="onshelf">上架中</label>
                <input name="status" id="offshelf" type="radio" value="0">
                <label for="offshelf">已下架</label>
            </span>
        </div>
        <div class="block">
            <input class="app-btn" type="submit" value="儲存">
        </div>
    </form>
</main>
@endsection

@section('script')

<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
<script>

    findSubCategory(1);
    function findSubCategory(category){
        document.getElementById('sub_category').innerHTML = '';
        $.ajax({
            url: '/findSubCategory',
            type:'get',
            cache: false,
            async: false,
            dataType: 'json',
            data: { 
                category:category
            },
            error: function(xhr) {
                //alert('xhr');
            },
            success: function(response) {
                let sub_category = response;    //使用get方法就無須再JSON.parse
                let html = "";
                for(var i=0;i<sub_category.length;i++){
                    html += "<option label="+sub_category[i]['name']+" value="+sub_category[i]['id']+">"+sub_category[i]['name']+"</option>";
                }
                document.getElementById('sub_category').innerHTML = html;
            }
        });
    }


    var myEditor;
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            // ckfinder: {
            //     uploadUrl: "",
            //     headers: {
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            //     }
            // }
        },{
            alignment: {
                options: [ 'right', 'right' ]
        }} )
        .then( editor => {
            console.log( editor );
            myEditor = editor;
        })
        .catch( error => {
            console.error( error );
        })


    function PositiveInteger(ele,index){
        //把小數點去掉
        document.getElementsByName(ele)[index].value = document.getElementsByName(ele)[index].value.replace(/\./g,'');
        //把前面的0去掉
        document.getElementsByName(ele)[index].value = Number(document.getElementsByName(ele)[index].value);
        var type="^([0-9]*)$"; 
        var re = new RegExp(type);
        if(document.getElementsByName(ele)[index].value.match(re)==null) { 
        　　alert("請輸入正整數!"); 
            document.getElementsByName(ele)[index].value="";
            document.getElementsByName(ele)[index].focus();
        }
    }


    //上傳檔案
    function uploadFiles(){
        var obj = document.getElementsByName('have_uploaded')[0];
        var file = document.getElementById('file').innerHTML;
        var file_text = document.getElementById('file_text');
        if (document.getElementsByName('file')[0].value==''){           
            alert('請選擇檔案!');
            return;           
        }else if(obj!=undefined && file_text!='未選擇任何檔案' && file_text!=''){           
            if(file_text.slice(-3)!='JPG' && file_text.slice(-3)!='jpg'){          
                alert('請上傳jpg檔！');           
            }else{       
                obj.value='ok';
                file_text.appendChild(document.createTextNode(file_text));
                alert("上傳成功！");
            }         
        }
    }


</script>
@endsection