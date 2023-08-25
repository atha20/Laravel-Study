@extends('layouts.mainlayout')

@section('title', 'Students')

@section('content')

    <h1>Student Page</h1>
    
    @if (Auth::user()->role_id != 3)
    <div class="my-5 d-flex justify-content-between">
        <a href="student-add" class="btn btn-primary">Add Data</a>
        <a href="student-deleted" class="btn btn-info">Show Deleted Data</a>
    </div>
    @endif
    {{-- <div class="my-5 d-flex justify-content-between">
        <a href="student-add" class="btn btn-primary">Add Data</a>
        <a href="student-deleted" class="btn btn-info">Show Deleted Data</a>
    </div> --}}

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

    <h3>Student List</h3>

    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Keyword">
                <button class="input-group-text btn btn-outline-dark">Search</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>NIS</th>
            <th>Class</th>
            @if (Auth::user()->role_id != 3)
            <th>Action</th>
            @endif
        </thead>
        <tbody>
            @foreach ($studentList as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->gender}}</td>
                <td>{{$data->nis}}</td>
                <td>{{$data->class->name}}</td>
                @if (Auth::user()->role_id != 3)
                <td>
                    {{-- @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                    @else
                    <a href="student/{{$data->id}}" class="btn btn-outline-secondary">Detail</a>
                    <a href="student-edit/{{$data->id}}" class="btn btn-outline-warning">Edit</a>
                    @endif --}}
                    
                    {{-- @if (Auth::user()->role_id != 3) --}}
                    <a href="student/{{$data->slug}}" class="btn btn-outline-secondary">Detail</a>
                    <a href="student-edit/{{$data->id}}" class="btn btn-outline-warning">Edit</a>
                    {{-- @endif --}}

                    @if (Auth::user()->role_id == 1)
                        <a href="student-delete/{{$data->id}}" class="btn btn-outline-danger">Delete</a>
                    @endif
                </td>
                @endif
            @endforeach
        </tbody>
    </table>

    <div class="my-5">
        {{$studentList->withQueryString()->links()}}
    </div>

    <x-alert message='This is student page' type='primary' />
    
@endsection
