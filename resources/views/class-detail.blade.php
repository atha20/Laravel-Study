@extends('layouts.mainlayout')

@section('title', 'Class Detail')

@section('content')

    <h2>Anda sedang melihat data detail dari kelas {{$class->name}}</h2>

    <div class="my-5">
        <a href="/class" class="btn btn-primary">Back</a>
    </div>

    <div class="mt-5">
        <h3>Homeroom Teacher : {{$class->homeroomTeacher->name}}</h3>
    </div>

    <div class="mt-4">
        <h4>List Student</h4>
        <ol>
            @foreach ($class->students as $item)
                <li>{{$item->name}}</li>
            @endforeach
        </ol>
    </div>

@endsection