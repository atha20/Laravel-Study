@extends('layouts.mainlayout')

@section('title', 'Deleted Classroom')

@section('content')

    <h1>Deleted Class Page</h1>

    <div class="my-5">
        <a href="/class" class="btn btn-primary">Back</a>
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
                @foreach ($class as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>
                            <a href="/class/{{$data->id}}/restore" class="btn btn-success">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{$class->links()}}
    </div>

@endsection