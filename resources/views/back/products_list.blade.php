@extends('back.layouts.app')

@section('link')
  <link href="{{ asset('css/products_list.css') }}" rel="stylesheet">
@endsection

@section('title','商品管理')
@section('content')
<main class="col-10 p-5 clearfix" id="content">
    <h2>@yield('title')</h2>
    <div class="pagination-block">
      {{ $products->links('back.layouts.pagination') }}
    </div>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col" width="7%">項次</th>
          <th scope="col" width="80px">縮圖</th>
          <th scope="col" width="38%">商品名稱</th>
          <th scope="col" width="10%">定價</th>
          <th scope="col" width="10%">售價</th>
          <th scope="col" width="10%">
            <a type="button" class="btn" href="{{ route('products.create') }}">
              <i class="fas fa-plus-square"></i>
            </a>
          </th>
          <th scope="col" width="10%">異動時間</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr onclick = location.href="{{ route('products.edit',$product->id) }}">
          <th scope="row">{{ $product->id }}</th>
          <td>
          @php
            $p = 1;
          @endphp
            @foreach ($photos as $photo)
              @if($photo->product_id == $product->id && $p==1)
                @php $p = 0; @endphp
                <div class="thumbnail" width="85px">
                  <img src={{ $photo->photo_path }} alt={{ $product->name }}>
                </div>
              @endif
            @endforeach
          </td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }}</td>
          <td>{{ $product->sale_price }}</td>
          <td>
            <button type="button" class="btn">              
              <i class="fas fa-times-circle"></i>
            </button>
            <a type="button" class="btn" href="{{ route('products.edit',$product->id) }}">
              <i class="fas fa-edit"></i>
            </a>
          </td>
          <td>{{ $product->timestamp }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</main>
@endsection