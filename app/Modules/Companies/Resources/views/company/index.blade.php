@extends('layouts.app')
@section('title', 'Companies')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_companies')
                    <a href="{{route('company.create')}}" class="btn btn-primary pull-right create-article">Create new company</a>
                @endpermission
                @include('company.table')
            </div>
        </div>
    </div>
@endsection
