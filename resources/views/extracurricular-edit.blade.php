@extends('layouts.mainlayout')

@section('title', 'Students | Edit Extracurricular')

@section('content')

    <div class="mt-5 col-8 m-auto">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/extracurricular/{{$ekskul->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$ekskul->name}}" required>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Update</button>
                <a href="/extracurricular" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>
    
@endsection