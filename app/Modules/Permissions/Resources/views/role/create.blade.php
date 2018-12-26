@extends('layouts.app')
@section('title', 'Create new role')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => 'role.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create role</h3>
                    </div>
                    <div class="box-body">
                        @include('role.create_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
