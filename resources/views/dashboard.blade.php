<!DOCTYPE html>
<html>
  <head>
    <title>My E-commerce Website</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/task1.css')}}">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
  </head>
  <body style="background-color: rgb(96, 138, 186)">

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

    <main>
      <section class="products">

        <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>img</th>
            <th></th>
        </tr>


        @foreach ($array as $arr)
            <tr>
                <td>{{$arr->name}}</td>

                <td>{{$arr->price}} EG</td>

                <td><img width="100px" height="100px"  src="{{asset('assets/image/'.$arr->image)}}"></td>

                <td>

                <a href="Product/{{ $arr->id }}/edit" class="btn btn-primary">Edit</a>

                <a href="Product/delete/{{ $arr->id }}" class="btn btn-primary">Delete</a>

                </td>
            </tr>
        @endforeach
        </table>

      </section>
    </main>

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
  </body>
</html>
