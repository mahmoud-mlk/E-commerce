
@extends('layouts.master')

@section('content')
    <main>
      <section class="products">
        @foreach ($array as $arr)
        <div class="product">
            <img src="{{asset('assets/image/'.$arr->image)}}" alt="Product 1" >
            <h3>{{$arr->name}}</h3>
            <p>{{$arr->price}} EG</p>
            <a href="{{ route('add.to.cart', $arr->id) }}"
            class="btn btn-warning btn-block text-center" role="button">Add to cart</a>
          </div>
        @endforeach
      </section>
    </main>

@endsection()
