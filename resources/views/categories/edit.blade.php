@extends('home')

@section('content')

<div class="card" style="width: 40%; margin:auto" >
    <div class="card-header">
        Edit category
    </div>

    <form action="{{ route('categories.update',$category) }}" method="POST" style="width: 50%; margin:10px auto;">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name"  value="{{ $category->name }}" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>

@endsection