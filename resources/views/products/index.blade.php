@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="center">
                <h2 class="card-header"> User List </h2>
            </div>
            <br>
           
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('signout') }}"> Logout</a>
            </div>

            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create Account</a>
            </div>

        </div>
    </div>
   <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>I.D:</th>
            <th>FirstName:</th>
            <th>LastName:</th>
            <th>Email:</th>
            <th>Phone #:</th>
            <th width="280px">Action:</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->lastname }}</td>
            <td>{{ $product->email }}</td>
            <td>{{ $product->number }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      
    </table>
  
    {{-- {!! $products->links() !!} --}}
      
@endsection