@extends('layouts.company_app')
@section('title', 'Messages')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                <a href="{{route('companyOutgoingMessages.create')}}" class="btn btn-primary pull-right create-article">Send message to admin</a>
                @include('company.outgoingMessage.table')
            </div>
        </div>
    </div>
@endsection

