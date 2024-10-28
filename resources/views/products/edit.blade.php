@extends('home')

@section('content')

<div class="card" style="width: 40%; margin:auto" >
    <div class="card-header">
        Edit product
    </div>

    <form action="{{ route('products.update' ,$product->id) }}" method="POST" style="width: 90%; margin:10px auto;">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" id="title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="Body" class="form-label">Price:</label>
            <input type="text" name="price" class="form-control"  value="{{ $product->price }}" id="Body" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="Body" class="form-label">Amount:</label>
            <input type="text" name="amount" class="form-control"  value="{{ $product->amount }}"id="Body" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categories:</label>
                @foreach ($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" name="categories_ids[]" id="category" type="checkbox" value="{{ $category->id }}" {{ in_array($product->id,$product->categories->pluck('id')->toArray()) ? 'checked' : '' }} id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $category->name }}
                        </label>
                    </div>
                    @endforeach
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Update</button>
    </form>
</div>




</div>

@endsection