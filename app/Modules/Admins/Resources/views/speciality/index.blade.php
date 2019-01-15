@extends('layouts.app')
@section('title', 'Specialities')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_categories')
                    <a href="{{route('speciality.create')}}" class="btn btn-primary pull-right create-article">Create new speciality</a>
                @endpermission
                @include('speciality.table')
            </div>
        </div>
    </div>
@endsection
