@extends('layouts.mainlayout')

@section('title', 'Teacher Detail')

@section('content')

    <h2>Anda sedang melihat data detail dari teacher {{$teacher->name}}</h2>

    <div class="my-5">
        <a href="/teachers" class="btn btn-primary">Back</a>
    </div>

    <div class="my-3 d-flex justify-content-center">
        @if ($teacher->image != '')
            <img src="{{asset('storage/photo/'.$teacher->image)}}" alt="" width="200px">
        @else
            <img src="{{asset('images/Default_pfp.svg.png')}}" alt="" width="200px">
        @endif
    </div>

    <div class="mt-5">
        <h3>Class : 
            @if ($teacher->class)
                {{$teacher->class->name}}
            @else
                -
            @endif
        </h3>
    </div>

    <div class="mt-5">
        @if ($teacher->class)
        <h4>List Student</h4>
        <ol>
            @foreach ($teacher->class->students as $item)
                <li>{{$item->name}}</li>
            @endforeach
        </ol>
        @endif
    </div>

@endsection