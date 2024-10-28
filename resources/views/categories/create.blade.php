@extends('home')

@section('content')

<div class="card" style="width: 40%; margin:auto" >
    <div class="card-header">
        Add new category
    </div>

    <form action="{{ route('categories.store') }}" method="POST" style="width: 50%; margin:10px auto;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</div>

@endsection