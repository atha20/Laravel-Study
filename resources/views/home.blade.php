@extends('layouts.mainlayout')

@section('title', 'Home')

@section('content')
    <h1>Homepage</h1>
    <h2>Welcome, {{Auth::user()->name}}. You are {{Auth::user()->role->name}}</h2>

    <x-alert message='This is home page' type='success' />

    {{-- @if ($role == 'admin')
        <a href="">To admin page</a>
    @elseif ($role == 'staff')
        <a href="">To storage page</a>
    @else
        <a href=""> To whatever page</a>
    @endif --}}

    {{-- @switch($role)
        @case($role == 'admin')
            <a href="">To admin page</a>
            @break

        @case($role == 'staff')
            <a href="">To storage page</a>
            @break

        @default
            <a href="">To whatever page</a>
            @break

    @endswitch --}}
@endsection
