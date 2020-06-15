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
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode (', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                    <td>
                                        @can('edit-users')
                                        <a href="{{ route ( 'admin.users.edit', $user->id ) }}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                        @endcan
                                        @can('delete-users')
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="float-left">
                                            @csrf
                                            {{ method_field ("DELETE") }}
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

{{--@section('css')--}}
{{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--@stop--}}

{{--@section('js')--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--@stop--}}
