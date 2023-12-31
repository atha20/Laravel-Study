@extends('layouts.mainlayout')

@section('title', 'Students | Delete Class')

@section('content')

    <div class="mt-5">
        <h2 >Are you sure to delete data : {{$class->name}}</h2>

        <form style="display: inline-block" action="/class-destroy/{{$class->id}}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Delete</button>
        </form>
        <a href="/class" class="btn btn-primary">Cancel</a>
    </div>

@endsection