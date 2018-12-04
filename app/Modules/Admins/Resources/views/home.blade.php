@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Features in progress</h3>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
