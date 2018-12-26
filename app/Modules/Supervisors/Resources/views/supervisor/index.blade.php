@extends('layouts.app')
@section('title', 'Supervisors')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_supervisors')
                    <a href="{{route('supervisor.create')}}" class="btn btn-primary pull-right create-article">Create new supervisor</a>
                @endpermission
                @include('supervisor.table')
            </div>
        </div>
    </div>
@endsection
