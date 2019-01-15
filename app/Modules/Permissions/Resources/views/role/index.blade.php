@extends('layouts.app')
@section('title', 'Roles')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_roles')
                    <a href="{{route('role.create')}}" class="btn btn-primary pull-right create-article">Create new role</a>
                @endpermission
                @include('role.table')
            </div>
        </div>
    </div>
@endsection
