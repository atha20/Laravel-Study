@extends('layouts.mainlayout')

@section('title', 'Class | Add New Teacher')

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

        <form action="teacher-store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" >
            </div>

            <div class="mb-3">
                <label for="photo">Photo</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
                <a href="/teachers" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>

@endsection