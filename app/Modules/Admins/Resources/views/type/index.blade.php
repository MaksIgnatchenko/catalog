@extends('layouts.app')
@section('title', 'Types')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_categories')
                    <a href="{{route('type.create')}}" class="btn btn-primary pull-right create-article">Create new type</a>
                @endpermission
                @include('type.table')
            </div>
        </div>
    </div>
@endsection
