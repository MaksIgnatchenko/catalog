@extends('layouts.app')
@section('title', 'Types')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @include('type.table')
            </div>
        </div>
    </div>
@endsection