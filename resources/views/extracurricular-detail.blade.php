@extends('layouts.mainlayout')

@section('title', 'Extracurricular Detail')

@section('content')

<h2>Anda sedang melihat data detail dari ekskul {{$ekskul->name}}</h2>

<div class="my-5">
    <a href="/extracurricular" class="btn btn-primary">Back</a>
</div>

<div class="mt-5">
    <h4>List Peserta</h4>
    <ol>
        @foreach ($ekskul->students as $item)
            <li>{{$item->name}}</li>
        @endforeach
    </ol>
</div>

@endsection