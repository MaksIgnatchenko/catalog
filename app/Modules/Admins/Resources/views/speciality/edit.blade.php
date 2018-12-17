@extends('layouts.app')
@section('title', 'Edit speciality')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => ['speciality.update', $speciality->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit speciality {{$speciality->name}}</h3>
                    </div>
                    <div class="box-body">
                        @include('speciality.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection