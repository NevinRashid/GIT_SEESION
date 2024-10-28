@extends('home')

@section('content')

<div class="card" style="width: 40%; margin:auto" >
    <div class="card-header">
        Edit order
    </div>

    <form action="{{ route('orders.update',$order) }}" method="POST" style="width: 50%; margin:10px auto;">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Product:</label>
            <select class="form-select" name="product_id" aria-label="Default select example">
                @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ $product->id == $order->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="user_id" value="{{ $order->user_id }}">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>

@endsection