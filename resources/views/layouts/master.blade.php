<!DOCTYPE html>
<html>
  <head>


    <title>My E-commerce Website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


    <link rel="stylesheet" href="{{asset('assets/css/task1.css')}}">

  </head>


  <body style="background-color: rgb(96, 138, 186)">



<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{asset('assets/image/'. $details['image'])}}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>


                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>
<div class="container">
{{-- print message --}}
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
    @endif
    @if(session('danger'))
        <div class="alert alert-danger">
          {{ session('danger') }}
        </div>
    @endif

</div>








  <div class="container links"style="margin-top:20px">
            <div class="row">

                {{-- اللوجو --}}
                    <div class="col-sm-8">
                        <img src="{{asset('assets/image/logo-mercedes-benz-png.png')}}"
                        width="100px" height="100px" border="2px">
                    </div>
                <!--menu -->
                @auth   {{-- if user login --}}
                    <div class="col-sm-4">
                    <div class="btn-group dropleft">

                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        menu
                    </button>

                    <div class="dropdown-menu">

                        @if(auth::user()->admin == 1)  {{-- if user is admin --}}
                        <a href="/dashboard">Dashboard</a><br>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bx bx-log-out"></i>logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>

                    </div>
                    </div>
                @endauth


                @guest    {{-- if user NOT login --}}
                    <a href="{{ route('login') }}">LOGIN</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest

            </div>
</div>

        {{-- البحث --}}
    <form action="{{route('search')}}" method="GET" class="search-form">
      @csrf
      @method('GET')
      <input type="search" id="search" name="searchKey" placeholder="Search...">
      <button type="submit" class="search-button"><b>بحث</b><i class="fa fa-search"></i></button>
    </form><br>

<?php
 $cats = Illuminate\Support\Facades\DB::select("select * from category");
?>
    <header>
      <nav>
        <ul>
          <li><a href="/">Home</a></li>
          @foreach ($cats as $cat)
          <li><a href="{{route('cat_page',$cat->id)}}">{{$cat->name}}</a></li>
          @endforeach
        </ul>
      </nav>
    </header>


 @yield('content')


    <footer>
        <hr>
        <center>
        <table  align="center" width="70%" cellpadding="7" cellspacing="0" height="150px">
            <tr >
              <td>
                <a href="#">Recent Change </a>
              </td>
              <td>
                  <a href="#">what links Here </a>
              </td>
              <td>
                <a href="#">Related change</a>
              </td>
              <td>
                  <a href="#">upload file</a>
              </td>
              <td>
                  <a href="#">Special page</a>
              </td>
            </tr>
            <tr >
              <td>
                  <a href="#">my Refrence</a>
              </td>
              <td>
                  <a href="#">Contact Us</a>
              </td>
              <td>
                  <a href="#">printable version</a>
              </td>
              <td>
                  <a href="#">paramter link</a>
              </td>
              <td>
                  <a href="#">privacy link</a>
              </td>
            </tr>
          </table>
        </center>
          <hr />
    </footer>
    @yield('scripts')
  </body>
</html>
