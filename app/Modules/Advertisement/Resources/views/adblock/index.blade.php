@extends('layouts.app')
@section('title', 'Adblock')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                <a href="{{route('adblock.create')}}" class="btn btn-primary pull-right create-article">Create new adblock</a>
                @include('adblock.table')
            </div>
        </div>
    </div>
@endsection