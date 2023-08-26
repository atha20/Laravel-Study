@extends('layouts.mainlayout')

@section('title', 'Users | Edit Role')

@section('content')

    <div class="mt-5 col-8 m-auto">

        <form action="/user/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="role">Role</label>
                <select name="role_id" id="role" class="form-control" required>
                    <option value="{{$user->role->id}}">{{$user->role->name}}</option>
                    @foreach ($role as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Update</button>
                <a href="/users" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>
    
@endsection