@extends('layouts.mainlayout')

@section('title', 'Teachers')

@section('content')

    <h1>Teachers Page</h1>

    @if (Auth::user()->role_id == 1)
    <div class="my-5 d-flex justify-content-between">
        <a href="teacher-add" class="btn btn-primary">Add Data</a>
        <a href="teacher-deleted" class="btn btn-info">Show Deleted Data</a>
    </div>
    @endif

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

    <h3>Teachers List</h3>

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
                @if (Auth::user()->role_id == 1)
                <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($teacherList as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    @if (Auth::user()->role_id == 1)
                    <td>
                        <a href="teacher/{{$data->id}}" class="btn btn-outline-secondary">Detail</a>
                        <a href="teacher-edit/{{$data->id}}" class="btn btn-outline-warning">Edit</a>
                        <a href="teacher-delete/{{$data->id}}" class="btn btn-outline-danger">Delete</a>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-5">
        {{$teacherList->withQueryString()->links()}}
    </div>

@endsection
