@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User {{ $user->name }}</div>
                    <div class="card-body">

                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf
                            {{ method_field ('PUT') }}
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                    <label>{{$role->name}}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
@stop
