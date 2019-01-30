@extends('layouts.company_app')
@section('title', 'Company info')
@section('content')

    <section class="content">

        <div class="clearfix"></div>

        @include('flash::message')

        <div class='btn-group'>
            <a href="#" class='btn btn-danger'
               onclick="document.getElementById('delete-button').click()">
                {!! Form::open(['method'=>'DELETE', 'route'=>['my-company.destroy']]) !!}
                <button hidden id="delete-button" data-toggle="tooltip" data-placement="top" title="Delete"
                        type="submit" class="dropdown-item"
                        onclick="return confirm('Are you sure you want to delete this company?');">
                </button>
                {!! Form::close() !!}
                Delete company
            </a>
        </div>
        <div class="clearfix"></div>

        {!! Form::open(['route' => ['my-company.update'], 'id' => 'company-edit-form', 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Company info</h3>
                    </div>
                    <div class="box-body">
                        @include('company.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
@endsection

