@extends('layouts.mainlayout')

@section('title', 'Deleted Teachers')

@section('content')

    <h1>Deleted Teacher Page</h1>

    <div class="my-5">
        <a href="/teachers" class="btn btn-primary">Back</a>
    </div>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacher as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>
                            <a href="/teacher/{{$data->id}}/restore" class="btn btn-success">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{$teacher->links()}}
    </div>

@endsection