@extends('layouts.app')
@section('title', 'Edit social link')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => ['social-link.update', $socialLink->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit social link</h3>
                    </div>
                    <div class="box-body">
                        @include('socialLink.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
