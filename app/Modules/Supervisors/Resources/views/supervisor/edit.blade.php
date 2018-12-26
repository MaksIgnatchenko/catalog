@extends('layouts.app')
@section('title', 'Edit supervisor')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => ['supervisor.update', $supervisor->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit supervisor {{$supervisor->name}}</h3>
                    </div>
                    <div class="box-body">
                        @include('supervisor.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
