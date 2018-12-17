@extends('layouts.app')
@section('title', 'Edit category')
@section('content')

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['route' => ['category.update', $category->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit category {{$category->name}}</h3>
                    </div>
                    <div class="box-body">
                        @include('category.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection