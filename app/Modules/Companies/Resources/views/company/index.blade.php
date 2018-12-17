@extends('layouts.app')
@section('title', 'Companies')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @include('company.table')
            </div>
        </div>
    </div>
@endsection
