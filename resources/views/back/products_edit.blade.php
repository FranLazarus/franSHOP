@extends('back.layouts.app')

@section('link')
    <link href="{{ asset('css/products_form.css') }}" rel="stylesheet">
@endsection

@section('title','商品修改')

@section('content')
<main class="col-10 p-5" id="content">
    <h2>@yield('title')</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="content" id="add_form" action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="block">
            <div class="small-block col-5">
                <label class="small-title" for="category">主分類</label>
                <select class="form-control" name="category" id="category" onchange="findSubCategory(this.value);">
                    @foreach ($categories as $category)
                        @if($category->id==$category_father)
                            <option label="{{ $category->name }}" value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option label="{{ $category->name }}" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="small-block col-5">
                <label class="small-title" for="sub_category">次分類</label>
                <select class="form-control" name="sub_category" id="sub_category" required>
                    @foreach ($sub_categories as $category)
                        @if($category->id==$category_id)
                            <option label="{{ $category->name }}" value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option label="{{ $category->name }}" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="block">
            <div class="small-block col-5">
                <label class="small-title" for="product_name">商品名稱</label>
                <input class="form-control" name="product_name" id="product_name" type="text" value={{ $product->name }}>
            </div>
            <div class="small-block col-3">
                <label class="small-title" for="price">定價</label>
                <input class="form-control inline-input" name="price" id="price" type="number" min="0" onkeyup="PositiveInteger('price',0)" value={{ $product->price }}>
                <span class="">TWD</span>
            </div>
            <div class="small-block col-3">                
                <label class="small-title" for="sale_price">售價</label>
                <input class="form-control inline-input" name="sale_price" id="sale_price" type="number" min="0" onkeyup="PositiveInteger('sale_price',0)" value={{ $product->sale_price }}>
                <span class="">TWD</span>
            </div>
        </div>
        <div class="block">
            <div class="small-block">                
                <label class="small-title" for="pattern">花色</label>
                <div class="block-flex" id="patterns">
                    @foreach ($patterns as $pattern)
                        @php $checked=''; @endphp
                        @foreach ($stock_patterns as $sp)
                            @if($pattern->id==$sp->pattern_id)
                            @php $checked='checked'; @endphp
                            @endif
                        @endforeach
                        <span class="check-span">
                            <input name="pattern_id[]" id="p{{ $pattern->id }}" type="checkbox" value="{{ $pattern->id }}" {{ $checked }}>
                            <label for="p{{ $pattern->id }}">{{ $pattern->name }}</label>
                        </span>
                    @endforeach
                </div>
            </div>
            <div class="small-block">                
                <label class="small-title" for="sizes">尺寸</label>
                <div class="block-flex" id="sizes">
                    @foreach ($sizes as $size)
                        @php $checked=''; @endphp
                        @foreach ($stock_sizes as $ss)
                            @if($size->id==$ss->size_id)
                            @php $checked='checked'; @endphp
                            @endif
                        @endforeach
                        <span class="check-span">
                            <input name="size_id[]" id="s{{ $size->id }}" type="checkbox" value="{{ $size->id }}" {{ $checked }}>
                            <label for="s{{ $size->id }}">{{ $size->name }}</label>
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="block col-10">
            <label class="small-title" for="editor">商品介紹</label>
            <textarea name="description" id="editor" type="text">{{ $product->description }}</textarea>
        </div>
        <div class="block" style="display: none;">
            <label class="small-title">商品圖片</label>

            <input type="hidden" name="have_uploaded" value=''>
            <input name="file[]" id="file" type="file" multiple>
            
            <span id="file_text" style="display:none;">未選擇任何檔案</span>               
            <label class="small_btn" style="display:none;" for="file" onclick="uploadFiles()">
            </label>
		</div>
        <div class="block col-10" style="text-align: right;">
            <input class="app-btn" type="submit" value="送出修改">
        </div>
    </form>
</main>
@endsection

@section('script')

<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
<script>

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

    //預防離開再回此頁時，能抓到原主分類，但次分類卻對不上。
    // let category = document.getElementById('category').value;
    // if(category==''){
    //     category = 1;
    // }
    // findSubCategory(category);


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