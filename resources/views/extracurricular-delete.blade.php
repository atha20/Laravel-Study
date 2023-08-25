@extends('layouts.mainlayout')

@section('title', 'Students | Delete Extracurricular')

@section('content')

    <div class="mt-5">
        <h2 >Are you sure to delete data : {{$ekskul->name}}</h2>

        <form style="display: inline-block" action="/extracurricular-destroy/{{$ekskul->id}}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Delete</button>
        </form>
        <a href="/extracurricular" class="btn btn-primary">Cancel</a>
    </div>

@endsection