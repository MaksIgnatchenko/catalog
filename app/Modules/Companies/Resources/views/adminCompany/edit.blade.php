@extends('layouts.app')
@section('title')
    {{ CompanyEditOperations::getHeader($newStatus) }}
@endsection
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => ['company.update', $company->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{CompanyEditOperations::getHeader($newStatus) . ' ' . $company->name}}</h3>
                    </div>
                    <div class="box-body">
                        @include(CompanyEditOperations::getViewName($operation))
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
