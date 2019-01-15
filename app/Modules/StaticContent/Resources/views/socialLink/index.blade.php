@extends('layouts.app')
@section('title', 'Social links')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_static_content')
                    <a href="{{route('social-link.create')}}" class="btn btn-primary pull-right create-article">Create new social link</a>
                @endpermission
                @include('socialLink.table')
            </div>
        </div>
    </div>
@endsection

