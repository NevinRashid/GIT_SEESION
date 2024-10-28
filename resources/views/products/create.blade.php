@extends('home')

@section('content')

<div class="card" style="width: 40%; margin:auto" >
    <div class="card-header">
        Add new Product
    </div>

    <form action="{{ route('products.store') }}" method="POST" style="width: 90%; margin:10px auto;" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="Body" class="form-label">Price:</label>
            <input type="text" name="price" class="form-control" id="Body" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="Body" class="form-label">Amount:</label>
            <input type="text" name="amount" class="form-control" id="Body" aria-describedby="emailHelp">
        </div>
        
        <div class="mb-3">
            <label for="category" class="form-label">Categories:</label>
                @foreach ($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" name="categories_ids[]" id="category" type="checkbox" value="{{ $category->id }}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $category->name }}
                        </label>
                    </div>
                    @endforeach
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Save</button>
    </form>
</div>

@endsection