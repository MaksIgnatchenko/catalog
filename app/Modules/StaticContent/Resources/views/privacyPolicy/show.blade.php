@extends('layouts.app')
@section('title', 'Privacy policy article details')
@section('content')

    <div class="content">

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Privacy policy article info</h3>
                    </div>
                    <div class="box-body">
                        @include('privacyPolicy.show_fields')
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
