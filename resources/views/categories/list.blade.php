@extends('home')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categories</h1>
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

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary">edit</a>
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
        <a href="{{ route('categories.create') }}" class="btn btn-primary" style="font-size: 18px">create new category</a>
    </div>
</div>

@endsection