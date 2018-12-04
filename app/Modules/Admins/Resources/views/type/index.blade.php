@extends('layouts.app')
@section('title', 'Types')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                <a href="{{route('type.create')}}" class="btn btn-primary pull-right create-article">Create new type</a>
                @include('type.table')
            </div>
        </div>
    </div>
@endsection