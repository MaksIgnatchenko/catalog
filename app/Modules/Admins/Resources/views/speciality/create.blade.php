@extends('layouts.app')
@section('title', 'Create new speciality')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => 'speciality.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create speciality</h3>
                    </div>
                    <div class="box-body">
                        @include('speciality.create_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection