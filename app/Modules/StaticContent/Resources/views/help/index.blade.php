@extends('layouts.app')
@section('title', 'Help')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_static_content')
                    <a href="{{route('help.create')}}" class="btn btn-primary pull-right create-article">Create new article Help</a>
                @endpermission
                @include('help.table')
            </div>
        </div>
    </div>
@endsection
