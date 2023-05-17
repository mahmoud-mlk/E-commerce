
<!DOCTYPE html>
<html>
  <head>
    <title>My E-commerce Website</title>
    <link rel="stylesheet" href="{{asset('assets/css/task1.css')}}">
  </head>
  <body style="background-color: rgb(96, 138, 186)">
    <img src="{{asset('assets/image/logo-mercedes-benz-png.png')}}" width="100px" height="100px" border="2px"><br>
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

    <main>
      <section class="products">
      
       
        @foreach ($array as $arr)
       
        <div class="product">
            <img src="{{asset('assets/'.$arr->image)}}" alt="Product 1" >
            <h3>{{$arr->name}}</h3>
            <p>{{$arr->price}} EG</p>
            
          </div>
        @endforeach
      
 
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

