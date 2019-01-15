@extends('layouts.app')
@section('title', 'Who we are')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_static_content')
                    <a href="{{route('who-we-are.create')}}" class="btn btn-primary pull-right create-article">Create new article Who we are</a>
                @endpermission
                @include('whoWeAre.table')
            </div>
        </div>
    </div>
@endsection
