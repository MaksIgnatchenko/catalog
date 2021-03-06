@extends('layouts.app')
@section('title', 'Categories')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                <a href="{{route('category.create')}}" class="btn btn-primary pull-right create-article">Create new category</a>
                @include('category.table')
            </div>
        </div>
    </div>
@endsection