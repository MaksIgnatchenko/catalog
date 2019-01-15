@extends('layouts.app')
@section('title', 'Create new article Privacy policy')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => 'privacy-policy.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create new article Privacy policy</h3>
                    </div>
                    <div class="box-body">
                        @include('privacyPolicy.create_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
