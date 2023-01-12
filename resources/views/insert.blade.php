<!doctype html>
<html lang="en">
  <head>
    <title>Insert Product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <form action="{{url('/')}}/insert" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="name" name="name" class="form-control" id="name"  placeholder="Enter name">
          <span class="text-danger">
            @error('name')
                {{$message}}
            @enderror
          </span>
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="text" name="price" class="form-control" id="price" placeholder="enter price">
          <span class="text-danger">
            @error('price')
                {{$message}}
            @enderror
          </span>
        </div>
        <div class="form-group">
            <label>UPC</label>
            <input type="text" name="upc" class="form-control" id="upc" placeholder="enter upc">
            <span class="text-danger">
                @error('upc')
                    {{$message}}
                @enderror
              </span>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
            <span class="text-danger">
                @error('image')
                    {{$message}}
                @enderror
              </span>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </body>
</html>
