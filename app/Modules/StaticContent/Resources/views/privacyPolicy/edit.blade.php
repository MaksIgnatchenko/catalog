@extends('layouts.app')
@section('title', 'Edit Privacy policy article')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => ['privacy-policy.update', $privacyPolicy->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Privacy policy article</h3>
                    </div>
                    <div class="box-body">
                        @include('privacyPolicy.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
