@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')

    <h1>User Page</h1>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

    <h3>User List</h3>

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
            <th>Email</th>
            <th>Role</th>
            {{-- <th>Action</th> --}}
        </thead>
        <tbody>
            @foreach ($userList as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>
                    <a href="user-edit/{{$data->id}}" class="btn btn-outline-dark col-4 ">{{$data->role->name}}</a>
                </td>
                {{-- <td>
                    <a href="" class="btn btn-outline-danger">Delete</a>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <div class="my-5">
        {{$studentList->withQueryString()->links()}}
    </div> --}}
    
@endsection
