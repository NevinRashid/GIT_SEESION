@extends('home')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Orders</h1>
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
                                    <th>customer name</th>
                                    <th>product name</th>
                                    <th>price</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>{{ $order->product->price }}$</td>
                                        <td>
                                            <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-outline-primary">edit</a>
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
@endsection