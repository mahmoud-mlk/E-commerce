<!DOCTYPE html>
<html>
 <head>
    <title>My E-commerce Website</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/task1.css')}}">
  </head>


<body>



  <div class="container links"style="margin-top:20px">
            <div class="row">

                {{-- اللوجو --}}
                    <div class="col-sm-8">
                        <img src="{{asset('assets/image/logo-mercedes-benz-png.png')}}"
                        width="100px" height="100px" border="2px">
                    </div>
                <!--menu -->

                    <div class="col-sm-4">
                    <div class="btn-group dropleft">

                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        menu
                    </button>

                    <div class="dropdown-menu">

                        <a href="/">website</a><br>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bx bx-log-out"></i>logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>

                    </div>
                    </div>


            </div>
</div>




    <header>
      <nav>
        <ul>
          <li><a href="/dashboard">product</a></li>
          <li><a href="/Product/create">Add product</a></li>
           <li><a href="/Category">category</a></li>
          <li><a href="/Category/create">Add category</a></li>
        </ul>
      </nav>
    </header>
<br><br>

<form action="{{route('Product.store')}}" method="POST" enctype="multipart/form-data">

    {{csrf_field()}}         {{-- => for authentaction --}}

<div class="product-form">
    <div class="form-field">
      <label for="name">Product Name:</label>
      <input type="text" id="name" name="name" value="" required>
    </div>

    <div class="form-field">
      <label for="price">Price:</label>
      <input type="number" id="price" name="price" min="0.01" value="" step="0.01" required>
    </div>


   <div class="form-field" style="margin-right:50px">
      <label for="image">Product Image:</label>
      <input type="file" id="image" name="image"value="" accept="image/*" required>
    </div>

    <div class="form-field">
      <label for="sales">Sales:</label>
      <input type="number" id="sales" name="sales" value="" min="0" required>
    </div>

    <div class="form-field">
      <label for="offer">Offer:</label>
      <input type="checkbox" id="offer" name="offer">
    </div>

    <div class="form-field">
      <label for="origin">Product Origin:</label>
      <input type="text" required id="origin" value="" name="origin">
    </div>

      <div class="form-field">
      <label for="">Category:</label>
      <select name="cat_id" required>
      @foreach ($category as $cate )
        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
      @endforeach

      </select>
    </div>

    <div class="form-field">
      <label for="">supply:</label>
      <select name="supply_id" required>
      @foreach ($supplys as $supply )
        <option value="{{ $supply->id }}">{{ $supply->name }}</option>
      @endforeach

      </select>
    </div>

    </div>


    <button type="submit" class="submit-button">Add Product</button>
  </form>

</body>
  </html>
