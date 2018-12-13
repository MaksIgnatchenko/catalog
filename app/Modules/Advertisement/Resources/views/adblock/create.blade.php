@extends('layouts.app')
@section('title', 'Create new adblock')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => 'adblock.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create new adblock</h3>
                    </div>
                    <div class="box-body">
                        @include('adblock.create_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
    <script src="{{ asset('/js/cities.js') }}"></script>
    <script src="{{ asset('/js/adPositions.js') }}"></script>
@endsection