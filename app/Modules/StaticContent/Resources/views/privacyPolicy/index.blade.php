@extends('layouts.app')
@section('title', 'Privacy policy')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_static_content')
                    <a href="{{route('privacy-policy.create')}}" class="btn btn-primary pull-right create-article">Create new article Privacy policy</a>
                @endpermission
                @include('privacyPolicy.table')
            </div>
        </div>
    </div>
@endsection
