@extends('layouts.company_app')
@section('title', 'Account settings')
@section('content')

    <section class="content">

        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => ['account.update'], 'method' => 'PUT', 'files' => false, 'id' => 'company-edit-form']) !!}
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Account settings</h3>
                    </div>
                    <div class="box-body">
                        @include('companyOwner.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/timepicker"></script>
    <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/jquery.timepicker.css') }}" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
@endsection
