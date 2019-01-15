@extends('layouts.app')
@section('title', 'Terms and conditions')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_static_content')
                    <a href="{{route('term.create')}}" class="btn btn-primary pull-right create-article">Create new article Terms and conditions</a>
                @endpermission
                @include('terms.table')
            </div>
        </div>
    </div>
@endsection
