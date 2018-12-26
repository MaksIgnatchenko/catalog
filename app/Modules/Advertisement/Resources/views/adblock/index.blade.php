@extends('layouts.app')
@section('title', 'Advertisement')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @permission('create_adblocks')
                    <a href="{{route('adblock.create')}}" class="btn btn-primary pull-right create-article">Create new adblock</a>
                @endpermission
                @include('adblock.table')
            </div>
        </div>
    </div>
@endsection
