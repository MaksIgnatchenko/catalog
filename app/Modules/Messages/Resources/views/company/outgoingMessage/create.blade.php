@extends('layouts.company_app')
@section('title', 'Send message to admin')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => 'companyOutgoingMessages.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Send message to admin</h3>
                    </div>
                    <div class="box-body">
                        @include('company.outgoingMessage.create_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection