@extends('home')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Products</h1>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>amount</th>
                                    <th>categories</th>
                                    <th>orderd by</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}$</td>
                                        <td>{{ $product->amount }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($product->categories as $category)
                                                    <li>
                                                        {{ $category->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach ($orders as $order)
                                                    
                                                    @if ($order->product->id == $product->id)
                                                        <li>
                                                        {{ $product->order->user->name }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>
                                        
                                        <td>
                                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary">edit</a>
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="{{ route('products.create') }}" class="btn btn-primary" style="font-size: 18px">Add new product</a>
    </div>
</div>

@endsection