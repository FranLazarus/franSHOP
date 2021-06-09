@extends('back.layouts.app')

@section('link')
<link href="{{ asset('css/categories.css') }}" rel="stylesheet">
@endsection

@section('title','類別管理')
@section('content')
<main class="col-10 p-5" id="content">
    <h2>@yield('title')</h2>
    <form class="content" id="category" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
		{{-- <input type="text" name='json_string' value="{{ $json_string }}"> --}}
		<div class="cf nestable-lists">
			<textarea id="nestable-output" name="nestable"></textarea>
			<div>
				<menu id="nestable-menu">	
					<div class="sec opration">
						<button type="button" class="button" data-action="expand-all">展開</button>
						<button type="button" class="button" data-action="collapse-all">摺疊</button>
						{{-- <button type="button" data-action="serialize">獲取數據</button> --}}
						<input type="submit" class="button" value="儲存">
					</div>
					<div class="sec">
						<a class='button' onclick="addNewItem()">新增</a>
						<a class='button' onclick="changeItemName()">修改</a>
						<div class="t_head">分類名稱
							<input type="hidden" id="itemId" name="itemId" class="form-control">
							<input type="text" id="itemName" name="itemName" class="form-control col-4">
						</div>
					</div>
					<div class="" style="display: none;">
						<div class="t_head">設定編號字符</div>
						<input type="text" id="customChar" name="customChar" class="form-control">
						<span>('單'個半形英數字並以半形逗點區隔，組數不限)</span>
						<input type="submit" class="button" value="儲存">
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
						var childrenHtml = $("<li class='dd-item dd3-item' data-id='"+value.id+"'><div class='dd-handle dd3-handle'></div><div class='dd3-content'><span class='span-right'>"+value.str_id+" "+value.name+"&nbsp;&nbsp;<a class='edit-button' onclick=editItem('"+value.id+"','"+value.name+"')><i class='fa fa-pencil'></i></a>&nbsp;&nbsp;<a class='del-button' href={{ url('category_delete') }}/"+value.id+"><i class='fa fa-trash'></i></a></div></div></li>");
						childrenHtml.append(createNestable(value.children));
						tempHtml.append(childrenHtml);
					} else {
						tempHtml.append("<li class='dd-item dd3-item' data-id=='"+value.id+"'><div class='dd-handle dd3-handle'></div><div class='dd3-content'><span class='span-right'>"+value.str_id+" "+value.name+"&nbsp;&nbsp;<a class='edit-button' onclick=editItem('"+value.id+"','"+value.name+"')><i class='fa fa-pencil'></i></a>&nbsp;&nbsp;<a class='del-button' href={{ url('category_delete') }}/"+value.id+"><i class='fa fa-trash'></i></a></div></li>");
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

	function editItem(itemId,itemName){
			document.getElementById('itemId').value = itemId;
			document.getElementById('itemName').value = itemName;
		}

	function changeItemName(){
		var itemId = document.getElementById('itemId').value;
		var itemName = document.getElementById('itemName').value;

		$.ajax({
			url: 'categories/5',
			method:'get',
			cache: false,
			async: false,
			dataType: 'json',
			data: { 
				itemId:'25',
				itemName:'荷葉袖'
			},
			error: function(xhr) {
				alert(xhr);
			},
			success: function(response) {
				alert('succss');						
			}
		});

	}

	function addNewItem(){
		category.action = "{{ Route('categories.create') }}";
		document.getElementById('category').submit();
	}
</script>
@endsection