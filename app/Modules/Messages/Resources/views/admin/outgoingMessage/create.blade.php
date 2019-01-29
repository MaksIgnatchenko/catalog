@extends('layouts.app')
@section('title', 'Create new message')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => 'adminOutgoingMessages.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create new message</h3>
                    </div>
                    <div class="box-body">
                        @include('admin.outgoingMessage.create_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection


