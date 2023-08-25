@extends('layouts.mainlayout')

@section('title', 'Deleted Students')

@section('content')

    <h1>Deleted Student Page</h1>

    <div class="my-5">
        <a href="/students" class="btn btn-primary">Back</a>
    </div>

    <div class="mt-5">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($student as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{$data->nis}}</td>
                        <td>
                            <a href="/student/{{$data->id}}/restore" class="btn btn-success">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{$student->links()}}
    </div>

@endsection