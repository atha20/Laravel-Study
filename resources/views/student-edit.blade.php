@extends('layouts.mainlayout')

@section('title', 'Students | Edit Student')

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

        <form action="/student/{{$student->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$student->name}}" required>
            </div>

            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="{{$student->gender}}">
                        @if ($student->gender == 'P')
                            Perempuan
                        @else
                            Laki laki
                        @endif
                    </option>
                    @if ($student->gender == 'L')
                        <option value="P">Perempuan</option>
                    @else
                        <option value="L">Laki laki</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="nis">NIS</label>
                <input type="text" class="form-control" name="nis" id="nis" value="{{$student->nis}}" required>
            </div>

            <div class="mb-3">
                <label for="class">Class</label>
                <select name="class_id" id="class" class="form-control" required>
                    <option value="{{$student->class->id}}">{{$student->class->name}}</option>
                    @foreach ($class as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="photo">Photo</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Update</button>
                <a href="/students" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>
    
@endsection