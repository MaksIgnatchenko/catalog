@extends('layouts.app')
@section('title', 'Management')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => ['type.update', $type->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit type {{$type->name}}</h3>
                    </div>
                    <div class="box-body">
                        @include('type.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection