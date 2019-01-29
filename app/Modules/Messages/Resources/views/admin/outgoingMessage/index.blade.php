@extends('layouts.app')
@section('title', 'Messages')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @include('admin.outgoingMessage.table')
            </div>
        </div>
    </div>
@endsection

