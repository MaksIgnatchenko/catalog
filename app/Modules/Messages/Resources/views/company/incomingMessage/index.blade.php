@extends('layouts.company_app')
@section('title', 'Messages')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                @include('company.incomingMessage.table')
            </div>
        </div>
    </div>
@endsection

