@extends('layouts.app')
@section('title', 'Create new type')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => 'type.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create type</h3>
                    </div>
                    <div class="box-body">
                        @include('type.create_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection