@extends('layouts.mainlayout')

@section('title', 'Classroom')

@section('content')

    <h1>Class Page</h1>
    
    @if (Auth::user()->role_id == 1)
    <div class="my-5 d-flex justify-content-between">
        <a href="class-add" class="btn btn-primary">Add Data</a>
        <a href="class-deleted" class="btn btn-info">Show Deleted Data</a>
    </div>
    @endif

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    
    <h3>Class List</h3>

    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Keyword">
                <button class="input-group-text btn btn-outline-dark">Search</button>
            </div>
        </form>
    </div>

    <table class = "table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Homeroom Teacher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classList as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->homeroomTeacher->name}}</td>
                    <td>
                        <a href="class-detail/{{$data->id}}" class="btn btn-outline-secondary">Detail</a>
                        @if (Auth::user()->role_id == 1)
                        <a href="class-edit/{{$data->id}}" class="btn btn-outline-warning">Edit</a>
                        <a href="class-delete/{{$data->id}}" class="btn btn-outline-danger">Delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-5">
        {{$classList->withQueryString()->links()}}
    </div>

@endsection
