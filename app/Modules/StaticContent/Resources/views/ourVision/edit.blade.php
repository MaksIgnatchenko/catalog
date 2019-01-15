@extends('layouts.app')
@section('title', 'Edit Our Vision article')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => ['our-vision.update', $ourVision->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit our vision article</h3>
                    </div>
                    <div class="box-body">
                        @include('ourVision.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
