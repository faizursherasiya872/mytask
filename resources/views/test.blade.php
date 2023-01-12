<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    @extends('layouts.app')

    @section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            {{ __('You are logged in!') }}

    </div>
    @endsection
    <form action="{{url('/delete')}}" enctype="multipart/form-data" method="post">
        @csrf
        <h1 style="">Products</h1>
        <a href="{{url('/insert')}}" >Add Product</a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Check</th>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">UPC</th>
            <th scope="col">Status</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($product as $val)
            <tr>
                <td>
                    <input type="checkbox" name="ids[{{$val->id}}]" value="{{$val->id}}">
                </td>
                <td scope="row">{{$val->id}}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->price}}</td>
                <td>{{$val->upc}}</td>
                <td>{{$val->status}}</td>
                <td>
                    <img src="{{asset('img/'.$val->image)}}" width="100px" alt="image">
                </td>
                <td>
                    <a href="{{url('/view/edit/')}}/{{$val->id}}">
                    <button class="btn btn-dark">Edit</button>
                    </a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      <form action="{{url('/delete')}}" enctype="multipart/form-data" method="post">
        @csrf
      <input type="submit" class="btn btn-danger" value="Delete user">
    </form>
    </body>
</html>
