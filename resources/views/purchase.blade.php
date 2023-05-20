@extends('layouts.master')

@section('content')
    <main>
      <section class="products">
  <form action="{{route('checkout')}}" method="POST" enctype="multipart/form-data">

    {{csrf_field()}}         {{-- => for authentaction --}}

<div class="product-form">
    <div class="form-field">
      <label for="adress">Adress:</label>
      <input type="text" id="adress" name="adress" value="" required>
    </div>

    <div class="form-field">
      <label for="phone">phone:</label>
      <input type="number" id="phone" name="phone" min="0.01" value="" step="0.01" required>
    </div>

    </div>

     <button type="submit" class="submit-button">Add Product</button>

    </form>
      </section>
    </main>
@endsection()
