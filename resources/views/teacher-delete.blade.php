@extends('layouts.mainlayout')

@section('title', 'Students | Delete Teacher')

@section('content')

    <div class="mt-5">
        <h2 >Are you sure to delete data : {{$teacher->name}}</h2>

        <form style="display: inline-block" action="/teacher-destroy/{{$teacher->id}}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Delete</button>
        </form>
        <a href="/teachers" class="btn btn-primary">Cancel</a>
    </div>

@endsection