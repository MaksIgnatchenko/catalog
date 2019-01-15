@extends('layouts.app')
@section('title', 'Our Vision')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_static_content')
                    <a href="{{route('our-vision.create')}}" class="btn btn-primary pull-right create-article">Create new article Our Vision</a>
                @endpermission
                @include('ourVision.table')
            </div>
        </div>
    </div>
@endsection
