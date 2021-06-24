@extends('back.layouts.app')

@section('link')
<link href="{{ asset('css/categories.css') }}" rel="stylesheet">
@endsection

@section('title','類別管理')
@section('content')
<main class="col-10 p-5" id="content">
    <h2>@yield('title')</h2>
    <form id="category" action="{{ route('categories.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
		{{-- <input type="text" name='json_string' value="{{ $json_string }}"> --}}
		<div class="cf nestable-lists">
			<textarea id="nestable-output" name="nestable"></textarea>
			<div>
				<menu id="nestable-menu">	
					<div class="operation1">
						<button class="app-btn" data-action="expand-all">展開</button>
						<button class="app-btn" data-action="collapse-all">摺疊</button>
						{{-- <button type="button" data-action="serialize">獲取數據</button> --}}
						<input type="submit" class="app-btn" value="儲存">
					</div>
					<div class="operation2">
						<div class="block-flex">
							<div>
								<span class="small-title">分類名稱</span>
								<input type="hidden" id="itemId" name="itemId" class="form-control">
								<input type="text" id="itemName" name="itemName" class="form-control inline-input">
							</div>
							
								<a class="app-btn" id="addNewItem" onclick="addNewItem()">新增</a>
								<button class="app-btn" onclick="changeItemName()">修改</button>
							
						</div>
					</div>
					<div class="" style="display: none;">
						<div class="">設定編號字符</div>
						<input type="text" id="customChar" name="customChar" class="form-control">
						<span>('單'個半形英數字並以半形逗點區隔，組數不限)</span>
						<input class="app-btn" type="submit" value="儲存">
					</div>
				</menu>
			</div>
			<div class="dd" id="nestable"></div>
		</div>
	</form>
</main>
@endsection

@section('script')
<script src="{{asset('/js/app.js')}}"></script>
<script>
	$(document).ready(function() {

		var nestableData = {!! $json_string !!};
		var nestableBody = $('#nestable');
		var createNestable = function(nestableData) {
			if (nestableData.length > 0) {
				var tempHtml = $('<ol class="dd-list">');
				nestableData.forEach(function(value, index, array) {
					if (value.children) {
						var childrenHtml = $("<li class='dd-item dd3-item' data-id='"+value.id+"'><div class='dd-handle dd3-handle'></div><div class='dd3-content'><span class='span-right'>"+value.str_id+" "+value.name+"&nbsp;&nbsp;<a class='edit-button' onclick=editItem('"+value.id+"','"+value.name+"')><i class='fas fa-edit'></i></a>&nbsp;&nbsp;<a class='del-button' href={{ url('categories/destroy') }}/"+value.id+"><i class='fas fa-trash'></i></a></span></div></li>");
						childrenHtml.append(createNestable(value.children));
						tempHtml.append(childrenHtml);
					} else {
						tempHtml.append("<li class='dd-item dd3-item' data-id='"+value.id+"'><div class='dd-handle dd3-handle'></div><div class='dd3-content'><span class='span-right'>"+value.str_id+" "+value.name+"&nbsp;&nbsp;<a class='edit-button' onclick=editItem('"+value.id+"','"+value.name+"')><i class='fas fa-edit'></i></a>&nbsp;&nbsp;<a class='del-button' href={{ url('categories/destroy') }}/"+value.id+"><i class='fas fa-trash'></i></a></span></div></li>");
					}
				});
				tempHtml.append('</ol>');
			}
			return tempHtml;
		}

		nestableBody.append(createNestable(nestableData)).nestable({
			group : 1
		});

		var updateOutput = function(e) {
			var list = e.length ? e : $(e.target), output = list.data('output');
			if (window.JSON) {
				output.val(window.JSON.stringify(list.nestable('serialize')));
			} else {
				output.val('JSON browser support required for this demo.');
			}
		};

		//activate Nestable for list 1
		$('#nestable').nestable({
			group : 1
		}).on('change', updateOutput);

		//output initial serialised data
		updateOutput($('#nestable').data('output', $('#nestable-output')));

		$('#nestable-menu').on('click', function(e) {
			var target = $(e.target), action = target.data('action');
			if (action === 'expand-all') {
				$('.dd').nestable('expandAll');
			}
			if (action === 'collapse-all') {
				$('.dd').nestable('collapseAll');
			}
			if (action === 'serialize') {
				alert(JSON.stringify($('#nestable1').nestable('serialize')));
			}
		});

	});

	function addNewItem(){
		let itemName = document.getElementById('itemName').value;
        $.ajax({
            url: '/categories/store',
            type:'get',
            cache: false,
            async: false,
            dataType: 'json',
            data: { 
                name:itemName
            },
            error: function(xhr) {
                //alert('xhr');
            },
            success: function(response) {
				//應該要先設法到categories.save，str_id、father_id、order才會及時校正
				window.location.href = "{{URL::to('/categories')}}";
            }
        });
    }

	function editItem(itemId,itemName){
		document.getElementById('itemId').value = itemId;
		document.getElementById('itemName').value = itemName;
	}

	function changeItemName(){
		let itemId = document.getElementById('itemId').value;
		let itemName = document.getElementById('itemName').value;
		$.ajax({
			url: 'categories/update',
			method:'get',
			cache: false,
			async: false,
			dataType: 'json',
			data: { 
				id:itemId,
				name:itemName
			},
			error: function(xhr) {
				// alert(xhr);
			},
			success: function(response) {
				window.location.href = "{{URL::to('/categories')}}";		
			}
		});
	}

</script>
@endsection